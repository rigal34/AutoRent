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

        return $this->render('vehicules/index.html.twig', [
             'vehicules' => $vehicules,
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
