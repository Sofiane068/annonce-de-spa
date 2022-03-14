<?php

namespace App\DataFixtures;

use App\Repository\ChienRepository;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class ImageFixtures extends Fixture implements DependentFixtureInterface
{

protected ChienRepository $chienRepository;

    public function __construct(ChienRepository $chienRepository)
    {
        $this->chienRepository = $chienRepository;
    }



    public function load(ObjectManager $manager)
    {
        $tabImage = ['https://www.kingpet.fr/ph/p9DntdtPZhNQEZOAFpBGpN6uLVTWesqZtugwv1.jpg?v=31&fm=webp&w=750&h=563&q=50',
        'https://media.gettyimages.com/photos/cute-happy-dog-playing-with-a-stick-picture-id1184184060?k=20&m=1184184060&s=612x612&w=0&h=bxEn6LtJBegPuSwsL9RlyPob-7Si6lLpnROvLadFaAg=',
        'https://media.gettyimages.com/photos/portrait-young-woman-with-laughing-corgi-puppy-nature-background-picture-id1276788283?k=20&m=1276788283&s=612x612&w=0&h=U8vbtohy7ptRPKs_xHJ-U1niZW84jZjbMa4GArepJKc=',
        'https://media.gettyimages.com/photos/young-woman-with-dog-picture-id1060529042?k=20&m=1060529042&s=612x612&w=0&h=Aufce7ZQETWvxwUgcB_09Crtd7LkhR1348C6LD8VG2c=',
        'https://media.gettyimages.com/photos/portrait-of-dog-in-the-cornfield-picture-id1149548556?k=20&m=1149548556&s=612x612&w=0&h=997C7eoBYHso4i7QCHipVqk3WqhUIYv9GPncQbFJQrM=',
        'https://media.gettyimages.com/photos/portrait-of-a-chocolate-labrador-in-the-countryside-picture-id1255970307?k=20&m=1255970307&s=612x612&w=0&h=YSNIPJSzGF-R4y6K2C1xT0Tt9cebPmB1Kd9Up9RcHAM=',
        'https://media.gettyimages.com/photos/big-ears-upside-down-picture-id133441603?k=20&m=133441603&s=612x612&w=0&h=6RkgGXWzZ_RDm6j5KgKUycUeaUes_mkIWp3LnnQgQ1U=',
        'https://media.gettyimages.com/photos/senior-black-labrador-relaxing-on-armchair-picture-id1260316389?k=20&m=1260316389&s=612x612&w=0&h=zIB_2peg9O9pjQyC8ngNpCjrMIzVYZyunrXpcHixfmM=',
        'https://media.gettyimages.com/photos/happy-dog-picture-id1155399510?k=20&m=1155399510&s=612x612&w=0&h=8g6H-6YSlw2e_UYaM2EenyY0JDS32SBpYMtXQSf3Ge8=',
        'https://media.gettyimages.com/photos/cute-dog-running-outside-picture-id1124609720?k=20&m=1124609720&s=612x612&w=0&h=VtMBAg2eF68EhOVQYARTSKFLjjOpBp9AQDZ24LDwTfA='];
        
        $chiens= $this->chienRepository->findAll();

        for ($i=0; $i < count($tabImage) - 1; $i++) { 
            $image = new Image();
            $image->setNom($tabImage[$i]);
            $image->setChien($chiens[mt_rand(0 , count($chiens) - 1)]);
            $manager->persist($image);
        }

        $manager->flush();


    }

    public function getDependencies(): array
    {
        return [
            ChienFixtures::class,
        ];
    }
}
