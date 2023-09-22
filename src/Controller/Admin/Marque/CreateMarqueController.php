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
class CreateMarqueController extends AbstractController
{
    #[Route('/new', name: 'app_les_marque_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($marque);
            $entityManager->flush();

            return $this->redirectToRoute('app_les_marque_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('les_marque/new.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }
}