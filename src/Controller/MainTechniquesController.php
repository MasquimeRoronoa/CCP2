<?php

namespace App\Controller;

use App\Repository\PhotographeRepository;
use App\Repository\PhotosRepository;
use App\Repository\TechniquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainTechniquesController extends AbstractController
{
    /**
     * @Route("/main/techniques", name="main_techniques")
     */
    public function index(TechniquesRepository $techniquesRepository): Response
    {
        return $this->render('main_techniques/index.html.twig', [
            'controller_name' => 'MainTechniquesController',
            'technique' => $techniquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/main/techniques/{id}", name="techniques_detail")
     */
    public function showCategories(TechniquesRepository $techniquesRepository, int $id, PhotosRepository $photosRepository, PhotographeRepository $photographeRepository): Response
    {

        $find = $techniquesRepository->find($id);


        return $this->render('main_techniques/show.html.twig', [
                'techniques' => $photosRepository->findImageTech($find->getId()),
                'techniquess' => $techniquesRepository->findTechniques($find->getId()),
            ]


        );
    }
}
