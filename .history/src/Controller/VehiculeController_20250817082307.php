<?php

namespace App\Controller;
use App\Repository\VehiculeRepository;
use App\Entity\Vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VehiculeController extends AbstractController
{
    #[Route('/vehicule', name: 'app_vehicule_show')]
    public function vehicule(VehiculeRepository $vehiculeRepository): Response
    {
        $vehicules = $vehiculeRepository->findAll();

        // j' envoie la liste des véhicules à la page d'affichage

        return $this->render('vehicule/index.html.twig', [
             'vehicules' => $vehicules,
        ]);
    }


    #[Route('/vehicule/{id}', name: 'app_vehicule_detail')]
    public function detailVehicule(VehiculeRepository $vehiculeRepository, int $id): Response
    {
        $vehicule = $vehiculeRepository->find($id);

        if (!$vehicule) {
            throw $this->createNotFoundException('Véhicule non trouvé');
        }

        return $this->render('vehicule/detail.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }




}
