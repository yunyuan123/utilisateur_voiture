<?php

namespace App\Controller\Admin\Marque;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/marque')]
class ListeMarqueController extends AbstractController
{
    #[Route('/', name: 'app_les_marque_index', methods: ['GET'])]
    public function index(MarqueRepository $marqueRepository): Response
    {
        return $this->render('les_marque/index.html.twig', [
            'marques' => $marqueRepository->findAll(),
        ]);
    }

    
}
