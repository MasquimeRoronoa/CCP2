<?php

namespace App\Controller;

use App\Entity\Photographe;
use App\Form\Photographe1Type;
use App\Repository\PhotographeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photographe")
 */
class PhotographeController extends AbstractController
{
    /**
     * @Route("/", name="photographe_index", methods={"GET"})
     */
    public function index(PhotographeRepository $photographeRepository): Response
    {
        return $this->render('photographe/index.html.twig', [
            'photographes' => $photographeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photographe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photographe = new Photographe();
        $form = $this->createForm(Photographe1Type::class, $photographe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photographe);
            $entityManager->flush();

            return $this->redirectToRoute('photographe_index');
        }

        return $this->render('photographe/new.html.twig', [
            'photographe' => $photographe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographe_show", methods={"GET"})
     */
    public function show(Photographe $photographe): Response
    {
        return $this->render('photographe/show.html.twig', [
            'photographe' => $photographe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photographe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Photographe $photographe): Response
    {
        $form = $this->createForm(Photographe1Type::class, $photographe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photographe_index');
        }

        return $this->render('photographe/edit.html.twig', [
            'photographe' => $photographe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographe_delete", methods={"POST"})
     */
    public function delete(Request $request, Photographe $photographe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photographe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photographe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photographe_index');
    }
}
