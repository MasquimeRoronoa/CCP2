<?php

namespace App\Controller;

use App\Repository\PhotographeRepository;
use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPhotographeController extends AbstractController
{
    /**
     * @Route("/main/photographe", name="main_photographe")
     */
    public function index(PhotographeRepository $photographes): Response
    {
        return $this->render('main_photographe/index.html.twig', [
            'controller_name' => 'MainPhotographeController',
            'photographe'=> $photographes->findAll(),
        ]);
    }

    /**
     * @Route("/main/photographe/{id}", name="photographe_detail")
     */
    public function showCategories(PhotographeRepository $photographeRepository, int $id, PhotosRepository $photosRepository): Response
    {

        $find = $photosRepository->find($id);


        return $this->render('main_photographe/show.html.twig', [
                'photographes' => $photosRepository->findImagePhotographe($find->getId()),
                'photographess' => $photographeRepository->findPhotographe($find->getId()),
            ]


        );
    }
}
