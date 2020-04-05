<?php


use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{

    public function testDescriptionIsNotEmpty()
    {
        $item = new Model\ItemChild();
        $this->assertNotEmpty($item->getId());
    }

    public function testDescriptionIsInt()
    {
        $item = new Model\ItemChild();
        $this->assertIsInt($item->getId());
    }

    public function testReflection()
    {
        $item = new Model\ItemChild();

        $reflector = new ReflectionClass(\Model\Item::class);

        try {
            $method = $reflector->getMethod('getToken');
            $method->setAccessible(true);
            $result = $method->invoke($item);
            $this->assertIsString($result);

        } catch (ReflectionException $e) {
        }
    }

    /**
     * @throws ReflectionException
     */
    public function testReflectionWithArgs()
    {
        $item = new Model\ItemChild();

        $reflector = new ReflectionClass(\Model\Item::class);
        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        $result = $method->invokeArgs($item,['prefix_']);
        $this->assertStringStartsWith('prefix',$result);
    }
}
