<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\ReservationController;

class ReservationControllerTest extends TestCase
{
    public function testReservationControllerExists()
    {
        $this->assertTrue(class_exists(ReservationController::class));
    }
    
    public function testNewMethodExists()
    {
        $this->assertTrue(method_exists(ReservationController::class, 'new'));
    }
    
    public function testNewMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(ReservationController::class, 'new');
        $this->assertTrue($reflection->isPublic());
    }
    
    
}