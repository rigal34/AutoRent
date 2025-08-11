<?php

namespace App\Controller;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{
    #[Route('/categorie/{id}', name: 'app_categorie_show')]
    public function show(Categorie $categorie): Response
    {
        // La magie de Symfony : il trouve tout seul la bonne catégorie
        // grâce à l'ID qui est dans l'URL.

        // On envoie cette catégorie à notre future page d'affichage.
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}