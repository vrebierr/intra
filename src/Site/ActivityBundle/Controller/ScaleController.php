<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Activity;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ActivityBundle\Form\ScaleGroupType;

class ScaleController extends Controller
{
	public function showAction(Activity $activity)
	{
		$em = $this->getDoctrine()->getManager();
		$scales = $em->getRepository('SiteActivityBundle:Scale')->findBy(array(
			"activity" => $activity->getId()
			));
		$modules = $em->getRepository('SiteActivityBundle:Module')->findAll();

		$fb = $this->createFormBuilder();
		foreach ($scales as $scale)
		{
			$fb->add('comment-'.$scale->getId(), 'textarea');
			$fb->add('note-'.$scale->getId(), 'choice', array(
				'choices' => $scale->getMarks(),
				'expanded' => true,
				'multiple' => false
			));
		}
		$form = $fb->getForm();

		return $this->render('SiteActivityBundle:Scale:show.html.twig', array(
			"scales" => $scales,
			"modules" => $modules,
			"activity" => $activity,
			"module" => $activity->getModule(),
			"form" => $form->createView()
			));
	}
}