<?php

namespace App\Controller\Voiture;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CompositionRepository;

class DetailVoitureController extends AbstractController
{
    #[Route('/voiture/{voiture}', name: 'app_detail_voiture')]
    public function index(Voiture $voiture, CompositionRepository $compositionRepository): Response
    {
        $compositions = $compositionRepository->findBy(["voiture" => $voiture->getId()]);
        return $this->render('voiture/detail.html.twig', [
            'voiture' => $voiture,
            'liste_composition' => $compositions
        ]);
    }
}
