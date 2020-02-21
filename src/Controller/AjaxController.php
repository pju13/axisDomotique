<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//use Doctrine\DBAL\Driver\Connection;
use App\Repository\ConnectedObjectRepository;

use App\Entity\ConnectedObject;

// POUR POUVOIR RENVOYER DU JSON
use Symfony\Component\HttpFoundation\Request;
// POUR RECUPERER LES INFOS DE FORMDATA
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajaxUpdateData")
     */
    public function ajaxUpdateData(ConnectedObjectRepository $ConnectedObjectRepository, Request $request)
    {
        // RECUPERER L'INFO nomTable ENVOYEE DANS FormData
        $idObject       = $request->get("idObject");
        $ObjectType     = $request->get("ObjectType");
        $ObjectValue    = $request->get("ObjectValue");

        // Entité de gestion de bdd :
        $entityManager = $this->getDoctrine()->getManager();

        // ON VEUT RENVOYER DU JSON
        // https://symfony.com/doc/current/components/http_foundation.html#creating-a-json-response
        $tabAsso = [];


        $objetLumiere = $entityManager->getRepository(ConnectedObject::class)->find($idObject);
    
        if (!$objetLumiere) {
            throw $this->createNotFoundException(
                'No objetLumiere found for id '.$idObject
            );
        }
    
        if ($ObjectType == "lumiere") {
            $objetLumiere->setData1($ObjectValue);
        }
        else {
            $objetLumiere->setStatut($ObjectValue);
        }
        
        $entityManager->flush();


        $tabAsso["ok"] = "ok";
        $tabAsso["get"] = $ObjectValue;

        $response = new JsonResponse($tabAsso);
        return $response;
    }
}
