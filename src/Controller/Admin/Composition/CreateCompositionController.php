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
class CreateCompositionController extends AbstractController
{
    
    #[Route('/new', name: 'app_liste_composition_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $composition = new Composition();
        $form = $this->createForm(CompositionType::class, $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($composition);
            $entityManager->flush();

            return $this->redirectToRoute('app_liste_composition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('liste_composition/new.html.twig', [
            'composition' => $composition,
            'form' => $form,
        ]);
    }
}
