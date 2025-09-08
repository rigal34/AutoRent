<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;     
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ActualiteController extends AbstractController
{
    #[Route('/actualite', name: 'app_actualite')]
    public function index(ActualiteRepository $actualiteRepository): Response
    {
        $actualites = $actualiteRepository->findBy([], ['id' => 'DESC']);
        // page d accueil toutes les actualites
        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }


   
}
