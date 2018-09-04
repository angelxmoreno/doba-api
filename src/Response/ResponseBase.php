<?php

namespace Axm\DobaApi\Response;

use Axm\DobaApi\Utility\JsonSerializeTrait;
use Rakshazi\GetSetTrait;

/**
 * Class ResponseBase
 * @package Axm\DobaApi\Response
 */
abstract class ResponseBase implements \JsonSerializable
{
    use GetSetTrait;
    use JsonSerializeTrait;
}
