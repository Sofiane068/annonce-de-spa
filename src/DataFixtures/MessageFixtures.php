<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public function __construct()
    {
    }

    public function load(ObjectManager $manager)
    {
        $tabMessage = [
            'Ce toutou est trop mignon serait ce possible de ladopter ?',
            'Waw il est vraiment trop beau il ira très bien avec la deco de mon salon',
            'Je dispose de tout les accessoires pour ce type de chien, je pense quil sera très heureux avec moi',
            'Jadore ce type de chien, il gardera très bien ma maison ',
            'serait-ce possible dadopter les deux chien en meme temp ?',
            'Quelle sont les conditions pour avoir la garde de ce chien ?',
            'Jhabite dans une grande maison avec jardin je pense que kiki sera très heureux avec nous',
            'ma fille veut ce chien à tout prix ,donner le moi !!!',
            'waou il est super mignon est ce que je peut passer dans la semaine ?',
            'jadore ce chien, serait il disponible ?'
        ];

        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            $message->setTexte($tabMessage[$i]);
            $message->setRepondu((bool) mt_rand(0, 1));
            $manager->persist($message);
        }
        $manager->flush();
    }
}
