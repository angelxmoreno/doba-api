<?php

namespace Axm\DobaApi;

use Rakshazi\GetSetTrait;

/**
 * Class Auth
 * @package Axm\DobaApi
 *
 * @method string getUsername()
 * @method void setUsername(string $username)
 * @method string getPassword()
 * @method void setPassword(string $password)
 * @method string getRetailerId()
 * @method void setRetailerId(string $retailer_id)
 */
class Auth
{
    use GetSetTrait;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $retailer_id;

    /**
     * Auth constructor.
     * @param string $username
     * @param string $password
     * @param string $retailer_id
     */
    public function __construct(string $username, string $password, string $retailer_id)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setRetailerId($retailer_id);
    }
}
