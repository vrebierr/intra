<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\ActivityGroup;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ActivityBundle\Form\ScaleGroupType;

class ScaleController extends Controller
{
	public function showAction(ActivityGroup $group)
	{
		$em = $this->getDoctrine()->getManager();
		$scale = $em->getRepository('SiteActivityBundle:Scale')->findOneBy(array(
			"activity" => $group->getActivity()->getId()
			));
		$modules = $em->getRepository('SiteActivityBundle:Module')->findAll();

		$fb = $this->createFormBuilder();

		$fb->add('comment', 'textarea');
		$fb->add('note', 'choice', array(
			'choices' => $scale->getMarks(),
			'expanded' => true,
			'multiple' => false
		));
		$form = $fb->getForm();

		$request = $this->getRequest();
		if ($request->isMethod("POST"))
		{
			$form->bind($request);
			if ($form->isValid())
			{
				$correction = $form->getData();
				$correction->setRater($user);
				$correction->setScale($scale);
				$correction->setGroup($group);

				$em = $this->getDoctrine()->getManager();
				$em->persist($correction);
				$em->flush();
			}
		}

		return $this->render('SiteActivityBundle:Scale:show.html.twig', array(
			"scale" => $scale,
			"modules" => $modules,
			"activity" => $group->getActivity(),
			"module" => $group->getActivity()->getModule(),
			"form" => $form->createView(),
			"group" => $group
			));
	}
}