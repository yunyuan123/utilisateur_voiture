<?php

namespace App\Controller\Super;

use Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Atribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/superadmin/utilisateur")]
class AjouteRoleAdminController extends AbstractController
{
    #[Route('/super/{utilisateur}/ajout_admin', name: 'app_ajoute_role_admin')]
    #[IsGranted("ROLE_SUPER_ADMIN")]
    public function index(Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $role_ajoute = "ROLE_ADMIN";
        if(!in_array("ROLE_ADMIN", $utilisateur->getRoles())){
            $utilisateur->addRole($role_ajoute);
            $entityManager->persist($utilisateur);
            $entityManager->flush();
            $this->addFlash("success", "Ajout du role admin est ok");
        }else{
            $this->addFlash("fail", "le role admin existe déja, pas rejouté");
        }
        return $this->render('ajoute_role_admin_controller_php/index.html.twig', [
            'controller_name' => 'AjouteRoleAdminControllerPhpController',
        ]);
    }
}
