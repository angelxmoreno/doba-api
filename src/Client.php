<?php

namespace Axm\DobaApi;

use SoapClient;
use stdClass;

/**
 * Class Client
 * @package Axm\DobaApi
 */
class Client
{
    const WSDL_URL = "https://sandbox.doba.com/soap/20110301/wsdl/ApiRetailerSearch.wsdl";

    const SOAP_OPTIONS = [
        'trace' => 1,
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS
    ];

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var SoapClient
     */
    protected $soapClient;

    /**
     * Client constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->setAuth($auth);
    }

    public function getAuth() : Auth
    {
        return $this->auth;
    }

    public function setAuth(Auth $auth) : void
    {
        $this->auth = $auth;
    }

    public function getSoapClient() : SoapClient
    {
        if (!$this->soapClient) {
            $this->soapClient = new SoapClient(static::WSDL_URL, static::SOAP_OPTIONS);
        }

        return $this->soapClient;
    }

    public function call(string $action, array $options = [])
    {
        $objAuth = new stdClass();
        $objAuth->username = $this->getAuth()->getUsername();
        $objAuth->password = $this->getAuth()->getPassword();

        $objRequest = new stdClass();
        $objRequest->authentication = $objAuth;
        $objRequest->retailer_id = $this->getAuth()->getRetailerId();

        foreach ($options as $key => $val) {
            $objRequest->{$key} = $val;
        }

        $response = call_user_func([$this->getSoapClient(), $action], $objRequest);

        return json_decode(json_encode($response), true);
    }
}
