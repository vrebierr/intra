<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModuleController extends Controller
{
    public function indexAction()
    {
    	$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();
    	
        return $this->render('SiteActivityBundle:Module:index.html.twig', array(
        	'modules' => $modules
        	));
    }
}
