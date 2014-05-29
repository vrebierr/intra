<?php

namespace Application\Sonata\UserBundle\EventListener;

use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class LoginListener
{
    /**
     * @var string
     */
    protected $locale;

    /**
     * Router
     *
     * @var Router
     */
    protected $router;

    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * @param SecurityContext $securityContext
     * @param Router $router The router
     */
    public function __construct(SecurityContext $securityContext, Router $router)
    {
        $this->securityContext = $securityContext;
        $this->router = $router;
    }

    public function handle(AuthenticationEvent $event)
    {
       $token = $event->getAuthenticationToken();
       $this->locale = $token->getUser()->getLocale();
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if ($this->locale !== null) {
            $request = $event->getRequest();
            $request->getSession()->set('_locale', $this->locale);
        }
    }
}
