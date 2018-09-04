<?php

namespace Axm\DobaApi\Utility;

use JsonSerializable;

/**
 * Trait JsonSerializeTrait
 * @package Axm\DobaApi\Utility
 *
 * @todo replace this code if a library solution
 * @SuppressWarnings("CyclomaticComplexity")
 * @SuppressWarnings("ElseExpression")
 */
trait JsonSerializeTrait
{
    /**
     * @return array
     */
    public function jsonSerialize() : array
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $props = get_object_vars($this);
        unset($props['_data_property'], $props['api']);
        $data = [];
        foreach ($props as $key => $val) {
            if (is_object($val) && $val instanceof JsonSerializable) {
                $data[$key] = $val->jsonSerialize();
            }

            if (is_array($val)) {
                $collection = [];
                foreach ($val as $valKey => $valVal) {
                    if (is_object($valVal) && $valVal instanceof JsonSerializable) {
                        $collection[$valKey] = $valVal->jsonSerialize();
                    } else {
                        $collection[$valKey] = $valVal;
                    }
                }
                $data[$key] = $collection;
            }

            if (!is_object($val) && !is_array($val)) {
                $data[$key] = $val;
            }
        }

        return $data;
    }
}
