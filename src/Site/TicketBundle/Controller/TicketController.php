<?php

namespace Site\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\UserBundle\Model\UserInterface;

use Site\TicketBundle\Entity\TicketTicket;
use Site\TicketBundle\Entity\TicketMessage;

use Site\TicketBundle\Form\TicketType;
use Site\TicketBundle\Form\MessageType;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class TicketController extends Controller
{
	public function ticketAction()
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();
		$em = $this->getDoctrine()->getManager();

		$form = $this->createForm(new TicketType());
		$data['form'] = $form->createView();

		$request = $this->getRequest();
		if ($request->isMethod("POST"))
		{
			$form->bind($request);
			if ($form->isValid())
			{
				$postVal = $request->request->get("site_ticketbundle_tickettype");
				$ticket = new TicketTicket();
				$ticket->setAuthor($user);
				$ticket->setSubject($postVal['subject']);
				$ticket->setPriority($postVal['priority']);

				$message = new TicketMessage();
				$message->setTicket($ticket);
				$message->setAuthor($user);
				$message->setContent($postVal['content']);

				$ticket->addMessages($message);

				$em = $this->getDoctrine()->getManager();
				$em->persist($ticket);
				$em->flush();

			}
		}

		$query = $em->createQueryBuilder()->add("select", "t")
										->add("from", "Site\TicketBundle\Entity\TicketTicket t")
										->add("where", "t.author =" .$user->getId())->getQuery();
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 10);

		$data['pagination'] = $pagination;

		return $this->render('SiteTicketBundle:Ticket:ticket.html.twig', $data);
	}

	public function showAction(TicketTicket $ticket)
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();
		$form = $this->createForm(new MessageType());

		$data['ticket'] = $ticket;
		$data['form'] = $form->createView();

		$request = $this->getRequest();
		if ($request->isMethod("POST"))
		{
			$form->bind($request);
			if ($form->isValid())
			{

				$postVal = $request->request->get("site_ticketbundle_messagetype");
				$message = new TicketMessage();
				$message->setTicket($ticket);
				$message->setAuthor($user);
				$message->setContent($postVal['content']);

				$ticket->addMessages($message);

				$em = $this->getDoctrine()->getManager();
				$em->persist($message);
				$em->flush();

			}
		}

		return $this->render('SiteTicketBundle:Ticket:show.html.twig', $data);
	}
}
