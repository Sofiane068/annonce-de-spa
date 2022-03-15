<?php

namespace App\DataFixtures;

use App\DataFixtures\UtilisateurFixtures;
use App\Repository\SpaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use DateTime;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    protected SpaRepository $spaRepository;

    public function __construct(SpaRepository $spaRepository)
    {
        $this->spaRepository = $spaRepository;
    
    }

    public function load(ObjectManager $manager)
    {
        $spas = $this->spaRepository->findAll();
        for ($i = 0; $i < 10; $i++) {

            $int = rand(1646223317, 1646923317);

            $annonce=new Annonce();
            $annonce->setTitre('Chien à adopter');
            $annonce->setNombredechien(rand(1,4));
            $annonce->setDateDeMiseAjour(new DateTime(date("Y-m-d", $int)));
            $annonce->setReponce(rand(0, 1));
            $annonce->setSpa($spas[mt_rand(0, count($spas) - 1)]);
            $manager->persist($annonce);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UtilisateurFixtures::class,
        ];
    }
}
