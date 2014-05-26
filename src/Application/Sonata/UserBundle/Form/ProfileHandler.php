<?php

namespace Application\Sonata\UserBundle\Form\Handler;

use Sonata\UserBundle\Form\Handler\ProfileFormHandler as BaseHandler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class ProfileFormHandler extends BaseHandler
{
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;
    /**
     * @var \FOS\UserBundle\Model\UserManagerInterface
     */
    protected $userManager;
    /**
     * @var \Symfony\Component\Form\Form
     */
    protected $form;

    /**
     * @param Form                                      $form
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param UserManagerInterface                      $userManager
     */
    public function __construct(Form $form, Request $request, UserManagerInterface $userManager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->userManager = $userManager;
    }

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function process(UserInterface $user)
    {
        $this->form->setData($user);

        if ('POST' == $this->request->getMethod()) {
            $this->form->bind($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($user);

                return true;
            }

            // Reloads the user to reset its username. This is needed when the
            // username or password have been changed to avoid issues with the
            // security layer.
            $this->userManager->reloadUser($user);
        }

        return false;
    }

    /**
     * @param UserInterface $user
     */
    protected function onSuccess(UserInterface $user)
    {
        $this->userManager->updateUser($user);
    }
}
