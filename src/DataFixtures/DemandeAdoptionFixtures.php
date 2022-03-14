<?php

namespace App\DataFixtures;

use App\Entity\DemandeAdoption;
use App\Repository\MessageRepository;
use App\Repository\AdoptantRepository;
use App\Repository\ChienRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DemandeAdoptionFixtures extends Fixture implements DependentFixtureInterface
{

    protected $MessageRepository ;
    protected $ChienRepository;
    protected $AdoptantRepository;

    public function __construct(MessageRepository $MessageRepository, ChienRepository $ChienRepository, AdoptantRepository $AdoptantRepository)
    {
        $this->MessageRepository = $MessageRepository;
        $this->ChienRepository = $ChienRepository;
        $this->AdoptantRepository = $AdoptantRepository;
    }

    public function load(ObjectManager $manager)
    {
        $messages = $this->MessageRepository->findAll();
        $chiens= $this->ChienRepository->findAll();
        $adoptants= $this->AdoptantRepository->findAll();

        $int = rand(1646223317, 1646923317);

        for ($i = 0; $i < 10; $i++) {
            $demandeAdoption = new DemandeAdoption();
            $demandeAdoption->setValider((bool) mt_rand(0, 1));
            $demandeAdoption->setDateEmission(new DateTime(date("Y-m-d", $int)));
            $randomNumber = mt_rand(0, count($messages) - 1);
            $demandeAdoption->addMessage($messages[$i]);
            $demandeAdoption->addChien($chiens[$randomNumber]);
            $demandeAdoption->setAdoptant($adoptants[$randomNumber]);
            $manager->persist($demandeAdoption);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            MessageFixtures::class,
            AdoptantFixtures::class,
            ChienFixtures::class
        ];
    }
}
