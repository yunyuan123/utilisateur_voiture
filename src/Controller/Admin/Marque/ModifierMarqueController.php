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

#[Route('/les/marque')]
class ModifierMarqueController extends AbstractController
{
    
    #[Route('/{id}/edit', name: 'app_les_marque_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Marque $marque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_les_marque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('les_marque/edit.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }

}
