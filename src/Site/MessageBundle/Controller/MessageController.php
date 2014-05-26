<?php

namespace Site\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\MessageBundle\Controller\MessageController as BaseController;

use Application\Sonata\UserBundle\Entity\User;
use Site\MessageBundle\Form\NewCorrectionThreadMessageType;

class MessageController extends BaseController
{
}
