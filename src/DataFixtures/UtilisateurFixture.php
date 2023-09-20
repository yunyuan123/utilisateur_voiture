<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class UtilisateurFixture extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setEmail('test@test.fr');

        $password = $this->hasher->hashPassword($utilisateur, 'test123456');
        $utilisateur->setPassword($password);
        $manager->persist($utilisateur);

        $admin = new Utilisateur();
        $admin->setEmail('coucou@coucou.fr');
        $password = $this->hasher->hashPassword($admin, 'coucou123');
        $admin->setPassword($password);
        $admin->addRole('ROLE_ADMIN');
        $manager->persist($admin);

        $manager->flush();
    }
}
