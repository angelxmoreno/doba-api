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

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count) : void
    {
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getSelected() : string
    {
        return $this->selected;
    }

    /**
     * @param string $selected
     */
    public function setSelected(string $selected) : void
    {
        $this->selected = $selected;
    }


}