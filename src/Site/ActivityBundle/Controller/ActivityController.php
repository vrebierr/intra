<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Module;
use Site\ActivityBundle\Entity\Activity;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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

	public function moduleAction(Module $module)
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;
		$data['module'] = $module;
		$data['activity'] = null;

		return $this->render('SiteActivityBundle:Activities:module.html.twig', $data);
	}

	public function moduleRegistrationAction(Module $module)
	{
		$now = new \Datetime("NOW");
		$user = $this->container->get("security.context")->getToken()->getUser();
		// if is too early or late to registratration
		if ($now > $module->getEndRegistration() || $now < $module->getStartRegistration())
			throw new AccessDeniedException("You can't register for this activity now.");

		if ($module->getStudents()->contains($user))
			$module->removeStudent($user);
		else
			$module->addStudent($user);

		$em = $this->getDoctrine()->getManager();
		$em->persist($module);
		$em->flush();

		return $this->redirect($this->generateUrl('site_activities_module', array('id' => $module->getId())));
	}

	public function activityAction(Activity $activity)
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;
		$data['activity'] = $activity;
		$data['module'] = $activity->getModule();

		return $this->render('SiteActivityBundle:Activities:activity.html.twig', $data);
	}

	public function activityRegistrationAction(Activity $activity)
	{
		$now = new \Datetime("NOW");
		$user = $this->container->get("security.context")->getToken()->getUser();
		// if is too early or late to registratration
		if ($now > $activity->getEndRegistration() || $now < $activity->getStartRegistration())
			throw new AccessDeniedException("You can't register for this activity now.");
		
		if (!$activity->getModule()->getStudents()->contains($user))
			throw new AccessDeniedException("You can't register for this activity before register module");

		if ($activity->getStudents()->contains($user))
			$activity->removeStudent($user);
		else
			$activity->addStudent($user);

		$em = $this->getDoctrine()->getManager();
		$em->persist($activity);
		$em->flush();

		return $this->redirect($this->generateUrl('site_activities_activity', array('id' => $activity->getId())));
	}
}
