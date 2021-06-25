<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use App\Repository\PhotographeRepository;
use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainCategoriesController extends AbstractController
{
    /**
     * @Route("/main/categories", name="main_categories")
     */
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('main_categories/index.html.twig', [
            'controller_name' => 'MainCategoriesController',
            'categorie'=> $categoriesRepository->findAll(),

        ]);
    }

    /**
     * @Route("/main/categories/{id}", name="categories_detail")
     */
    public function showCategories(CategoriesRepository $categoriesRepository, int $id, PhotosRepository $photosRepository, PhotographeRepository $photographeRepository): Response
    {

        $find = $categoriesRepository->find($id);


        return $this->render('main_categories/show.html.twig',[
            'categories'=> $photosRepository->findImage($find->getId()),
                'categoriess'=>$categoriesRepository->findCategories($find->getId()),
                'photographess' => $photographeRepository->findPhotographe($find->getId()),

            ]


        );

    }



}
