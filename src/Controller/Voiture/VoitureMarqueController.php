<?php

namespace App\Controller\Voiture;

use App\Entity\Marque;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureMarqueController extends AbstractController
{
    #[Route('/voiture/{marque}', name: 'app_voiture_marque')]
    public function invoke(Marque $marque, VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findBy(["archive" => false, "marque" => $marque]);
        return $this->render('voiture/liste.html.twig', [
            'voitures' => $voitures,
        ]);
    }
}
