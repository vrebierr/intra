<?php

namespace Site\IntraBundle\Controller;

use Sonata\UserBundle\Model\UserInterface;
use Doctrine\ORM\Query\Expr;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IntraController extends Controller
{
    public function indexAction()
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();
		if ($user && $user instanceOf UserInterface)
			$data['user'] = $user;

		$repo = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		$date = new \Datetime();
		foreach($activities as $activity)
		{
			if ($activity->getStudents()->contains($user) && $activity->getEnd() > $date)
				$data['currentActivities'][] = $activity;
			else if ($activity->getStudents()->contains($user) && $activity->getStartCorrection() < $date && $activity->getEndCorrection() > $date)
				$data['correctionActivities'][] = $activity;
		}

		$repo = $this->getDoctrine()->getManager()->getRepository("SiteIntraBundle:Event");
		$events = $repo->findBy(array('user' => $user), array('date' => 'DESC'), 20);
		if ($events != null)
			$data['events'] = $events;
		else
			$data['events']= null;

        return $this->render('SiteIntraBundle:Intra:index.html.twig', $data);
    }
}
