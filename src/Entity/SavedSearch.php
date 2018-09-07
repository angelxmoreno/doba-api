<?php

namespace Axm\DobaApi\Entity;

/**
 * Class SavedSearch
 * @package Axm\DobaApi\Entity
 *
 * @method string getId()
 * @method void setId(string $id)
 * @method string getName()
 * @method void setName(string $name)
 * @method array getCriteria()
 * @method void setCriteria(array $criteria)
 * @method array getFriendlyCriteria()
 * @method void setFriendlyCriteria(array $friendly_criteria)
 * @method int getResultsPerPage()
 * @method void setResultsPerPage(int $results_per_page)
 * @method string getViewOption()
 * @method void setViewOption(string $view_option)
 * @method string getSortOrder()
 * @method void setSortOrder(string $sort_order)
 * @method \DateTimeInterface getDateCreated()
 * @method void setDateCreated(\DateTimeInterface $date_created)
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
}
