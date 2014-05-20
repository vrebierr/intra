<?php

namespace Site\ActivityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ElearningController extends Controller
{
	public function indexAction()
	{
		$data = array();

		$modules = $this->getDoctrine()->getManager()->getRepository("SiteActivityBundle:Module")->findAll();

		$data['modules'] = $modules;

		return $this->render('SiteActivityBundle:Elearning:index.html.twig', $data);
	}
}
