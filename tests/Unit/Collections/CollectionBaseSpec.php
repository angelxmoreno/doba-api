<?php

namespace Axm\DobaApi\Tests\Unit\Collections;

use Axm\DobaApi\Collections\CollectionBase;
use Kahlan\Plugin\Double;

describe(CollectionBase::class, function () {
    beforeEach(function () {
        $this->items = ['a', 'b', 'c'];
        $this->collection_class = Double::classname([
            'class' => 'StringCollection',
            'extends' => CollectionBase::class,
            'methods' => [
                'getCollectionType' => 'string'
            ]
        ]);
        /** @var CollectionBase $collection */
        $this->StringCollection = new $this->collection_class($this->items);
    });

    describe('->getInnerIterator()', function () {
        it('returns the items', function () {
            expect($this->StringCollection->getInnerIterator())->toBe($this->items);
        });
    });

    describe('->add()', function () {
        context('When an Invalid item is given', function () {
            it('throws an UnexpectedValueException', function () {
                $closure = function () {
                    $this->StringCollection->add(true);
                };

                $exception_msg = sprintf(CollectionBase::TPL_NOT_VALID, 'boolean', 'string');
                expect($closure)
                    ->toThrow(new \UnexpectedValueException($exception_msg));
            });
        });

        context('When a valid item is given', function () {
            it('adds the item to the collection', function () {
                expect($this->StringCollection->getInnerIterator())
                    ->not
                    ->toContain('bob');

                $this->StringCollection->add('bob');

                expect($this->StringCollection->getInnerIterator())
                    ->toContain('bob');
            });
        });

        context('When a key and item is given', function () {
            it('adds the item and assigns the key', function () {
                expect($this->StringCollection->getInnerIterator())
                    ->not
                    ->toContain('bob');
                expect($this->StringCollection->getInnerIterator())
                    ->not
                    ->toContainKey('name');

                $this->StringCollection->add('bob', 'name');

                expect($this->StringCollection->getInnerIterator())
                    ->toContain('bob');
                expect($this->StringCollection->getInnerIterator())
                    ->toContainKey('name');
            });
        });
    });

    describe('->addMany()', function () {
        it('adds many items', function () {
            $new_items = ['jack', 'jill'];

            foreach ($new_items as $item) {
                expect($this->StringCollection->getInnerIterator())
                    ->not
                    ->toContain($item);
            }

            $this->StringCollection->addMany($new_items);

            foreach ($new_items as $item) {
                expect($this->StringCollection->getInnerIterator())
                    ->toContain($item);
            }
        });
    });
});
