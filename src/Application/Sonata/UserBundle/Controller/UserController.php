<?php

namespace Application\Sonata\UserBundle\Controller;

use Sonata\UserBundle\Controller\ProfileFOSUser1Controller as BaseController;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;

class UserController extends BaseController
{
    public function showOtherAction($user)
    {
        $repo = $this->getDoctrine()->getManager()->getRepository("ApplicationSonataUserBundle:User");
        $userObject = $repo->findOneByUsername($user);
        if (!$userObject)
        {
            //ajouter BDD
        }
        return $this->render('SonataUserBundle:Profile:show.html.twig', array(
            'user'   => $userObject,
            'blocks' => $this->container->getParameter('sonata.user.configuration.profile_blocks')
        ));
    }
}
