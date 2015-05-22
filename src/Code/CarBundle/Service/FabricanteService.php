<?php

namespace Code\CarBundle\Service;


use Code\CarBundle\Entity\FabricanteInterface;
use Doctrine\ORM\EntityManager;

class FabricanteService {

    private $em;

    function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function persist(FabricanteInterface $fabricante){
        $this->em->persist($fabricante);
        $this->em->flush();
    }

    public function remove(FabricanteInterface $fabricante){
        $this->em->remove($fabricante);
        $this->em->flush();
    }

}