<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ScenarioRepository;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/scenario={id}", name="scenario")
     */
    public function index($id, ScenarioRepository $ScenarioRepository)
    {
        $Scenarii_objects = $ScenarioRepository->find($id);

        $objets = $Scenarii_objects->getConnectedObjects();

        return $this->render('object/index.html.twig', [
            'controller_name'   => 'ScenarioController',
            'objets'            => $objets,
            'Scenarii'          => $Scenarii_objects,
        ]);
    }
}
