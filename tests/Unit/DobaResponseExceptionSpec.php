<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\DobaResponseException;

describe(DobaResponseException::class, function () {
    describe('::fromErrorArray()', function () {
        it('returns self instance with proper message and code', function () {
            $message = 'Some Exception Message';
            $code = '030880';

            $exception = DobaResponseException::fromErrorArray(compact('message', 'code'));

            expect($exception)->toBeAnInstanceOf(DobaResponseException::class);
            expect($exception->getMessage())->toBe($message);
            expect($exception->getCode())->toBe((int)$code);
        });
    });
});
