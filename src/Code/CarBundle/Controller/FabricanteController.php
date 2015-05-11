<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/fabricante")
 */
class FabricanteController extends Controller
{

    /**
     * @Route("/", name="fabricante_index")
     * @Template()
     */
    public function indexAction()
    {
        $fabricantes = $this->getDoctrine()->getManager()->getRepository("CodeCarBundle:Fabricante")->findAll();

        return array(
            'fabricantes' => $fabricantes
        );    }

    /**
     * @Route("/new", name="fabricante_new")
     * @Template()
     */
    public function newAction()
    {
        return array(
                // ...
            );    }



    /**
     * @Route("/create", name="fabricante_create")
     * @Template()
     */
    public function createAction()
    {
        return array(
                // ...
            );    }

}
