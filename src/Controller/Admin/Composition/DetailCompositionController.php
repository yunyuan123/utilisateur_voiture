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
class DetailCompositionController extends AbstractController
{

    
    #[Route('/{id}', name: 'app_liste_composition_show', methods: ['GET'])]
    public function show(Composition $composition): Response
    {
        return $this->render('liste_composition/show.html.twig', [
            'composition' => $composition,
        ]);
    }
}
