<?php

namespace Axm\DobaApi\Entity;

/**
 * Class Address
 * @package Axm\DobaApi\Entity
 *
 * @method string getName()
 * @method void setName(string $name)
 * @method string getStreet()
 * @method void setStreet(string $street)
 * @method string getCity()
 * @method void setCity(string $city)
 * @method string getState()
 * @method void setState(string $state)
 * @method string getPostal()
 * @method void setPostal(string $postal)
 * @method string getCountry()
 * @method void setCountry(string $country)
 * @method string getPhone()
 * @method void setPhone(string $phone)
 */
class Address extends EntityBase
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $postal;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $phone;
}
