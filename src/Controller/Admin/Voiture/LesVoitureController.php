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
class LesVoitureController extends AbstractController
{
    #[Route('/', name: 'app_liste_voiture_index', methods: ['GET'])]
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('liste_voiture/index.html.twig', [
            'voitures' => $voitureRepository->findAll(),
        ]);
    }


}
