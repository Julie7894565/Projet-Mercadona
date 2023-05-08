<?php

namespace App\Tests;

use App\Entity\Promotion;
use PHPUnit\Framework\TestCase;

class PromotionUnitTest extends TestCase
{
    public function testGetterAndSetter(): void
    {
        $promotion = new Promotion();

        $promotionPercentage = 10;
        $startTime = new \DateTime('2023-01-01');
        $endTime = new \DateTime('2023-12-31');

        $promotion->setPromotionPercentage($promotionPercentage);
        $promotion->setStartTime($startTime);
        $promotion->setEndTime($endTime);

        $this->assertEquals($promotionPercentage, $promotion->getPromotionPercentage());
        $this->assertEquals($startTime, $promotion->getStartTime());
        $this->assertEquals($endTime, $promotion->getEndTime());
    }

    public function testAddAndRemoveProduct(): void
    {
        $promotion = new Promotion();
        $product1 = $this->createMock('App\Entity\Product');
        $product2 = $this->createMock('App\Entity\Product');

        $promotion->addProduct($product1);
        $promotion->addProduct($product2);

        $this->assertTrue($promotion->getProducts()->contains($product1));
        $this->assertTrue($promotion->getProducts()->contains($product2));

        $promotion->removeProduct($product1);

        $this->assertFalse($promotion->getProducts()->contains($product1));
        $this->assertTrue($promotion->getProducts()->contains($product2));
    }
}
