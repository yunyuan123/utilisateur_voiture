<?php

namespace App\Controller\Admin\Composition;

use App\Entity\Composition;
use App\Entity\Voiture;
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
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/{voiture}/new', name: 'app_liste_composition_new', methods: ['GET', 'POST'])]
    public function new(Voiture $voiture, Request $request, EntityManagerInterface $entityManager): Response
    {
        // modifier le controller d'ajout d'une composition, pour setter la voiture dans l'instance de la composition
        $composition = new Composition();
        $form = $this->createForm(CompositionType::class, $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $composition->setVoiture($voiture);
            $entityManager->persist($composition);
            $entityManager->flush();
        // redirection 
            return $this->redirectToRoute('app_voiture_show', ["id" => $voiture->getId()]);
        }

        return $this->render('liste_composition/new.html.twig', [
            'composition' => $composition,
            'form' => $form,
        ]);
    }
}
