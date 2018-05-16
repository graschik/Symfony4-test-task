<?php

declare(strict_types=1);

namespace App\Controller;


use App\Service\CategoryService;
use App\Service\ProductService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{categoryId}",
     *     name="show_category_id",
     *     requirements={
     *          "categoryId"="\d+"
     *       }
     *    )
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @param int $categoryId
     * @return Response
     */
    public function showProductsByCategoryId(
        CategoryService $categoryService,
        ProductService $productService,
        int $categoryId): Response
    {
        if (!$categoryService->isCategoryExist($categoryId))
            throw $this->createNotFoundException("Category doesn't exist!");

        return $this->render('product/product_by_category_id.html.twig', [
            'products' => $productService->getProductsByCategoryId($categoryId),
            'categoryName' => $categoryService->getCategoryNameById($categoryId),
        ]);
    }
}