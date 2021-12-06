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
//        if ($this->tokenStorageInterface->hasToken()) {
//
//        }
//
//        if ($this->jwtManager->decode($this->tokenStorageInterface->getToken())){
//
//        }
    }

    public function getDecodedJwtToken(): array
    {
        return $this->jwtManager->decode($this->tokenStorageInterface->getToken()) ;
    }

    public function getUUID(): string
    {
        /**
         * @todo Implement encoding user uuid in JTW token
         */
        return 'asdft-plmki-mnbgw-rgbvf-zqplm';
    }
}
