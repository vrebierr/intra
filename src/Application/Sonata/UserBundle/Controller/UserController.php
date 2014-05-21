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

use Application\Sonata\UserBundle\Entity\User;

class UserController extends BaseController
{
	public function showOtherAction($user)
	{
		$repo = $this->getDoctrine()->getManager()->getRepository("ApplicationSonataUserBundle:User");
		$userObject = $repo->findOneByUsername($user);
		if (!$userObject)
		{
			$username = $this->container->getParameter('ldap_login');
			$password = $this->container->getParameter('ldap_password');

			$ldaphost = "ldap.42.fr";
			$ldapconn = ldap_connect($ldaphost);

			ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
			$ldapbind = ldap_bind($ldapconn, $username, $password);

			$dn = "dc=42,dc=fr";
			$filter="(uid=".$user.")";
			$sr = ldap_search($ldapconn, $dn, $filter);

			$info = ldap_get_entries($ldapconn, $sr);
			if ($info['count'] != 0)
			{
				$userObject = new User();
				$userObject->setUsername($info[0]['uid'][0]);
				$userObject->setPassword('');
				$userObject->setDn($info[0]['dn']);
				$userObject->setFirstname($info[0]['first-name'][0]);
				$userObject->setLastname($info[0]['last-name'][0]);
				$userObject->setAvatar($info[0]['picture'][0]);
				$userObject->setPhone($info[0]['mobile-phone'][0]);
				$userObject->setEmail($info[0]['alias'][0]);
				$userObject->setDateOfBirth($info[0]['birth-date'][0]);
			}
			else
				throw new \Exception("Cet utilisateur n'existe pas !");

			$em = $this->getDoctrine()->getManager();
			$em->persist($userObject);
			$em->flush();
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
		$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$urlCleaned = substr($url, 0, strrpos($url, "/"))."/autologin/".$token;
		$user->setAutoLoginToken($token);
		$user->setAutoLoginUrl($urlCleaned);

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
