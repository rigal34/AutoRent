<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VehiculeControllerTest extends WebTestCase
{
    public function testHomePageWorks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

    public function testVehiculesPageWorks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/vehicules');
        $this->assertResponseIsSuccessful();
    }

    public function testContactPageWorks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/contact');
        $this->assertResponseIsSuccessful();
    }
}