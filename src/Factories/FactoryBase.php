<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Tests\TestHelper;
use Cake\Utility\Hash;

/**
 * Class Factory
 * @package Axm\DobaApi\Factories
 */
abstract class FactoryBase
{
    public static function fromArrayData(string $class_name, array $order_data)
    {
        $obj = new $class_name;
        $r_obj = new \ReflectionObject($obj);

        $props = collection($r_obj->getProperties())
            ->filter(function (\ReflectionProperty $r_prop) use ($class_name) {
                return $r_prop->getDeclaringClass()->getName() === $class_name;
            })->extract(function (\ReflectionProperty $r_prop) {
                return $r_prop->getName();
            })->toArray();

        foreach ($props as $prop) {
            $val = Hash::get($order_data, $prop, null);
            $setter = TestHelper::setterMethod($prop);

            if (!is_null($val)) {
                $obj->{$setter}($val);
            }
        }

        return $obj;
    }
}
