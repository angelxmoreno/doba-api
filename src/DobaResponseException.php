<?php

namespace Axm\DobaApi;

use Cake\Utility\Hash;
use Exception as BaseException;

class DobaResponseException extends BaseException
{
    /**
     * @param array $error
     * @return DobaResponseException
     */
    public static function fromErrorArray(array $error) : self
    {
        return new self(
            Hash::get($error, 'message', 'No Message'),
            Hash::get($error, 'code', 000)
        );
    }
}
