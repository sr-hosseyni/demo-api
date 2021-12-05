<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;

class GreetingsTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testCreateGreeting()
    {
        $client = self::createClient();

        // retrieve a token
        $response = $client->request('POST', '/authentication_token', [
            'headers' => ['Content-Type' => 'application/json'],
            'json'    => [
                'email'    => 'default@example.com',
                'password' => 'parool',
            ],
        ]);

        $json  = $response->toArray();
        $token = $json['token'];

        $response = static::createClient()->request('POST', '/greetings', [
            'auth_bearer' => $token,
            'json' => [
                'name' => 'Kévin',
            ]
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Greeting',
            '@type'    => 'Greeting',
            'name'     => 'Kévin',
        ]);
    }
}
