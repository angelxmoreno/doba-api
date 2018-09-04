<?php

namespace Axm\DobaApi\Tests\Unit;

use Axm\DobaApi\Auth;
use Axm\DobaApi\Tests\TestHelper;

describe(Auth::class, function () {
    given('properties', function () {
        return [
            'username' => 'some_username',
            'password' => 'some_password',
            'retailer_id' => 'some_retailer_id',
        ];
    });

    given('AuthClass', function () {
        return TestHelper::instanceFromArray(Auth::class, $this->properties);
    });

    context('Getters/Setters', function () {
        // Getters
        foreach ($this->properties as $prop => $val) {
            $getter = TestHelper::getterMethod($prop);
            $setter = TestHelper::setterMethod($prop);

            it('sets ' . $prop, function () use ($setter, $prop, $val) {
                $this->AuthClass->{$setter}($val . $val);

                expect(TestHelper::getProperty($this->AuthClass, $prop))->toBe($val . $val);
            });

            it('gets ' . $prop, function () use ($getter, $val) {
                expect($this->AuthClass->{$getter}())->toBe($val);
            });
        }
    });
});
