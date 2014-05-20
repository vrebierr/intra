<?php

namespace Site\PlanningBundle\Controller;

use Sonata\UserBundle\Model\UserInterface;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanningController extends Controller
{
    public function planningAction()
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();

		if ($user && $user instanceOf UserInterface)
			$data['user'] = $user;
		else
			return $this->redirect($this->generateUrl('sonata_user_security_login'));

        return $this->render('SitePlanningBundle:Planning:index.html.twig', $data);
    }
}
