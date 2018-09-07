<?php

namespace Axm\DobaApi;

/**
 * Class Auth
 * @package Axm\DobaApi
 *
 */
class Auth
{
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

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRetailerId() : string
    {
        return $this->retailer_id;
    }

    /**
     * @param string $retailer_id
     */
    public function setRetailerId(string $retailer_id) : void
    {
        $this->retailer_id = $retailer_id;
    }


}
