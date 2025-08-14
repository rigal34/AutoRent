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
        return $this->render('vehicule/vehicule.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }
}
