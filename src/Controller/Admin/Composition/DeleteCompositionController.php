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
class DeleteCompositionController extends AbstractController
{  
    #[Route('/{id}', name: 'app_liste_composition_delete', methods: ['POST'])]
    public function delete(Request $request, Composition $composition, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$composition->getId(), $request->request->get('_token'))) {
            $entityManager->remove($composition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_liste_composition_index', [], Response::HTTP_SEE_OTHER);
    }
}
