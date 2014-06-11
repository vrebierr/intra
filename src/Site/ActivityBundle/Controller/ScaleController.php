<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Activity;
use Site\ActivityBundle\Entity\ActivityGroup;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ActivityBundle\Form\ScaleGroupType;

class ScaleController extends Controller
{
	public function showAction(ActivityGroup $group)
	{
		$now = new \Datetime("NOW");
		$user = $this->container->get("security.context")->getToken()->getUser();
		$em = $this->getDoctrine()->getManager();
		$corrections = $em->getRepository('SiteActivityBundle:ScaleGroup')->findBy(array("activity" => $group->getActivity(), "group" => $group));

		if ($now < $group->getActivity()->getStartCorrection() || $now > $group->getActivity()->getEndCorrection())
			throw new AccessDeniedException("You can't correct this group now.");

		$i = 0;
		foreach ($corrections as $elem)
		{
			if ($elem->getRater() == $user)
			{
				$correction = $elem;
				$i++;
			}
		}
		if (!$i)
			throw new AccessDeniedException("You can't correct this group.");

		$scale = $em->getRepository('SiteActivityBundle:Scale')->findOneBy(array(
			"activity" => $group->getActivity()->getId()
			));
		$modules = $em->getRepository('SiteActivityBundle:Module')->findAll();

		$fb = $this->createFormBuilder();

		$fb->add('comment', 'textarea', array('label' => false, 'required' => true, 'attr' => array('placeholder' => 'scale.form.comment')));
		$fb->add('note', 'choice', array(
			'label' => false,
			'required' => true,
			'choices' => $scale->getMarks(),
		));
		$fb->add('cheat', 'checkbox', array('label' => 'scale.form.cheat', 'required' => false, 'attr' => array('value' => 0)));
		$form = $fb->getForm();

		$request = $this->getRequest();
		if ($request->isMethod("POST"))
		{
			$form->bind($request);
			if ($form->isValid())
			{
				$data = $form->getData();
				$correction->setComment($data['comment']);
				if ($data['cheat'] === true)
					$correction->setNote(-42);
				else
					$correction->setNote($data['note']);
				$correction->setDone(true);
				$em = $this->getDoctrine()->getManager();
				$em->persist($correction);
				$em->flush();
				$this->redirect($this->generateUrl('site_activities_activity', array('id' => $group->getActivity()->getId())));
			}
		}

		return $this->render('SiteActivityBundle:Scale:show.html.twig', array(
			"correction" => $correction,
			"scale" => $scale,
			"modules" => $modules,
			"activity" => $group->getActivity(),
			"module" => $group->getActivity()->getModule(),
			"form" => $form->createView(),
			"group" => $group
			));
	}
}
