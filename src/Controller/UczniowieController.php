<?php

namespace App\Controller;

use App\Entity\Uczniowie;
use App\Form\UczniowieType;
use App\Repository\UczniowieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/uczniowie")
 */
class UczniowieController extends AbstractController
{
    /**
     * @Route("/", name="uczniowie_index", methods={"GET"})
     */
    public function index(UczniowieRepository $uczniowieRepository): Response
    {
        return $this->render('uczniowie/index.html.twig', [
            'uczniowies' => $uczniowieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="uczniowie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uczniowie = new Uczniowie();
        $form = $this->createForm(UczniowieType::class, $uczniowie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uczniowie);
            $entityManager->flush();

            return $this->redirectToRoute('uczniowie_index');
        }

        return $this->render('uczniowie/new.html.twig', [
            'uczniowie' => $uczniowie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uczniowie_show", methods={"GET"})
     */
    public function show(Uczniowie $uczniowie): Response
    {
        return $this->render('uczniowie/show.html.twig', [
            'uczniowie' => $uczniowie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="uczniowie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Uczniowie $uczniowie): Response
    {
        $form = $this->createForm(UczniowieType::class, $uczniowie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uczniowie_index');
        }

        return $this->render('uczniowie/edit.html.twig', [
            'uczniowie' => $uczniowie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uczniowie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Uczniowie $uczniowie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uczniowie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uczniowie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('uczniowie_index');
    }
}
