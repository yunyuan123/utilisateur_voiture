<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Atribute\IsGranted;


class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    // 4iéme maniere de definir le fait de gerer les roles utilisateur => acceder au controller admin
    #[IsGranted("ROLE_ADMIN")]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
