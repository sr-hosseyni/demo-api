<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AuthenticatedTokenService
{
    private array $decodedJwtToken = [];

    public function __construct(
        public TokenStorageInterface $tokenStorageInterface,
        public JWTTokenManagerInterface $jwtManager
    )
    {
        if ($this->tokenStorageInterface->getToken()) {
            if ($data = $this->jwtManager->decode($this->tokenStorageInterface->getToken())){
                $this->decodedJwtToken = $data;
            }
        }
    }

    public function getDecodedJwtToken(): array
    {
        return $this->decodedJwtToken;
    }

    public function getUUID(): string
    {
        return $this->decodedJwtToken['uuid'];
    }

    public function isAuthenticated()
    {
        return !is_null($this->tokenStorageInterface->getToken());
    }
}
