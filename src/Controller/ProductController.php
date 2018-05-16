<?php

declare(strict_types=1);

namespace App\Controller;


use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product/{productId}",
     *     name="show_product",
     *     requirements={
     *          "productId"="\d+"
     *      }
     *     )
     * @param ProductService $productService
     * @param int $productId
     * @return Response
     */
    public function showProductById(
        ProductService $productService,
        int $productId): Response
    {
        if (!$productService->isProductExist($productId))
            throw $this->createNotFoundException("Product doesn't exist!");


        return $this->render('product/product_detail.html.twig', [
            'product' => $productService->getProductById($productId),
        ]);
    }
}