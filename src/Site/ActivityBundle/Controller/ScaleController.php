<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Activity;

class ScaleController extends Controller
{
	public function showAction(Activity $activity)
	{
		$em = $this->getDoctrine()->getManager();
		$scales = $em->getRepository('SiteActivityBundle:Scale')->findBy(array(
			"activity" => $activity->getId()
			));
		$modules = $em->getRepository('SiteActivityBundle:Module')->findAll();

		return $this->render('SiteActivityBundle:Scale:show.html.twig', array(
			"scales" => $scales,
			"modules" => $modules,
			"activity" => $activity,
			"module" => $activity->getModule()
			));
	}
}