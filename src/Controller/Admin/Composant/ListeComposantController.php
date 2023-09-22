<?php

namespace App\Controller\Admin\Composant;

use App\Entity\Composant;
use App\Form\ComposantType;
use App\Repository\ComposantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/composant')]
class ListeComposantController extends AbstractController
{
    #[Route('/', name: 'app_les_composant_index', methods: ['GET'])]
    public function index(ComposantRepository $composantRepository): Response
    {
        return $this->render('les_composant/index.html.twig', [
            'composants' => $composantRepository->findAll(),
        ]);
    }

    
}
