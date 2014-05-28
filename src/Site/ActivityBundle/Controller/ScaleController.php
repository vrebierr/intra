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
		$correction = $em->getRepository('SiteActivityBundle:ScaleGroup')->findOneBy(array("activity" => $group->getActivity(), "group" => $group));

		if ($now < $group->getActivity()->getStartCorrection() || $now > $group->getActivity()->getEndCorrection())
			throw new AccessDeniedException("You can't correct this group now.");

		if ($correction->getRater() != $user)
			throw new AccessDeniedException("You can't correct this group.");

		if ($correction->isDone())
			throw new AccessDeniedException("Correction is done.");

		$scale = $em->getRepository('SiteActivityBundle:Scale')->findOneBy(array(
			"activity" => $group->getActivity()->getId()
			));
		$modules = $em->getRepository('SiteActivityBundle:Module')->findAll();

		$this->generatePeers($group->getActivity(), $scale);
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
				$data = $form->getData();
				$correction->setComment($data['comment']);
				$correction->setNote($data['note']);

				$em = $this->getDoctrine()->getManager();
				$em->persist($correction);
				$em->flush();
				$this->redirect($this->generateUrl('site_activities_activity', array('id' => $group->getActivity())));
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

	public function generatePeersAction(Activity $activity)
	{
		$em = $this->getDoctrine()->getManager();
		$groups = $em->getRepository('SiteActivityBundle:ActivityGroup')->findBy(array("activity" => $activity));
		$students = $activity->getStudents()->toArray();
		shuffle($groups);
		shuffle($students);
		foreach ($students as $student)
		{
			for ($i = 0; $i < 4; $i++)
			{
				$scale_group = new ScaleGroup();
				$rand = rand(0, count($groups) - 1);
				while ($groups[$rand]->getStudents()->contains($student))
					$rand = rand(0, count($groups) - 1);
				$scale_group->setGroup($groups[$rand]);
				$scale_group->setRater($student);
				$em->persist($scale_group);
				echo("debug\n");
				$groups[$rand]->peers += 1;
				if ($groups[$rand]->peers == 4)
					$groups = array_splice($groups, $rand);
			}
		}
		$em->flush();
		return;
	}
}
