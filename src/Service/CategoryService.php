<?php

declare(strict_types=1);

namespace App\Service;


use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService
{
    private $entityManager;

    /**
     * CategoryService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return array
     */
    public function getAllCategories(): array
    {
        return $categories = $this->entityManager
            ->getRepository(Category::class)
            ->findAll();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function isCategoryExist(int $id): bool
    {
        if ($this->entityManager
            ->getRepository(Category::class)
            ->find($id)) {
            return true;
        }

        return false;
    }

    /**
     * @param int $id
     * @return string
     */
    public function getCategoryNameById(int $id): string
    {
        $category = $this->entityManager
            ->getRepository(Category::class)
            ->find($id);

        return $category->getName();
    }
}