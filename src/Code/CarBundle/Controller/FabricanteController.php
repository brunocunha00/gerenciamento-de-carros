<?php

namespace Code\CarBundle\Controller;

use Code\CarBundle\Entity\Fabricante;
use Code\CarBundle\Form\FabricanteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

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
        $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
//        $form->add('');

        return array('form' => $form->createView());
    }

    /**
     * @Route("/create", name="fabricante_create")
     * @Template("@CodeCar/Fabricante/new.html.twig")
     */
    public function createAction(Request $request)
    {
        $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
        $form->bind($request);

        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fabricante);
            $em->flush();
            return $this->redirectToRoute("fabricante_index");
        }
        return array(
                'form' => $form->createview()
            );
    }

}
