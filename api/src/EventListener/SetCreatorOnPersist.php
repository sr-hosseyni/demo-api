<?php

namespace App\EventListener;

use App\Security\AuthenticatedTokenService;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class SetCreatorOnPersist
{
    public function __construct(public AuthenticatedTokenService $tokenService)
    {
    }

    public function prePersist(LifecycleEventArgs $eventArgs): void
    {
        $entity = $eventArgs->getObject();

        if (!method_exists($entity, 'setCreatedBy')) {
            return;
        }

        $entity->setCreatedBy($this->tokenService->getUUID());
    }
}
