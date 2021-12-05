<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class EnvTest extends ApiTestCase
{
    public function testEnvs()
    {
        $this->assertEquals('test', getenv('APP_ENV'));
        $this->assertEquals('example.com', getenv('TRUSTED_HOSTS'));
    }
}
