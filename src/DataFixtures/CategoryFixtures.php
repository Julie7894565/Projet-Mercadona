<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 5 Category! Bam!
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setLabel('category ' . $i); 
            $manager->persist($category);
        }

        $manager->flush();
    }
}
