<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\HomeController;

class HomeControllerTest extends TestCase
{
    public function testHomeControllerExists()
    {
        $this->assertTrue(class_exists(HomeController::class)); 
    }

    public function testHomeMethodExists() 
    {
        $this->assertTrue(method_exists(HomeController::class, 'home'));
    }

    public function testHomeMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(HomeController::class, 'home');
        $this->assertTrue($reflection->isPublic());
    }

    public function testHomeMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(HomeController::class, 'home');
        $nombreParametres = $reflection->getNumberOfParameters();
        $this->assertEquals(1, $nombreParametres); 
    }

    public function testHomeMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(HomeController::class, 'home');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }

    public function testHomeMethodHasCategorieRepositoryParameter()
    {
        $reflection = new \ReflectionMethod(HomeController::class, 'home');
        $parameters = $reflection->getParameters();
        $premierParam = $parameters[0];

        $this->assertEquals('categorieRepository', $premierParam->getName());
        $this->assertEquals('App\Repository\CategorieRepository', $premierParam->getType()->getName());
    }
}