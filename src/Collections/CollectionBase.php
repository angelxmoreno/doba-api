<?php

namespace Axm\DobaApi\Collections;

use ArrayAccess;
use Cake\Collection\CollectionTrait;
use Countable;
use Iterator;
use UnexpectedValueException;

/**
 * Class CollectionBase
 * @package Axm\DobaApi\Collections
 */
abstract class CollectionBase implements Iterator, Countable, ArrayAccess
{
    use CollectionTrait;
    use CollectionIteratorTrait;
    use CollectionArrayAccessTrait;

    const TPL_NOT_VALID = "'%s' is not a valid '%s'";

    /**
     * @var string
     */
    protected $collection_type;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * CollectionBase constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->addMany($items);
    }

    public function optimizeUnwrap()
    {
        return $this->items;
    }

    /**
     * Adds an item to the list of items and ensures its type
     *
     * @param mixed $item
     * @param null|string $key
     * @return static
     */
    public function add($item, string $key = null)
    {
        $this->ensureType($item);
        if ($key) {
            $this->items[$key] = $item;
        } else {
            $this->items[] = $item;
        }

        return $this;
    }

    /**
     * @param array $items
     */
    public function addMany(array $items)
    {
        foreach ($items as $key => $item) {
            $this->add($item, $key);
        }
    }

    /**
     * @return string
     */
    public function getCollectionType() : ?string
    {
        return $this->collection_type;
    }

    /**
     * @param $item
     * @throws UnexpectedValueException
     */
    protected function ensureType($item)
    {
        $type = $this->getCollectionType();

        $item_type = is_object($item)
            ? get_class($item)
            : gettype($item);

        $isValid = is_object($item)
            ? ($item instanceof $type)
            : $item_type === $type;

        if (!$isValid) {
            $msg = sprintf(self::TPL_NOT_VALID, $item_type, $type);
            throw new UnexpectedValueException($msg);
        }
    }
}
