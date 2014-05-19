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
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

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

	public function generateTokenAction()
	{
		$user = $this->container->get("security.context")->getToken()->getUser();
		$token = substr(hash('whirlpool', uniqid($user->getUsername(), true)), 0, 10);
		$url = "intra.local.42.fr:8888/profile/autologin/".$token;
		$user->setAutoLoginToken($token);
		$user->setAutoLoginUrl($url);

		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();
		return $this->redirect($this->generateUrl('sonata_user_profile_show'));
	}

	public function autoLoginAction($secret)
	{
		$repo = $this->getDoctrine()->getManager()->getRepository("ApplicationSonataUserBundle:User");
		$user = $repo->findOneByAutoLoginToken($secret);
		if (!$user || !$user instanceOf UserInterface)
			return $this->redirect($this->generateUrl('sonata_user_security_login'));

		$token = new UsernamePasswordToken($user, $user->getPassword(), 'main', $user->getRoles());
		$this->get('session')->set('_security_main', serialize($token));
		$this->get('security.context')->setToken($token);

		$event = new InteractiveLoginEvent($this->getRequest(), $token);
		$this->get("event_dispatcher")->dispatch("security.interactive_login", $event);

		return $this->redirect($this->generateUrl('intra_index'));
	}
}
