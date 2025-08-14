<?php

namespace App\Controller;
use App\Entity\Vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VehiculeController extends AbstractController
{
    #[Route('/vehicule /{id}', name: 'app_vehicule_show')]
    public function vehici(): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'controller_name' => 'VehiculeController',
        ]);
    }
}
