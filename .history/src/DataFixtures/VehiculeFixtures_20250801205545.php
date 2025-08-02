<?php

namespace App\DataFixtures;

use App\Entity\Vehicule; 
use App\Entity\Categorie; 
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface; 
use Faker\Factory; 

class VehiculeFixtures extends Fixture implements DependentFixtureInterface 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

       
        $citadine = $this->getReference('categorie_citadine', Categorie::class);
        $utilitaire = $this->getReference('categorie_utilitaire', Categorie::class);
        $suv = $this->getReference('categorie_suv', Categorie::class);
        $berline = $this->getReference('categorie_berline', Categorie::class);
        $sportive = $this->getReference('categorie_sportive', Categorie::class);
        $moto = $this->getReference('categorie_moto', Categorie::class);

        $vehiculesData = [
            [
                'nom' => 'Renault Clio',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 30, 80),
                'imagePrincipale' => 'clio.jpg',
                'motorisation' => 'Essence',
                'statut' => 'Disponible',
                'categorie' => $citadine
            ],
            [
                'nom' => 'Peugeot Partner',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 50, 100),
                'imagePrincipale' => 'partner.jpg',
                'motorisation' => 'Diesel',
                'statut' => 'Disponible',
                'categorie' => $utilitaire
            ],
            [
                'nom' => 'Audi Q5',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 90, 150),
                'imagePrincipale' => 'q5.jpg',
                'motorisation' => 'Essence',
                'statut' => 'Disponible',
                'categorie' => $suv
            ],
            [
                'nom' => 'Mercedes Classe C',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 120, 200),
                'imagePrincipale' => 'classe_c.jpg',
                'motorisation' => 'Diesel',
                'statut' => 'Disponible',
                'categorie' => $berline
            ],
            [
                'nom' => 'Porsche 911',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 300, 500),
                'imagePrincipale' => '911.jpg',
                'motorisation' => 'Essence',
                'statut' => 'Disponible',
                'categorie' => $sportive
            ],
            [
                'nom' => 'Kawasaki Z900',
                'description' => $faker->paragraph(2),
                'tarifJournalier' => $faker->randomFloat(2, 70, 130),
                'imagePrincipale' => 'z900.jpg',
                'motorisation' => 'Essence',
                'statut' => 'Disponible',
                'categorie' => $moto
            ],
            
        ];

        for ($i = 0; $i < 10; $i++) {
            $vehicule = new Vehicule();
            $vehicule->setNom($data['nom']);
            $vehicule->setDescription($data['description']);
            $vehicule->setTarifJournalier($data['tarifJournalier']);
            $vehicule->setImagePrincipale($data['imagePrincipale']);
            $vehicule->setMotorisation($data['motorisation']);
            $vehicule->setStatut($data['statut']);
            $vehicule->addCategory($data['categorie']);

            $manager->persist($vehicule);
            $this->addReference('vehicule_' . strtolower(str_replace(' ', '_', $data['nom'])), $vehicule);
        }

        $manager->flush(); 
    }

    
    public function getDependencies(): array
    {
        return [
            CategorieFixtures::class, 
        ];
    }
}
