<?php
namespace Rudak\MaintenanceBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class MaintenanceListener
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        // pour limiter les recursions
        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }
        $maintenance_limite = $this->container->hasParameter('maintenance_limite') ? $this->container->getParameter('maintenance_limite') : false;
        $maintenance        = $this->container->hasParameter('maintenance') ? $this->container->getParameter('maintenance') : false;

        $debug = in_array($this->container->get('kernel')->getEnvironment(), array('test', 'dev'));

        if ($maintenance && !$debug) {
            $engine  = $this->container->get('templating');
            $content = $engine->render('::maintenance.html.twig',
                array(
                    'maintenance_limite' => $maintenance_limite
                ));
            $event->setResponse(new Response($content, 503));
            $event->stopPropagation();
        }

    }
}