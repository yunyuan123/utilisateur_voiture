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
class DetailComposantController extends AbstractController
{
    #[Route('/{id}', name: 'app_les_composant_show', methods: ['GET'])]
    public function show(Composant $composant): Response
    {
        return $this->render('les_composant/show.html.twig', [
            'composant' => $composant,
        ]);
    }
}