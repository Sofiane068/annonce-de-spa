<?php

namespace App\DataFixtures;

use App\DataFixtures\UtilisateurFixtures;
use App\Repository\SpaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnnonceFixtures extends Fixture implements DependentFixtureInterface
{
    protected SpaRepository $spaRepository;

    public function __construct(SpaRepository $spaRepository)
    {
        $this->spaRepository = $spaRepository;
    }

    public function load(ObjectManager $manager)
    {
    }

    public function getDependencies(): array
    {
        return [
            UtilisateurFixtures::class,
        ];
    }
}
