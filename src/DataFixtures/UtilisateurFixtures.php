<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Administrateur;
use App\Entity\Adoptant;
use App\Entity\Spa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        // create 20 Utilisateurs! Bam!
        $tabVille = ['new york', 'Lyon', 'californie', 'Paris', 'dijon', 'Bordeaux'];

        for ($i = 0; $i < 20; $i++) {
            if ($i % 3 == 0) {
                $utilisateur = new Administrateur();
                $utilisateur->setMail('admin' . $i . '@gmail.com');
            } elseif ($i % 3 == 1) {
                $utilisateur = new Adoptant();
                $utilisateur->setMail('adoptant' . $i . '@gmail.com');
                $utilisateur->setNom('adoptant' . $i);
                $utilisateur->setPrenom($i . 'adoptant' . $i);
                $utilisateur->setDepartement(rand(10, 69));
                $utilisateur->setVille($tabVille[rand(0, count($tabVille)-1)]);
                $utilisateur->setTelephone('0615' . $i . '8749');
            } elseif ($i % 3 == 2) {
                $utilisateur = new Spa();
                $utilisateur->setMail('spa' . $i . '@gmail.com');
                $utilisateur->setNomAssociation('spa' . $i . '012548');
                $utilisateur->setNombreAnnonceApourvoir(rand(1, 10));
                $utilisateur->setNombreAnnoncePourvues(rand(1, 10));
            }
            $utilisateur->setMotDePasse(
                $this->hasher->hashPassword($utilisateur, '123456')
            );
            $manager->persist($utilisateur);
        }

        $manager->flush();
    }
}
