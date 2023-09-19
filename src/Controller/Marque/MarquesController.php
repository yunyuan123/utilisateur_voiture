<?php

namespace App\Controller\Marque;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MarqueRepository;

class MarquesController extends AbstractController
{
    #[Route('/marques', name: 'app_marques')]
    public function __invoke(MarqueRepository $marqueRepository): Response
    {
        $marques = $marqueRepository->findAll();
        return $this->render('marques/liste.html.twig', [
            'marques' => $marques,
        ]);
    }
}
