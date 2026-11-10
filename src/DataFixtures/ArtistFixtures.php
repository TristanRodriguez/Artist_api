<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    
    {
        $data = [
            [
                "firstname" => "Bob",
                "lastname"=> "Dylan"
            ],
            [
                "firstname" => "Céline",
                "lastname"=> "Dion"
            ],
            [
                "firstname" => "Jimy",
                "lastname"=> "Hendrix"
            ],
            [
                "firstname" => "Claude",
                "lastname"=> "MccSolaar"
            ],
            
        ];

        foreach($data as $row) {
            $artist = new Artist();
            $artist->setFirstname($row['firstname']);
            $artist->setLastname($row['lastname']);

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
