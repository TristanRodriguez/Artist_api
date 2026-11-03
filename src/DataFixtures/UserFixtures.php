<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("bob@sull.com");
        $user->setLogin("Bob");
        $user->setFirstname("Bob");
        $user->setLastname("Sull");
        $user->setLangue("fr");
        $user->setPassword("epfc");

        $manager->persist($user);

        $manager->flush();
    }
}
