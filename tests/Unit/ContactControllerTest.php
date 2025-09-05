<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\ContactController;

class ContactControllerTest extends TestCase
{
    public function testContactControllerExists()
    {
        $this->assertTrue(class_exists(ContactController::class));
    }

    public function testIndexMethodExists()  
    {
        $this->assertTrue(method_exists(ContactController::class, 'index'));
    }

    public function testIndexMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(ContactController::class, 'index');
        $this->assertTrue($reflection->isPublic());
    }

    public function testIndexMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(ContactController::class, 'index');
        $nombreParametres = $reflection->getNumberOfParameters();
        $this->assertEquals(2, $nombreParametres); // 
    }
    
    /*
     * Teste que la méthode index retourne une réponse
     */
    public function testIndexMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(ContactController::class, 'index');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }
}