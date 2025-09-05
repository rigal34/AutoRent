<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\CategorieController;

class CategorieControllerTest extends TestCase
{
    public function testCategorieControllerExists()
    {
        $this->assertTrue(class_exists(CategorieController::class));
    }

    public function testShowMethodExists()  // ✅ 'show' existe !
    {
        $this->assertTrue(method_exists(CategorieController::class, 'show'));
    }

    public function testShowMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(CategorieController::class, 'show');
        $this->assertTrue($reflection->isPublic());
    }

    public function testShowMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(CategorieController::class, 'show');
        $nombreParametres = $reflection->getNumberOfParameters();
        $this->assertEquals(1, $nombreParametres); 
    }
}