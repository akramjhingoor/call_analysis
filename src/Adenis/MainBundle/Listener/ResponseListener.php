<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adenis\MainBundle\Listener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Description of ResponseListener
 *
 * @author txema
 */
class ResponseListener {

    public function onKernelResponse(FilterResponseEvent $event) {
        $event->getResponse()->headers->set('x-frame-options', 'deny');
    }

}
