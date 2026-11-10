<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $uph) {
        $this->passwordHasher = $uph;
    }

    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                "email"=> "bob@dylan.com",
                "login"=> "Bobby",
                "firstname"=> "Bob",
                "lastname"=> "Dylan",
                "langue"=> "FR",
                "password"=> "epfc",
                "role"=> ["ROLE_USER"]
            ],
            [
                "email"=> "celine@Dion.com",
                "login"=> "Cécé",
                "firstname"=> "Céline",
                "lastname"=> "Dion",
                "langue"=> "FR",
                "password"=> "epfc",
                "role"=> ["ROLE_USER"]
            ],
            [
                "email"=> "jimi@hendrix.com",
                "login"=> "Jim",
                "firstname"=> "Jimi",
                "lastname"=> "Hendrix",
                "langue"=> "EN",
                "password"=> "epfc",
                "role"=> ["ROLE_USER"]
            ],
            [
                "email"=> "tristan@rodriguez.com",
                "login"=> "Titi",
                "firstname"=> "Tristan",
                "lastname"=> "Rodriguez",
                "langue"=> "FR",
                "password"=> "epfc",
                "role"=> ["ROLE_ADMIN"]
            ],
        ];

        foreach($data as $row) {
        
            $user = new User();
            $user->setEmail($row['email']);
            $user->setLogin($row['login']);
            $user->setFirstname($row['firstname']);
            $user->setLastname($row['lastname']);
            $user->setLangue($row["langue"]);

            $hashedPassword = $this->passwordHasher->hashPassword($user, $row['password']);
            $user->setPassword($hashedPassword);
            $user->setRoles($row['role']);
        
            $manager->persist($user);
        }

        $manager->flush();
    }
}
