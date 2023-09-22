<?php

namespace App\Controller\Admin\Composition;

use App\Entity\Composition;
use App\Form\CompositionType;
use App\Repository\CompositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/composition')]
class ListeCompositionController extends AbstractController
{
    #[Route('/', name: 'app_liste_composition_index', methods: ['GET'])]
    public function index(CompositionRepository $compositionRepository): Response
    {
        return $this->render('liste_composition/index.html.twig', [
            'compositions' => $compositionRepository->findAll(),
        ]);
    }
}
