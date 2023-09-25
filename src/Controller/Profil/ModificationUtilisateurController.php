<?php

namespace App\Controller\Profil;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Atribute\IsGranted;

class ModificationUtilisateurController extends AbstractController
{
    #[Route('/profil/modification', name: 'app_modification_utilisateur')]
    #[IsGranted("ROLE_UTILISATEUR")]
    public function index(Request $request, 
        UserPasswordHasherInterface $passwordHasher, 
        EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtilisateurType::class, $this->getUser());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){
          $profil  = $form->getData();
          $plainPassword = $form->get('plainPassword')->getData();
          if($plainPassword !== null){
            $profil->setPassword($passwordHasher->hashPassword($profil, $plainPassword));
          }
          $entityManager->flush();
          $this->addFlash('success', 'Modication ok');
          return $this->redirectToRoute('app_profile',[],Response::HTTP_SEE_OTHER);
        }
        return $this->render('profil/edit.html.twig', [
            'utilisateur' => $this->getUser(),
            'form' => $form,
        ]);
    }
}
