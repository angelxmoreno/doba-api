<?php

namespace Axm\DobaApi\Collections;

/**
 * Trait CollectionArrayAccessTrait
 * @package Axm\DobaApi\Collections
 *
 * @method array optimizeUnwrap()
 */
trait CollectionArrayAccessTrait
{
    public function offsetExists($offset)
    {
        $array = is_string($offset)
            ? $this->optimizeUnwrap()
            : array_values($this->optimizeUnwrap());

        return isset($array[$offset]);
    }

    public function offsetGet($offset)
    {
        $array = is_string($offset)
            ? $this->optimizeUnwrap()
            : array_values($this->optimizeUnwrap());

        return $array[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (!is_string($offset)) {
            $this->optimizeUnwrap()[] = $value;
        } else {
            $this->optimizeUnwrap()[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        $key = is_string($offset)
            ? $offset
            : array_keys($this->optimizeUnwrap())[$offset];

        unset($this->optimizeUnwrap()[$key]);
    }
}
