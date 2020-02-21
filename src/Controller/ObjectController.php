<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Repository\ConnectedObjectRepository;
use App\Repository\ScenarioRepository;

class ObjectController extends AbstractController
{
    /**
     * @Route("/", name="object")
     */
    public function index(ConnectedObjectRepository $ConnectedObjectRepository, ScenarioRepository $ScenarioRepository)
    {
        // Lister tous les objets de la bdd 
        // puis les transmettre à twig :
        $objets = $ConnectedObjectRepository->findBy([], 
        [ 
            "typeObject" => "ASC",
            "nom"       => "ASC",
        ]
        );

        $Scenarii = $ScenarioRepository->findBy([], [ 
            "nom" => "ASC",
        ]);

        return $this->render('object/index.html.twig', [
            'controller_name' => 'ObjectController',
            'objets'          => $objets,
            'Scenarii'        => $Scenarii,
        ]);
    }

    /**
     * @Route("/type_objet={type}", name="Object_typeObject", methods={"GET","POST"})
     */
    public function typeObject($type, ConnectedObjectRepository $ConnectedObjectRepository, ScenarioRepository $ScenarioRepository): Response
    {
        // Lister tous les objets de la bdd 
        // puis les transmettre à twig :
        $objets = $ConnectedObjectRepository->findBy(["typeObject" => $type], 
            [ 
                "typeObject" => "ASC",
                "nom"       => "ASC",
            ]
        );

        $Scenarii = $ScenarioRepository->findBy([], [ 
            "nom" => "ASC",
        ]);

        return $this->render('object/index.html.twig', [
            'controller_name' => 'ObjectController',
            'objets'          => $objets,
            'Scenarii'        => $Scenarii,
        ]);
    }
}
