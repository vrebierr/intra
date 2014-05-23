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

        return $this->render('SiteActivityBundle:Elearning:elearning.html.twig', $data);
    }
}
