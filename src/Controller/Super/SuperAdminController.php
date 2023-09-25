<?php

namespace App\Controller\Super;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Atribute\IsGranted;
use App\Repository\UtilisateurRepository;

class SuperAdminController extends AbstractController
{
    #[Route('/super', name: 'app_super_admin')]
    #[IsGranted("ROLE_SUPER_ADMIN")]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        $utilisateurs = $utilisateurRepository->findAll();
        return $this->render('super_admin/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
