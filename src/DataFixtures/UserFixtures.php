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
                    'password123' 
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
                'adminpassword' 
            )
        );
        $adminUser->setRoles(['ROLE_ADMIN']); 
        $manager->persist($adminUser);
        $this->addReference('user_admin', $adminUser); 

        $manager->flush(); 
    }
}