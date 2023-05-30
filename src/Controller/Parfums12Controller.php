<?php

namespace App\Controller;

use App\Entity\Parfums;
use App\Form\Parfums1Type;
use App\Repository\ParfumsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parfums12')]
class Parfums12Controller extends AbstractController
{
    #[Route('/', name: 'app_parfums12_index', methods: ['GET'])]
    public function index(ParfumsRepository $parfumsRepository): Response
    {
        return $this->render('parfums12/index.html.twig', [
            'parfums' => $parfumsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_parfums12_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ParfumsRepository $parfumsRepository): Response
    {
        $parfum = new Parfums();
        $form = $this->createForm(Parfums1Type::class, $parfum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parfumsRepository->save($parfum, true);

            return $this->redirectToRoute('app_parfums12_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parfums12/new.html.twig', [
            'parfum' => $parfum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parfums12_show', methods: ['GET'])]
    public function show(Parfums $parfum): Response
    {
        return $this->render('parfums12/show.html.twig', [
            'parfum' => $parfum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_parfums12_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parfums $parfum, ParfumsRepository $parfumsRepository): Response
    {
        $form = $this->createForm(Parfums1Type::class, $parfum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parfumsRepository->save($parfum, true);

            return $this->redirectToRoute('app_parfums12_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parfums12/edit.html.twig', [
            'parfum' => $parfum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parfums12_delete', methods: ['POST'])]
    public function delete(Request $request, Parfums $parfum, ParfumsRepository $parfumsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parfum->getId(), $request->request->get('_token'))) {
            $parfumsRepository->remove($parfum, true);
        }

        return $this->redirectToRoute('app_parfums12_index', [], Response::HTTP_SEE_OTHER);
    }
}
