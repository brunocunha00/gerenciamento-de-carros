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
        return array(
                'carros' => array(
                    ['marca' =>'chevrolet', 'modelo' => ['corsa', 'celta', 'prisma', 'camaro', 'blazer']],
                    ['marca' =>'volkswagen', 'modelo' => ['golf', 'saveiro', 'fox', 'gol', 'polo']],
                    ['marca' =>'renault', 'modelo' => ['duster', 'scenic', 'megane', 'laguna', 'sandero']]
                )
            );
    }

}
