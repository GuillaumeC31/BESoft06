<?php

namespace App\Controller;

use App\Entity\Fluide;
use App\Form\FluideType;
use App\Repository\FluideRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fluide')]
class FluideController extends AbstractController
{
    #[Route('/', name: 'app_fluide_index', methods: ['GET'])]
    public function index(FluideRepository $fluideRepository): Response
    {
        return $this->render('fluide/index.html.twig', [
            'fluides' => $fluideRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fluide_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fluide = new Fluide();
        $form = $this->createForm(FluideType::class, $fluide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fluide);
            $entityManager->flush();

            return $this->redirectToRoute('app_fluide_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fluide/new.html.twig', [
            'fluide' => $fluide,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fluide_show', methods: ['GET'])]
    public function show(Fluide $fluide): Response
    {
        return $this->render('fluide/show.html.twig', [
            'fluide' => $fluide,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fluide_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fluide $fluide, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FluideType::class, $fluide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fluide_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fluide/edit.html.twig', [
            'fluide' => $fluide,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fluide_delete', methods: ['POST'])]
    public function delete(Request $request, Fluide $fluide, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fluide->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fluide);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fluide_index', [], Response::HTTP_SEE_OTHER);
    }
}
