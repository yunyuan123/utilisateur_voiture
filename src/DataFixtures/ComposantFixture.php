<?php

namespace App\DataFixtures;

use App\Entity\Composant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ComposantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i< 5; $i++ ){
            $composant = new Composant();
            $composant->setLabel("Composant $i");
            $composant->setDescription("Je suis la description de la composant $i");
            $manager->persist($composant);
            $this->addReference("composant_$i", $composant);
            
        } 

        $manager->flush();
    }
}
