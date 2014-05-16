<?php

namespace Site\DirectoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DirectoryController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteDirectoryBundle:Directory:index.html.twig');
    }
}
