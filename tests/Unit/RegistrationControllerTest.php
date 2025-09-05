<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\RegistrationController;

class RegistrationControllerTest extends TestCase
{
    public function testRegistrationControllerExists()
    {
        $this->assertTrue(class_exists(RegistrationController::class)); 
    }

    public function testRegistrationMethodExists()  
    {
        $this->assertTrue(method_exists(RegistrationController::class, 'register'));
    }

    public function testRegistrationMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(RegistrationController::class, 'register');
        $this->assertTrue($reflection->isPublic());
    }

    public function testRegistrationMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(RegistrationController::class, 'register');
        $nombreParametres = $reflection->getNumberOfParameters();
        $this->assertEquals(4, $nombreParametres); 
    }

    public function testRegistrationMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(RegistrationController::class, 'register');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }

    public function testRegistrationMethodHasCategorieRepositoryParameter()
    {
        $reflection = new \ReflectionMethod(RegistrationController::class, 'register');
        $parameters = $reflection->getParameters();
        $premierParam = $parameters[0];

        $this->assertEquals('request', $premierParam->getName());
        $this->assertEquals('Symfony\Component\HttpFoundation\Request', $premierParam->getType()->getName());
    }


public function testRegistrationMethodHasUserPasswordHasherParameter()
{
    $reflection = new \ReflectionMethod(RegistrationController::class, 'register');
    $parameters = $reflection->getParameters();
    $deuxiemeParam = $parameters[1];

    $this->assertEquals('userPasswordHasher', $deuxiemeParam->getName());
    $this->assertEquals('Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface', $deuxiemeParam->getType()->getName());
}





}
