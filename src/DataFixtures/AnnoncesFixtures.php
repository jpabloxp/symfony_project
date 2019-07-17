<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Annonces;
use Faker\Factory;

class AnnoncesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();

        for($i = 1; $i <= 10; $i++){

            $annonce = new Annonces();

            $titre = $faker->sentence();
            $description = $faker->paragraph(2);
            $photo = $faker->imageUrl(500, 400);
            
            $annonce->setTitre($titre)
            ->setPrix(mt_rand(8000, 14000))
            ->setDescription($description)
            ->setPhoto($photo)
            ;
            $manager->persist($annonce);
        }

        $manager->flush();
    }
}
