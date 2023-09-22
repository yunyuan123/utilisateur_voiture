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
class ModifierVoitureController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_liste_voiture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Voiture $voiture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_liste_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('liste_voiture/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }
}
