<?php

namespace App\Controller\Voiture;

use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeVoituresController extends AbstractController
{
    #[Route('/voitures', name: 'app_liste_voitures')]
    public function __invoke(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findBy(["archive" => false]);
        return $this->render('voiture/liste.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}
