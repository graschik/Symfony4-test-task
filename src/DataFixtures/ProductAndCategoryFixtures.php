<?php

declare(strict_types=1);

namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductAndCategoryFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {

            switch ($i) {
                case 0: {

                    $category = new Category('Mobile phones');
                    $manager->persist($category);

                    for ($j = 0; $j < 10; $j++) {
                        $product = new Product('Mobile phone №' . ($j + 1), ($j + 1) * 100);
                        $product->setCategory($category);
                        $manager->persist($product);
                    }
                    break;
                }
                case 1: {

                    $category = new Category('Computers');
                    $manager->persist($category);

                    for ($j = 0; $j < 10; $j++) {
                        $product = new Product('Computer №' . ($j + 1), ($j + 1) * 100);
                        $product->setCategory($category);
                        $manager->persist($product);
                    }
                    break;
                }
                case 2: {

                    $category = new Category('Mouses');
                    $manager->persist($category);

                    for ($j = 0; $j < 10; $j++) {
                        $product = new Product('Mouse №' . ($j + 1), ($j + 1) * 100);
                        $product->setCategory($category);
                        $manager->persist($product);
                    }
                    break;
                }
                case 3: {

                    $category = new Category('Headphones');
                    $manager->persist($category);

                    for ($j = 0; $j < 10; $j++) {
                        $product = new Product('Headphones №' . ($j + 1), ($j + 1) * 100);
                        $product->setCategory($category);
                        $manager->persist($product);
                    }
                    break;
                }
                case 4: {

                    $category = new Category('Laptops');
                    $manager->persist($category);

                    for ($j = 0; $j < 10; $j++) {
                        $product = new Product('Laptop №' . ($j + 1), ($j + 1) * 100);
                        $product->setCategory($category);
                        $manager->persist($product);
                    }
                    break;
                }
            }
        }

        $manager->flush();
    }
}