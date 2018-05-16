<?php

declare(strict_types=1);

namespace App\Controller;


use App\Entity\Category;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home_page")
     * @param CategoryService $categoryService
     * @return Response
     */
    public function homeAction(CategoryService $categoryService): Response
    {
        return $this->render('home/home.html.twig', [
            'categories' => $categoryService->getAllCategories(),
        ]);
    }
}