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
class ModifierCompositionController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_liste_composition_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Composition $composition, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CompositionType::class, $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_liste_composition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('liste_composition/edit.html.twig', [
            'composition' => $composition,
            'form' => $form,
        ]);
    }
}
