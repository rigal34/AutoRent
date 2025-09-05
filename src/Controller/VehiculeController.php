<?php

namespace App\Controller;

use App\Repository\VehiculeRepository;
use App\Entity\Vehicule;
use App\Form\VehiculeSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VehiculeController extends AbstractController
{
    #[Route('/vehicules', name: 'app_vehicules_index')]
    public function vehicule(VehiculeRepository $vehiculeRepository, Request $request): Response
    {
        $form = $this->createForm(VehiculeSearchType::class);
        $form->handleRequest($request);//Je traite la requete

        $vehicules = $vehiculeRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();//je recupere les données du formulaire un tableau associatif
           //j evite de creer une boucle for each pour filtrer les vehicules cela me fait moins de code
            $vehicules = array_filter($vehicules, function(Vehicule $vehicule) use ($data) {//j importe les données du formulaire
                $match = true;

                //si le champ recherche n est pas vide
                if (!empty($data['marque'])) {
                    //stripos Cherche les chaines de caracterers.
                    $match = $match && stripos($vehicule->getNom(), $data['marque']) !== false; // inververse la logique de la recherche
                }

                return $match;
            });
        }

        return $this->render('vehicule/list.html.twig', [
            'vehicules' => $vehicules,
            'form' => $form->createView()
        ]);
    }

    #[Route('/vehicule/{id}', name: 'app_vehicule_show')]
    public function detailVehicule(Vehicule $vehicule): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }
}