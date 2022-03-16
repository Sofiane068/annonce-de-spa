<?php

namespace App\DataFixtures;


use App\Entity\Chien;
use App\Repository\AdoptantRepository;
use App\Repository\AnnonceRepository;
use App\Repository\RaceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ChienFixtures extends Fixture implements DependentFixtureInterface
{
    protected RaceRepository $raceRepository;
    protected AdoptantRepository $adoptantRepository;
    protected AnnonceRepository $annonceRepository;

    public function __construct(RaceRepository $raceRepository, AdoptantRepository $adoptantRepository, AnnonceRepository $annonceRepository)
    {
        $this->raceRepository = $raceRepository;
        $this->adoptantRepository = $adoptantRepository;
        $this->annonceRepository = $annonceRepository;
    }

    public function load(ObjectManager $manager)
    {
        $tabNom = ['medor','brutus','felix','pepe','papa','pupu','felix1','pepe1','papa1','pupu1'];
        $tabChienCroises = [false,true,false,false,true,false,false,false,true,false];
        $tabAntecedents = ['blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla'];
        $tabLof = [false,true,false,false,true,false,false,false,true,false];
        $tabDecription = ['blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla','blabla'];
        $tabSociable = [false,true,false,false,true,false,false,false,true,false];
        $tabAdopter = [false,true,false,false,true,false,false,false,true,false];

        $races = $this->raceRepository->findAll();
        $adoptants = $this->adoptantRepository->findAll();
        $annonces= $this->annonceRepository->findAll();

        for ($i=0; $i < count($tabNom) - 1; $i++) { 
            $chien = new Chien();
            $chien->setNom($tabNom[$i]);
            $chien->setChienCroises($tabChienCroises[$i]);
            $chien->setAntecedents($tabAntecedents[$i]); 
            $chien->setLof($tabLof[$i]);
            $chien->setDescription($tabDecription[$i]);
            $chien->setSociable($tabSociable[$i]);
            $chien->setAdopter($tabAdopter[$i]);
            $chien->addRace($races[mt_rand(0 , count($races) - 1)]);
            if ($tabChienCroises[$i]) {
                $chien->addRace($races[mt_rand(0 , count($races) - 1)]);
            }
            $chien->setAdoptant($adoptants[mt_rand(0,count($adoptants)-1)]);
            $chien->setAnnonce($annonces[mt_rand(0, count($annonces) - 1)]);
            $manager->persist($chien);
        }

        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
            RaceFixtures::class,
            UtilisateurFixtures::class,
            AnnonceFixtures::class
        ];
    }
}
