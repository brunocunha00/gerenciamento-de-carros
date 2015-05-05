<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CarController extends Controller
{
    /**
     * @Route("/", name="cars_index")
     * @Template()
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getManager();;
        $fabricantes = $repo->getRepository("CodeCarBundle:Fabricante")->findAll();
        $modelos = $repo->getRepository("CodeCarBundle:Carro")->findAll();



        return ['fabricantes' => $fabricantes, 'carros' => $modelos ];
    }

}
