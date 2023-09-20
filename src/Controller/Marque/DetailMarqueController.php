<?php

namespace App\Controller\Marque;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/les/marque')]
class DetailMarqueController extends AbstractController
{
    #[Route('/{id}', name: 'app_les_marque_show', methods: ['GET'])]
    public function show(Marque $marque): Response
    {
        return $this->render('les_marque/show.html.twig', [
            'marque' => $marque,
        ]);
    }
}