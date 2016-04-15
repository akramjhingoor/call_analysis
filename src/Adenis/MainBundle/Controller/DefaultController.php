<?php

namespace Adenis\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/index")
     * @Template()
     */
    public function indexAction() {
        return $this->redirectToRoute('main_call_statisticsglobal');
    }

}