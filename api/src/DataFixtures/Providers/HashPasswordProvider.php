<?php

namespace App\DataFixtures\Providers;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * This Provider is created for testing, Look at api/fixtures/users.yaml
 */
class HashPasswordProvider
{
    public function __construct(public UserPasswordHasherInterface $hasher){}

    public function hashPassword(string $plainPassword): string
    {
        return $this->hasher->hashPassword(new User(), $plainPassword);
    }
}
