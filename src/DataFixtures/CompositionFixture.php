<?php

namespace App\DataFixtures;

use App\Entity\Composition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CompositionFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $composant2 = $this->getReference("composant_2");

        for($i=0; $i<5; $i++){
            $voiture = $this->getReference("voiture_$i");
            $composant = $this->getReference("composant_$i");

            $composition = new Composition();

            $composition->setVoiture($voiture);
            $composition->setComposant($composant);
            $manager->persist($composition);
            $this->addReference("composition_$i", $composition);
           
            $composition2 = new Composition();
            $composition2->setVoiture($voiture);
            $composition2->setComposant($composant2);
            $manager->persist($composition2);
           
        }
        $manager->flush();
    }
    public function getDependencies(){
        return [
            VoitureFixture::class,
            ComposantFixture::class,
        ];
    } 
}
