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
        $form->handleRequest($request);

        $vehicules = $vehiculeRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $vehicules = array_filter($vehicules, function(Vehicule $vehicule) use ($data) {
                $match = true;

                if (!empty($data['marque'])) {
                    $match = $match && stripos($vehicule->getNom(), $data['marque']) !== false;
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