<?php

namespace App\DataFixtures;

use App\DataFixtures\UtilisateurFixtures;
use App\Repository\SpaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Annonce;
use App\Repository\ChienRepository;
use DateTime;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    protected SpaRepository $spaRepository;
    protected ChienRepository $ChienRepository;

    public function __construct(SpaRepository $spaRepository, ChienRepository $ChienRepository)
    {
        $this->spaRepository = $spaRepository;
        $this->ChienRepository = $ChienRepository;
    }

    public function load(ObjectManager $manager)
    {
        $spas = $this->spaRepository->findAll();
        $chiens = $this->ChienRepository->findAll();

        for ($i = 0; $i < 10; $i++) {

            $int = rand(1646223317, 1646923317);

            $annonce = new Annonce();
            $annonce->setTitre('Chien à adopter');
            $annonce->setDateDeMiseAjour(new DateTime(date("Y-m-d", $int)));
            $annonce->setReponce(rand(0, 1));
            $annonce->setSpa($spas[mt_rand(0, count($spas) - 1)]);
            $randomNumber = mt_rand(1, 2);
            for ($j = 0; $j < $randomNumber; $j++) {
                $annonce->addChien($chiens[mt_rand(0, count($chiens) - 1)]);
            }
            $annonce->setNombredechien($annonce->getChiens()->count());
            $manager->persist($annonce);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UtilisateurFixtures::class,
            ChienFixtures::class
        ];
    }
}
