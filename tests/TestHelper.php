<?php

namespace Axm\DobaApi\Tests;

use Cake\Utility\Inflector;

/**
 * Class TestHelper
 * @package Axm\DobaApi\Tests
 */
class TestHelper
{
    public static function getterMethod(string $property) : string
    {
        return 'get' . Inflector::camelize($property);
    }

    public static function setterMethod(string $property) : string
    {
        return 'set' . Inflector::camelize($property);
    }

    /**
     * @param string $class_name
     * @param array $args
     * @return object
     * @throws \ReflectionException
     */
    public static function instanceFromArray(string $class_name, array $args)
    {
        $reflection = new \ReflectionClass($class_name);

        return $reflection->newInstanceArgs($args);
    }

    /**
     * @param object $obj
     * @param string $property
     * @return mixed
     * @throws \ReflectionException
     */
    public static function getProperty($obj, string $property)
    {
        $class_name = get_class($obj);
        $reflectionClass = new \ReflectionClass($class_name);

        $reflectionProperty = $reflectionClass->getProperty($property);
        $reflectionProperty->setAccessible(true);

        return $reflectionProperty->getValue($obj);
    }
}
