<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Activity;

class ActivityController extends Controller
{
    public function showAction(Activity $activity)
    {
    	$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

        return $this->render('SiteActivityBundle:Activity:show.html.twig', array(
        	'activity' => $activity,
        	'modules' => $modules
        	));
    }
}
