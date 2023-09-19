<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class VoitureFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i< 5; $i++ ){
            $voiture = new Voiture();
            $voiture->setPrix(1000);
            $voiture->setModel("voiture $i");
            // Récupére depuis la registre des fixtures un objet 'marque'
            $voiture->setMarque($this->getReference("marque_$i"));
            // persist la donneé
            $manager->persist($voiture);
            // Ajout une reference de la voiture au registre des fixtures
            $this->addReference("voiture_$i", $voiture);
        }
        // 
        $manager->flush();
    }
    // Definis dans un tableau les differentes dependance pour que voitureFixtures s'excute correctement
    public function getDependencies(){
        return [
            MarqueFixture::class,
        ];
    }
}
