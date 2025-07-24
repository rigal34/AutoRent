<?php

namespace App\DataFixtures;

use App\Entity\Reservation; 
use App\Entity\User;       
use App\Entity\Vehicule;    
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface; 
use Faker\Factory; 
use DateTimeImmutable; 

class ReservationFixtures extends Fixture implements DependentFixtureInterface 
{
    /**
     * Charge les données de test des réservations dans la base de données.
     *
     * @param ObjectManager $manager L'objet ObjectManager de Doctrine.
     */
    public function load(ObjectManager $manager): void
    {
        
        $faker = Factory::create('fr_FR');

        
        $adminUser = $this->getReference('user_admin', User::class);

        
        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $users[] = $this->getReference('user_user_' . $i, User::class);
        }

        
        $vehiculeClio = $this->getReference('vehicule_renault_clio', Vehicule::class);
        $vehiculePartner = $this->getReference('vehicule_peugeot_partner', Vehicule::class);
        $vehiculeQ5 = $this->getReference('vehicule_audi_q5', Vehicule::class);
        $vehiculeClasseC = $this->getReference('vehicule_mercedes_classe_c', Vehicule::class);
        $vehicule911 = $this->getReference('vehicule_porsche_911', Vehicule::class);
        $vehiculeZ900 = $this->getReference('vehicule_kawasaki_z900', Vehicule::class);

       
        $vehiculesDisponibles = [
            $vehiculeClio,
            $vehiculePartner,
            $vehiculeQ5,
            $vehiculeClasseC,
            $vehicule911,
            $vehiculeZ900
        ];
        
        
        for ($i = 0; $i < 20; $i++) {
            $reservation = new Reservation();

            
            $randomUser = $faker->randomElement(array_merge($users, [$adminUser]));
            $reservation->setUtilisateur($randomUser);

            
            $randomVehicule = $faker->randomElement($vehiculesDisponibles);
            $reservation->setVehicule($randomVehicule);

           
            $dateReservationMutable = $faker->dateTimeBetween('-1 year', 'now'); 
            $dateDebutMutable = $faker->dateTimeBetween($dateReservationMutable, $dateReservationMutable->format('Y-m-d') . ' +1 month'); 
            $dateFinMutable = $faker->dateTimeBetween($dateDebutMutable, $dateDebutMutable->format('Y-m-d') . ' +15 days'); 

           
            $reservation->setDateReservation(DateTimeImmutable::createFromMutable($dateReservationMutable));
            $reservation->setDateDebut(DateTimeImmutable::createFromMutable($dateDebutMutable));
            $reservation->setDateFin(DateTimeImmutable::createFromMutable($dateFinMutable));

            
            $diff = $dateDebutMutable->diff($dateFinMutable);
            $jours = $diff->days > 0 ? $diff->days : 1; 
            $prixTotal = $randomVehicule->getTarifJournalier() * $jours;
            $reservation->setPrixTotal(strval($prixTotal)); 

           
            $reservation->setStatut($faker->randomElement(['En cours', 'Terminée', 'Annulée']));

           
            $manager->persist($reservation);
        }

        
        $manager->flush();
    }

    /**
     * Définit les dépendances de cette fixture, assurant que d'autres fixtures sont chargées avant celle-ci.
     *
     * @return array La liste des classes de fixtures dont celle-ci dépend.
     */
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,       
            VehiculeFixtures::class,  
        ];
    }
}
