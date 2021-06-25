<?php

namespace App\Controller;

use App\Repository\PhotographeRepository;
use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(PhotosRepository $photos): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'photo'=> $photos->findRandomImage(),
        ]);
    }
}
