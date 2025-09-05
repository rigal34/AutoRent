<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Controller\SecurityController;

class SecurityControllerTest extends TestCase
{
    public function testSecurityControllerExists()
    {
        $this->assertTrue(class_exists(SecurityController::class)); 
    }

    public function testLoginMethodExists()  
    {
        $this->assertTrue(method_exists(SecurityController::class, 'login'));
    }

    public function testLoginMethodIsPublic()
    {
        $reflection = new \ReflectionMethod(SecurityController::class, 'login');
        $this->assertTrue($reflection->isPublic());
    }

    public function testLoginMethodHasCorrectParameters()
    {
        $reflection = new \ReflectionMethod(SecurityController::class, 'login');
        $this->assertEquals(1, $reflection->getNumberOfParameters()); 
    }

    public function testLoginMethodReturnsResponse()
    {
        $reflection = new \ReflectionMethod(SecurityController::class, 'login');
        $returnType = $reflection->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertEquals('Symfony\Component\HttpFoundation\Response', $returnType->getName());
    }

    public function testLoginMethodHasAuthenticationUtilsParameter()
    {
        $reflection = new \ReflectionMethod(SecurityController::class, 'login');
        $parameters = $reflection->getParameters();
        $premierParam = $parameters[0];

        $this->assertEquals('authenticationUtils', $premierParam->getName());
        $this->assertEquals('Symfony\Component\Security\Http\Authentication\AuthenticationUtils', $premierParam->getType()->getName());
    }

    public function testLogoutMethodThrowsLogicException()
{
    $controller = new SecurityController();
    
    $this->expectException(\LogicException::class);
    $this->expectExceptionMessage('This method can be blank - it will be intercepted by the logout key on your firewall.');
    
    $controller->logout();
}
}