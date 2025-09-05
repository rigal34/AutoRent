<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\VehiculeController;

class VehiculeControllerTest extends TestCase
{
    // Test si la classe existe
    public function testVehiculeControllerExists()
    {
        $this->assertTrue(class_exists(VehiculeController::class));
    }

    // Test si la méthode vehicule() existe
    public function testVehiculeMethodExists()  
    {
        $this->assertTrue(method_exists(VehiculeController::class, 'vehicule'));
    }

    // Test si la méthode vehicule() est publique
    public function testVehiculeMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'vehicule');
        $this->assertTrue($reflection->isPublic());
    }

    // Test si la méthode vehicule() a exactement 2 paramètres
    public function testVehiculeMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'vehicule');
        $this->assertEquals(2, $reflection->getNumberOfParameters());
    }

    // Test si la méthode vehicule() retourne bien Response
    public function testVehiculeMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'vehicule');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }

    // Test du PREMIER paramètre (VehiculeRepository)
    public function testVehiculeMethodHasVehiculeRepositoryParameter()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'vehicule');
        $parameters = $reflection->getParameters();
        $premierParam = $parameters[0];

        $this->assertEquals('vehiculeRepository', $premierParam->getName());
        $this->assertEquals('App\Repository\VehiculeRepository', $premierParam->getType()->getName());
    }

    // Test du DEUXIÈME paramètre (Request)
    public function testVehiculeMethodHasRequestParameter()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'vehicule');
        $parameters = $reflection->getParameters();
        $deuxiemeParam = $parameters[1];

        $this->assertEquals('request', $deuxiemeParam->getName());
        $this->assertEquals('Symfony\Component\HttpFoundation\Request', $deuxiemeParam->getType()->getName());
    }

    // Test si la méthode detailVehicule() existe
    public function testDetailVehiculeMethodExists()
    {
        $this->assertTrue(method_exists(VehiculeController::class, 'detailVehicule'));
    }

    // Test si la méthode detailVehicule() est publique
    public function testDetailVehiculeMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'detailVehicule');
        $this->assertTrue($reflection->isPublic());
    }

    // Test si detailVehicule() a 1 paramètre
    public function testDetailVehiculeMethodHasOneParameter()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'detailVehicule');
        $this->assertEquals(1, $reflection->getNumberOfParameters());
    }

    // Test si detailVehicule() retourne Response
    public function testDetailVehiculeMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'detailVehicule');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }

    // Test du paramètre de detailVehicule() (Vehicule)
    public function testDetailVehiculeMethodHasVehiculeParameter()
    {
        $reflection = new \ReflectionMethod(VehiculeController::class, 'detailVehicule');
        $parameters = $reflection->getParameters();
        $premierParam = $parameters[0];

        $this->assertEquals('vehicule', $premierParam->getName());
        $this->assertEquals('App\Entity\Vehicule', $premierParam->getType()->getName());
    }
    // Vérifier que VehiculeController hérite d'AbstractController
    public function testVehiculeControllerExtendsAbstractController()
    {
        $reflection = new \ReflectionClass(VehiculeController::class);
        $parentClass = $reflection->getParentClass();
        
        $this->assertNotNull($parentClass);
        $this->assertEquals('Symfony\Bundle\FrameworkBundle\Controller\AbstractController', $parentClass->getName());
    }

    
    public function testVehiculeControllerIsFinal()
    {
        $reflection = new \ReflectionClass(VehiculeController::class);
        $this->assertTrue($reflection->isFinal());
    }
}