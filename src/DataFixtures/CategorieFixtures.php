<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        $categories = ['Citadine', 'Utilitaire', 'SUV', 'Berline', 'Sportive', 'Moto'];

        foreach ($categories as $nomCategorie) {
            $categorie = new Categorie();
            $categorie->setNom($nomCategorie);
            $manager->persist($categorie); 

            
            $this->addReference('categorie_' . strtolower($nomCategorie), $categorie);
        }

        $manager->flush(); 
    }
}