<?php

namespace App\Controller;

// N'oublie pas d'ajouter ce "use" en haut du fichier !
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    // ÉTAPE 1 : On ajoute un argument pour recevoir l'outil "CategorieRepository"
    public function home(CategorieRepository $categorieRepository): Response
    {
    
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
