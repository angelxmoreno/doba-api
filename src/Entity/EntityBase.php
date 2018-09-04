<?php

namespace Axm\DobaApi\Entity;

use Axm\DobaApi\Utility\JsonSerializeTrait;
use Rakshazi\GetSetTrait;

/**
 * Class EntityBase
 * @package Axm\DobaApi\Entity
 */
abstract class EntityBase implements \JsonSerializable
{
    use GetSetTrait;
    use JsonSerializeTrait;
}
