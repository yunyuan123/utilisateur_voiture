<?php

namespace App\Controller\Admin\Voiture;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/voiture')]
class DetailVoitureController extends AbstractController
{
    #[Route('/{id}', name: 'app_liste_voiture_show', methods: ['GET'])]
    public function show(Voiture $voiture): Response
    {
        return $this->render('liste_voiture/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }
}
