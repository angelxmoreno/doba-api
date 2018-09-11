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
    /**
     * @var string
     */
    protected $wsdl_url;

    /**
     * @var array
     */
    protected $soap_options = [];

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
            $this->soapClient = $this->buildSoapClient();
        }

        return $this->soapClient;
    }

    /**
     * @return string
     */
    public function getWsdlUrl() : string
    {
        return $this->wsdl_url;
    }

    /**
     * @param string $wsdl_url
     */
    public function setWsdlUrl(string $wsdl_url) : void
    {
        $this->wsdl_url = $wsdl_url;
    }

    /**
     * @return array
     */
    public function getSoapOptions() : array
    {
        return $this->soap_options;
    }

    /**
     * @param array $soap_options
     */
    public function setSoapOptions(array $soap_options) : void
    {
        $this->soap_options = $soap_options;
    }

    public function call(string $action, array $options = [])
    {
        $objRequest = $this->buildRequest($options);
        $response = $this->getResponse($action, $objRequest);
        $array = json_decode(json_encode($response), true);

        return $array;
    }

    protected function buildSoapClient() : SoapClient
    {
        return new SoapClient($this->getWsdlUrl(), $this->getSoapOptions());
    }

    protected function getResponse(string $action, stdClass $objRequest) : array
    {
        $response = $this->getSoapClient()->{$action}($objRequest);

        return $response;
    }

    protected function buildRequest(array $options) : stdClass
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

        return $objRequest;
    }
}
