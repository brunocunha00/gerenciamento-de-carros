<?php

namespace Code\CarBundle\Controller;

use Code\CarBundle\Entity\Fabricante;
use Code\CarBundle\Form\FabricanteType;
use Code\CarBundle\Service\FabricanteService;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/fabricante")
 */
class FabricanteController extends Controller
{

    /**
     * @Route("/new", name="fabricante_new")
     * @Template()
     */
    public function newAction()
    {
        $this->checkAdminAuth();
        $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
//        $form->add('');

        return array('form' => $form->createView());
    }

    /**
     * @Route("/", name="fabricante_index")
     * @Template()
     */
    public function indexAction()
    {
        $fabricantes = $this->get("code.carbundle.fabricante")->findAll();

        return array(
            'fabricantes' => $fabricantes
        );
    }

    /**
     * @Route("/create", name="fabricante_create")
     * @Template("@CodeCar/Fabricante/new.html.twig")
     */
    public function createAction(Request $request)
    {
        $this->checkAdminAuth();
        $fabricante = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $fabricante);
        $form->bind($request);

        if($form->isValid())
        {
            $this->get("code.carbundle.fabricante")->persist($fabricante);
            return $this->redirectToRoute("fabricante_index");
        }
        return array(
                'form' => $form->createview()
            );
    }

    /**
     * @Route("/{id}/edit", name="fabricante_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $this->checkAdminAuth();
        $fabricante = $this->get("code.carbundle.fabricante")->find($id);
        if(!$fabricante)
        {
            throw new EntityNotFoundException();
        }

        $form = $this->createForm(new FabricanteType(), $fabricante);

        return array(
            'fabricante' => $fabricante,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/{id}/update", name="fabricante_update")
     * @Template("@CodeCar/Fabricante/edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $this->checkAdminAuth();
        $fabricante = $this->get("code.carbundle.fabricante")->find($id);
        $form = $this->createForm(new FabricanteType(), $fabricante);
        $form->bind($request);

        if($form->isValid())
        {
            $this->get("code.carbundle.fabricante")->persist($fabricante);
            return $this->redirectToRoute("fabricante_index");
        }
        return array(
            'fabricante' => $fabricante,
            'form' => $form->createview()
        );
    }

    /**
     * @Route("/{id}/delete", name="fabricante_delete")
     */
    public function deleteAction($id)
    {
        $this->checkAdminAuth();
        $fabricante = $this->get("code.carbundle.fabricante")->find($id);
        if(!$fabricante)
        {
            throw new EntityNotFoundException();
        }
        $this->get("code.carbundle.fabricante")->remove($fabricante);
        return $this->redirectToRoute("fabricante_index");
    }

    private function checkAdminAuth()
    {
        if (!$this->get("security.context")->isGranted("ROLE_ADMIN")) {
            throw new AccessDeniedException("Acesso Negado. Somente Administrador.");
        }
    }

}
