<?php

namespace Site\DirectoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DirectoryController extends Controller
{
    public function indexAction()
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

        $info = ldap_get_entries($ldapconn, $sr);

        //print_r($info);

        foreach ($info as $i => $user)
		{
			if (isset($user['picture']))
			{
				$info[$i]['picture'][0] = base64_encode($user['picture'][0]);
			}
		}

        return $this->render('SiteDirectoryBundle:Directory:index.html.twig', array('users' => $info));
    }
}
