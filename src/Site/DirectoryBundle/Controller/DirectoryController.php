<?php

namespace Site\DirectoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DirectoryController extends Controller
{
	public function indexAction(Request $request)
	{
		$username = $this->container->getParameter('ldap_login');
		$password = $this->container->getParameter('ldap_password');

		$ldaphost = "ldap.42.fr";
		$ldapconn = ldap_connect($ldaphost);

		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldapbind = ldap_bind($ldapconn, $username, $password);

		$dn = "dc=42,dc=fr";
		$filter="(&(objectClass=ft-user)(!(close=*))(ou:dn:=2013)(picture=*)(homeDirectory=*))";
		$sr = ldap_search($ldapconn, $dn, $filter);

		ldap_sort($ldapconn, $sr, 'uid');

		$info = ldap_get_entries($ldapconn, $sr);


		foreach ($info as $i => $user)
		{
			if (isset($user['picture']))
			{
				$info[$i]['picture'][0] = base64_encode($user['picture'][0]);
			}
		}

        $page = 1;
		$range = 10;

        if ($request->query->get('page'))
            $page = $request->query->get('page');
		if ($request->query->get('range'))
			$range = $request->query->get('range');

		$paginator = $this->get('knp_paginator');

        $slice = $paginator->paginate($info, $page, $range);

		return $this->render('SiteDirectoryBundle:Directory:index.html.twig', array('total' => $info, 'users' => $slice));
	}
}
