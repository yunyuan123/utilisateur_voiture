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
class DeleteComposantController extends AbstractController
{
    #[Route('/{id}', name: 'app_les_composant_delete', methods: ['POST'])]
    public function delete(Request $request, Composant $composant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$composant->getId(), $request->request->get('_token'))) {
            $entityManager->remove($composant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_les_composant_index', [], Response::HTTP_SEE_OTHER);
    }
}