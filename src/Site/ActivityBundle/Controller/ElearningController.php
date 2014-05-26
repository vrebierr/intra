<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\ActivityBundle\Entity\Module;
use Site\ActivityBundle\Entity\Activity;
use Site\ActivityBundle\Entity\ActivityGroup;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ElearningController extends Controller
{
    public function indexAction()
    {
        $data = array();

        $modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

        $data['modules'] = $modules;
        $data['activity'] = null;
        $data['module'] = null;

        return $this->render('SiteActivityBundle:Elearning:index.html.twig', $data);
    }

    public function activityAction(Activity $activity)
    {
        $data = array();

        $modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

        $data['modules'] = $modules;
        $data['activity'] = $activity;
        $data['module'] = null;

        return $this->render('SiteActivityBundle:Elearning:activity.html.twig', $data);
    }

    public function moduleAction(Module $module)
    {
        $data = array();

        $modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

        $data['modules'] = $modules;
        $data['activity'] = null;
        $data['module'] = $module;

        return $this->render('SiteActivityBundle:Elearning:module.html.twig', $data);
    }
}
