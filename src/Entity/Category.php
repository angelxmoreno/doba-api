<?php

namespace Axm\DobaApi\Entity;

/**
 * Class Category
 * @package Axm\DobaApi\Entity
 *
 * @method int getId()
 * @method void setId(int $id)
 * @method string getName()
 * @method void setName(string $name)
 * @method int getCount()
 * @method void setCount(int $count)
 * @method string getSelected()
 * @method void setSelected(string $selected)
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
