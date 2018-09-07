<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\CollectionBase;
use Axm\DobaApi\Tests\TestHelper;
use Cake\Utility\Hash;

/**
 * Class Factory
 * @package Axm\DobaApi\Factories
 */
abstract class FactoryBase
{
    const COLLECTION = CollectionBase::class;

    /**
     * @param string $class_name
     * @param array $order_data
     * @return object
     */
    public static function hydrate(string $class_name, array $order_data)
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

    abstract static function fromData(array $data);

    public static function fromArrayOfData(array $data_array) : array
    {
        $objects = [];
        foreach ($data_array as $data) {
            $objects[] = static::fromData($data);
        }

        return $objects;
    }

    public static function collectionFromArrayData(array $data_array)
    {
        $objects_array = static::fromArrayOfData($data_array);
        $collection = static::COLLECTION;

        return new $collection($objects_array);
    }

    protected static function fixFloats(array $data, array $props) : array
    {
        foreach ($props as $prop) {
            if (isset($data[$prop]) && $data[$prop] === '') {
                unset($data[$prop]);
            }

            if (isset($data[$prop]) && $data[$prop] !== '') {
                $data[$prop] = (float)$data[$prop];
            }
        }

        return $data;
    }

    protected static function fixArrays(array $data, array $props) : array
    {
        foreach ($props as $prop) {
            if (isset($data[$prop])) {
                $data[$prop] = (array)$data[$prop];
            }
        }

        return $data;
    }

    protected static function fixDates(array $data, array $props) : array
    {
        foreach ($props as $prop) {
            if (isset($data[$prop]) && $data[$prop] === '') {
                unset($data[$prop]);
            }

            if (isset($data[$prop]) && $data[$prop] !== '') {
                $ts = strtotime($data[$prop]);
                $data[$prop] = new \DateTime("@$ts");
            }
        }

        return $data;
    }
}
