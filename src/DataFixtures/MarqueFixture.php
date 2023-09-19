<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MarqueFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i< 5; $i++ ){
            $marque = new Marque();
            $marque->setLabel("Marque $i");
            $marque->setLabel("Je suis la description de la marque $i");
            $manager->persist($marque);
            $this->addReference("marque_$i", $marque);
        }

        $manager->flush();
    }
}
