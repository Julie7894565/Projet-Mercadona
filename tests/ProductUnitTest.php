<?php

namespace App\Tests;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Promotion;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function testGetterAndSetter()
    {
        $product = new Product();

        $product->setLabel('Test product');
        $this->assertEquals('Test product', $product->getLabel());

        $product->setDescription('This is a test product');
        $this->assertEquals('This is a test product', $product->getDescription());

        $product->setPrice(9.99);
        $this->assertEquals(9.99, $product->getPrice());

        $product->setPicture('test.jpg');
        $this->assertEquals('test.jpg', $product->getPicture());

        $category = new Category();
        $product->setProductCategory($category);
        $this->assertEquals($category, $product->getProductCategory());

        $promotion = new Promotion();
        $product->setProductPromotion($promotion);
        $this->assertEquals($promotion, $product->getProductPromotion());
    }
}

