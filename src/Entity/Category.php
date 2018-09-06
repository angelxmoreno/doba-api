<?php

namespace Axm\DobaApi\Entity;

/**
 * Class Category
 * @package Axm\DobaApi\Entity
 */
class Category extends EntityBase
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     * @todo confirm we need this property
     */
    protected $count;

    /**
     * @var string
     * @todo confirm we need this property
     */
    protected $selected;
}
