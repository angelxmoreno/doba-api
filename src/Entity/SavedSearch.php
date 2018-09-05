<?php

namespace Axm\DobaApi\Entity;

/**
 * Class SavedSearch
 * @package Axm\DobaApi\Entity
 */
class SavedSearch extends EntityBase
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
     * @var array
     */
    protected $criteria = [];

    /**
     * @var array
     */
    protected $friendly_criteria = [];

    /**
     * @var int
     */
    protected $results_per_page = 20;

    /**
     * @var string
     */
    protected $view_option = 'gallery';

    /**
     * @var string
     */
    protected $sort_order = '1';

    /**
     * @var \DateTimeInterface
     */
    protected $date_created;

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id) : void
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
     * @return array
     */
    public function getCriteria() : array
    {
        return $this->criteria;
    }

    /**
     * @param array $criteria
     */
    public function setCriteria(array $criteria) : void
    {
        $this->criteria = $criteria;
    }

    /**
     * @return array
     */
    public function getFriendlyCriteria() : array
    {
        return $this->friendly_criteria;
    }

    /**
     * @param array $friendly_criteria
     */
    public function setFriendlyCriteria(array $friendly_criteria) : void
    {
        $this->friendly_criteria = $friendly_criteria;
    }

    /**
     * @return int
     */
    public function getResultsPerPage() : int
    {
        return $this->results_per_page;
    }

    /**
     * @param int $results_per_page
     */
    public function setResultsPerPage(int $results_per_page) : void
    {
        $this->results_per_page = $results_per_page;
    }

    /**
     * @return string
     */
    public function getViewOption() : string
    {
        return $this->view_option;
    }

    /**
     * @param string $view_option
     */
    public function setViewOption(string $view_option) : void
    {
        $this->view_option = $view_option;
    }

    /**
     * @return string
     */
    public function getSortOrder() : string
    {
        return $this->sort_order;
    }

    /**
     * @param string $sort_order
     */
    public function setSortOrder(string $sort_order) : void
    {
        $this->sort_order = $sort_order;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateCreated() : \DateTimeInterface
    {
        return $this->date_created;
    }

    /**
     * @param \DateTimeInterface $date_created
     */
    public function setDateCreated(\DateTimeInterface $date_created) : void
    {
        $this->date_created = $date_created;
    }


}