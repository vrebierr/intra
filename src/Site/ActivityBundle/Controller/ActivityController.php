<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActivityController extends Controller
{
	public function indexAction()
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;
		$data['activity'] = null;
		$data['module'] = null;

		return $this->render('SiteActivityBundle:Activities:index.html.twig', $data);
	}

	public function moduleAction(\Site\ActivityBundle\Entity\Module $module)
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;
		$data['module'] = $module;
		$data['activity'] = null;

		return $this->render('SiteActivityBundle:Activities:module.html.twig', $data);
	}

	public function activityAction(\Site\ActivityBundle\Entity\Activity $activity)
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;
		$data['activity'] = $activity;
		$data['module'] = $activity->getModule();

		return $this->render('SiteActivityBundle:Activities:activity.html.twig', $data);
	}
}
