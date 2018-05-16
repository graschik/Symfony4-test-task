<?php

declare(strict_types=1);

namespace App\Service;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductService
{
    private $entityManager;

    /**
     * ProductService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int $categoryId
     * @return array
     */
    public function getProductsByCategoryId(int $categoryId): array
    {
        return $this->entityManager
            ->getRepository(Product::class)
            ->findBy(['category' => $categoryId]);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function isProductExist(int $id): bool
    {
        if ($this->entityManager
            ->getRepository(Product::class)
            ->find($id)) {
            return true;
        }

        return false;
    }


    /**
     * @param int $id
     * @return object
     */
    public function getProductById(int $id): object
    {
        return $this->entityManager
            ->getRepository(Product::class)
            ->find($id);
    }
}