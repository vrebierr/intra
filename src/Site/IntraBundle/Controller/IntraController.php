<?php

namespace Site\IntraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IntraController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteIntraBundle:Intra:index.html.twig');
    }
}
