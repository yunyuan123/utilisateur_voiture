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
class ModifierComposantController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_les_composant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Composant $composant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComposantType::class, $composant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_les_composant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('les_composant/edit.html.twig', [
            'composant' => $composant,
            'form' => $form,
        ]);
    }
}