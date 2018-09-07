<?php

namespace Axm\DobaApi\Api;

use Axm\DobaApi\Request;
use Rakshazi\GetSetTrait;

/**
 * Class ApiBase
 * @package Axm\DobaApi\Api
 *
 * @method Request getRequest()
 * @method void setRequest(Request $request)
 */
abstract class ApiBase
{
    use GetSetTrait;
    /**
     * @var Request
     */
    protected $request;

    /**
     * Order constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->setRequest($request);
    }
}
