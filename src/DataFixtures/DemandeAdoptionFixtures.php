<?php

namespace App\DataFixtures;

use App\Entity\DemandeAdoption;
use App\Repository\AdoptantRepository;
use App\Repository\ChienRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DemandeAdoptionFixtures extends Fixture implements DependentFixtureInterface
{
    protected $ChienRepository;
    protected $AdoptantRepository;

    public function __construct(ChienRepository $ChienRepository, AdoptantRepository $AdoptantRepository)
    {
        $this->ChienRepository = $ChienRepository;
        $this->AdoptantRepository = $AdoptantRepository;
    }

    public function load(ObjectManager $manager)
    {
        $chiens = $this->ChienRepository->findAll();
        $adoptants = $this->AdoptantRepository->findAll();

        $int = rand(1646223317, 1646923317);
        $randomNumber = mt_rand(1, 2);
        for ($i = 0; $i < 10; $i++) {
            $demandeAdoption = new DemandeAdoption();
            $demandeAdoption->setValider((bool) mt_rand(0, 1));
            $demandeAdoption->setDateEmission(new DateTime(date("Y-m-d", $int)));
            $demandeAdoption->addChien($chiens[$randomNumber]);
            $demandeAdoption->setAdoptant($adoptants[mt_rand(0,count($adoptants)-1)]);
            $manager->persist($demandeAdoption);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            UtilisateurFixtures::class,
            ChienFixtures::class
        ];
    }
}
