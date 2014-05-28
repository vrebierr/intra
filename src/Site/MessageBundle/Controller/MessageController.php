<?php

namespace Site\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\MessageBundle\Controller\MessageController as BaseController;

use Application\Sonata\UserBundle\Entity\User;
use Site\MessageBundle\Form\NewCorrectionThreadMessageType;
use Site\IntraBundle\Entity\Event;

class MessageController extends BaseController
{
	public function newThreadAction()
	{
		$form = $this->container->get('fos_message.new_thread_form.factory')->create();
		$formHandler = $this->container->get('fos_message.new_thread_form.handler');

		if ($message = $formHandler->process($form))
		{
			$event = new Event();
			$event->setUser($form->get('recipient')->getData());
			$event->setDate(new \Datetime());
			$event->setType("message");
			$event->setDescription("FEED_MESSAGE_RECEIVED");
			$event->setInfo($message->getSender());

			$em = $this->container->get('doctrine')->getManager();
			$em->persist($event);
			$em->flush();

			return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view', array(
				'threadId' => $message->getThread()->getId()
			)));
		}

		return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:newThread.html.twig', array(
			'form' => $form->createView(),
			'data' => $form->getData()
		));
	}

	public function threadAction($threadId)
	{
		$thread = $this->getProvider()->getThread($threadId);
		$form = $this->container->get('fos_message.reply_form.factory')->create($thread);
		$formHandler = $this->container->get('fos_message.reply_form.handler');

		if ($message = $formHandler->process($form))
		{
			$em = $this->container->get('doctrine')->getManager();

			foreach($thread->getParticipants() as $participant)
			{
				if ($message->getSender() != $participant)
				{
					$event = new Event();
					$event->setUser($participant);
					$event->setDate(new \Datetime());
					$event->setType("message");
					$event->setDescription("FEED_MESSAGE_RECEIVED");
					$event->setInfo($message->getSender());
					$em->persist($event);
				}
			}

				$em->flush();

			return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view', array(
				'threadId' => $message->getThread()->getId()
			)));
		}

		return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:thread.html.twig', array(
			'form' => $form->createView(),
			'thread' => $thread
		));
	}
}
