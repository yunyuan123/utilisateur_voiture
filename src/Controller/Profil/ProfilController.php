<?php

namespace App\Controller\Profil;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Atribute\IsGranted;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    #[IsGranted("ROLE_UTILISATEUR")]
    public function index(): Response
    {

        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'utilisateur' => $this->getUser()
        ]);
    }
}
