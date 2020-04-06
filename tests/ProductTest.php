<?php


use Model\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testProductTest()
    {
        $produt = new Product();

        $reflector = new ReflectionClass(Product::class);
        $property = $reflector->getProperty('product_id');
        $property->setAccessible(true);
        $value = $property->getValue($produt);

        $this->assertNotEmpty($value);
    }

}