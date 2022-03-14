<?php

namespace App\DataFixtures;


use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class RaceFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $tabNom = ['Caniche','Caniche1','Caniche2','Caniche3','Caniche4','Caniche5','Caniche6','Caniche7','Caniche8','Caniche9'];
        for ($i=0; $i < count($tabNom) - 1; $i++) { 
            $race = new Race();
            $race->setNom($tabNom[$i]);
            $manager->persist($race);
        }

        $manager->flush();


    }

}
