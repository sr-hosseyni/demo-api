<?php

namespace App\Tests\Entity\User;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Component\Uid\Uuid;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertNotEquals;

class UuidGenerationTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    public function testUuidGenerate()
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setPassword(
            self::getContainer()->get('security.user_password_hasher')->hashPassword($user, '$3CR3T')
        );

        /* @var $manager EntityManager */
        $manager = self::getContainer()->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();

        $user = $manager->find(User::class, $user->getId());

        self::assertNotEmpty($user->getUuid());
    }

    public function testUuidValueInObjectAfterPersist()
    {
        $user = new User();
        $user->setEmail('test2@example.com');
        $user->setPassword(
            self::getContainer()->get('security.user_password_hasher')->hashPassword($user, '$3CR3T')
        );

        $manager = self::getContainer()->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();

        self::assertNotEmpty($user->getUuid());
    }

    public function testUuidNotRepeating()
    {
        // @todo
    }
}
