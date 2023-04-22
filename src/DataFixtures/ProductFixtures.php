<?php

namespace App\DataFixtures;

use Faker\Generator;
use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setLabel('product ' . $i);
            $product->setDescription($this->faker->paragraph);
            $product->setPrice(mt_rand(10, 100));
            $product->setPicture('https://picsum.photos/200/300?random=' . $i);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
