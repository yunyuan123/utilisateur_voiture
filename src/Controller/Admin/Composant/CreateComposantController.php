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
class CreateComposantController extends AbstractController
{
    #[Route('/new', name: 'app_les_composant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $composant = new Composant();
        $form = $this->createForm(ComposantType::class, $composant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($composant);
            $entityManager->flush();

            return $this->redirectToRoute('app_les_composant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('les_composant/new.html.twig', [
            'composant' => $composant,
            'form' => $form,
        ]);
    }   
}
