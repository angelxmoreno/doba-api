<?php

namespace Axm\DobaApi\Entity;

/**
 * Class Brand
 * @package Axm\DobaApi\Entity
 *
 * @method string getId()
 * @method void setId(string $id)
 * @method string getName()
 * @method void setName(string $name)
 * @method int getCount()
 * @method void setCount(int $count)
 * @method string getSelected()
 * @method void setSelected(string $selected)
 */
class Brand extends EntityBase
{
    /**
     * @var string
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
