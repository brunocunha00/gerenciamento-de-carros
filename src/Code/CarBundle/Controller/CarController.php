<?php

namespace Code\CarBundle\Controller;

use Code\CarBundle\Entity\Carro;
use Code\CarBundle\Entity\Fabricante;
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
        $repo = $this->getDoctrine()->getManager();
        $fabricantes = $repo->getRepository("CodeCarBundle:Fabricante")->findAll();
        $modelos = $repo->getRepository("CodeCarBundle:Carro")->findAll();



        return ['fabricantes' => $fabricantes, 'carros' => $modelos ];
    }

    /**
     * @Route("/popularbanco", name="popular_tabela_carro_fabricante")
     * @Template()
     */
    public function popularBancoAction(){

        $fabriChevr = new Fabricante();
        $fabriChevr->setNome("chevrolet");

        $fabriVolk = new Fabricante();
        $fabriVolk->setNome("volkswagen");

        $car1 = new Carro();
        $car1->setModelo("corsa")->setAno(2008)->setCor("azul")->setFabricante($fabriChevr);
        $car2 = new Carro();
        $car2->setModelo("celta")->setAno(2005)->setCor("branco")->setFabricante($fabriChevr);
        $car3 = new Carro();
        $car3->setModelo("prisma")->setAno(2011)->setCor("vermelho")->setFabricante($fabriChevr);

        $car4 = new Carro();
        $car4->setModelo("golf")->setAno(2015)->setCor("preto")->setFabricante($fabriVolk);
        $car5 = new Carro();
        $car5->setModelo("saveiro")->setAno(2013)->setCor("prata")->setFabricante($fabriVolk);
        $car6 = new Carro();
        $car6->setModelo("gol")->setAno(2009)->setCor("branco")->setFabricante($fabriVolk);

        $em = $this->getDoctrine()->getManager();
        $em->persist($fabriChevr);
        $em->persist($fabriVolk);
        $em->persist($car1);
        $em->persist($car2);
        $em->persist($car3);
        $em->persist($car4);
        $em->persist($car5);
        $em->persist($car6);
        $em->flush();
        return ['msg' => "Banco populado com sucesso"];

    }

}
