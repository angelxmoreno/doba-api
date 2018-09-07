<?php

namespace Axm\DobaApi\Collections;

/**
 * Trait CollectionIteratorTrait
 * @package Axm\DobaApi\Collections
 *
 * @method array optimizeUnwrap()
 */
trait CollectionIteratorTrait
{
    protected $position = 0;

    public function current()
    {
        return array_values($this->optimizeUnwrap())[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return array_keys($this->optimizeUnwrap())[$this->position];
    }

    public function valid()
    {
        return isset(array_values($this->optimizeUnwrap())[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
