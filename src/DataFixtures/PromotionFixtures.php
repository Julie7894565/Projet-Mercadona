<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 5 Promotions
        for ($i = 0; $i < 5; $i++) {
            $promotion = new Promotion();
            $promotion->setPromotionPercentage(rand(10, 50)); // set a random promotion percentage between 10 and 50
            $promotion->setStartTime(new \DateTime()); // set the start time to now
            $promotion->setEndTime((new \DateTime())->modify('+1 week')); // set the end time to one week from now
            $manager->persist($promotion);
        }

        $manager->flush();
    }
}
