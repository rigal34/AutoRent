<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface; 

class UserFixtures extends Fixture
{
   
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
        
    }

    // Le mot de passe du compte administrateur de démonstration n'est plus écrit dans le code :
    // il se lit dans le réglage MOT_DE_PASSE_ADMIN_DEMO, à placer dans le fichier .env.local,
    // qui reste sur l'ordinateur et ne part jamais sur GitHub.
    private function motDePasseAdmin(): string
    {
        $motDePasse = $_ENV['MOT_DE_PASSE_ADMIN_DEMO'] ?? $_SERVER['MOT_DE_PASSE_ADMIN_DEMO'] ?? '';
        if (strlen($motDePasse) < 12) {
            throw new \RuntimeException('Avant de charger les données de démonstration, ajoute dans le fichier .env.local une ligne MOT_DE_PASSE_ADMIN_DEMO= suivie d\'un mot de passe d\'au moins 12 caractères.');
        }

        return $motDePasse;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setNom($faker->lastName());
            $user->setPrenom($faker->firstName());
            $user->setEmail($faker->unique()->safeEmail());
            $user->setPassword(
                
                $this->userPasswordHasher->hashPassword(
                    $user,
                    bin2hex(random_bytes(16)) // mot de passe tiré au hasard : ces comptes de démonstration ne servent pas à se connecter 
                )
            );
            $user->setRoles(['ROLE_USER']); 

            $manager->persist($user); 
            
            $this->addReference('user_user_' . $i, $user); 
        }

     
        $adminUser = new User();
        $adminUser->setNom('Admin');
        $adminUser->setPrenom('AutoRent');
        $adminUser->setEmail('admin@autorent.com'); 
        $adminUser->setPassword(
            
            $this->userPasswordHasher->hashPassword(
                $adminUser,
                $this->motDePasseAdmin() 
            )
        );
        $adminUser->setRoles(['ROLE_ADMIN']); 
        $manager->persist($adminUser);
        $this->addReference('user_admin', $adminUser); 

        $manager->flush(); 
    }
}