<?php

namespace App\Controller;


use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    
public function home(CategorieRepository $categorieRepository): Response
{
     // ÉTAPE 2 : On utilise l'outil pour aller chercher toutes les catégories
        $categories = $categorieRepository->findAll();
        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
