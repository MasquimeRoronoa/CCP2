<?php

namespace App\Controller;

use App\Entity\Techniques;
use App\Form\TechniquesType;
use App\Repository\TechniquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/techniques")
 */
class TechniquesController extends AbstractController
{
    /**
     * @Route("/", name="techniques_index", methods={"GET"})
     */
    public function index(TechniquesRepository $techniquesRepository): Response
    {
        return $this->render('techniques/index.html.twig', [
            'techniques' => $techniquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="techniques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $technique = new Techniques();
        $form = $this->createForm(TechniquesType::class, $technique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technique);
            $entityManager->flush();

            return $this->redirectToRoute('techniques_index');
        }

        return $this->render('techniques/new.html.twig', [
            'technique' => $technique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techniques_show", methods={"GET"})
     */
    public function show(Techniques $technique): Response
    {
        return $this->render('techniques/show.html.twig', [
            'technique' => $technique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="techniques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Techniques $technique): Response
    {
        $form = $this->createForm(TechniquesType::class, $technique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techniques_index');
        }

        return $this->render('techniques/edit.html.twig', [
            'technique' => $technique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techniques_delete", methods={"POST"})
     */
    public function delete(Request $request, Techniques $technique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$technique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($technique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('techniques_index');
    }
}
