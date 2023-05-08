<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testId(): void
    {
        $category = new Category();
        $this->assertNull($category->getId());
    }

    public function testLabel(): void
    {
        $category = new Category();
        $category->setLabel('test');
        $this->assertEquals('test', $category->getLabel());
    }

    public function testProducts(): void
    {
        $category = new Category();
        $product1 = new Product();
        $product2 = new Product();
        $category->addProduct($product1);
        $category->addProduct($product2);
        $this->assertCount(2, $category->getProducts());
        $this->assertTrue($category->getProducts()->contains($product1));
        $this->assertTrue($category->getProducts()->contains($product2));
        $category->removeProduct($product1);
        $this->assertCount(1, $category->getProducts());
        $this->assertFalse($category->getProducts()->contains($product1));
        $this->assertTrue($category->getProducts()->contains($product2));
    }
}
