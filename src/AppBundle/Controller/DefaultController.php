<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example/}", name="homepage")
     */
    public function indexAction($teste)
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/run/{marca}/{modelo}", name="run")
     */
    public function runAction($marca, $modelo){
        return $this->render('AppBundle:Default:index.html.twig' , ['marca'=>strtoupper($marca), 'modelo'=>strtoupper($modelo)]);
    }

}
