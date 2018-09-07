<?php

namespace Axm\DobaApi\Tests\Unit\Collections;

use Axm\DobaApi\Collections\CollectionBase;
use Axm\DobaApi\Tests\TestHelper;
use Kahlan\Plugin\Double;

describe(CollectionBase::class, function () {
    beforeEach(function () {
        $this->items = ['a', 'b', 'c'];
        $this->collection_class = Double::classname([
            'class' => 'StringCollection',
            'extends' => CollectionBase::class
        ]);

        allow($this->collection_class)->toReceive('getCollectionType')->andReturn('string');
        $this->StringCollection = new $this->collection_class($this->items);
    });

    describe('->optimizeUnwrap()', function () {
        it('returns the items', function () {
            expect($this->StringCollection->optimizeUnwrap())->toBe($this->items);
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
                expect($this->StringCollection->optimizeUnwrap())
                    ->not
                    ->toContain('bob');

                $this->StringCollection->add('bob');

                expect($this->StringCollection->optimizeUnwrap())
                    ->toContain('bob');
            });
        });

        context('When a key and item is given', function () {
            it('adds the item and assigns the key', function () {
                expect($this->StringCollection->optimizeUnwrap())
                    ->not
                    ->toContain('bob');
                expect($this->StringCollection->optimizeUnwrap())
                    ->not
                    ->toContainKey('name');

                $this->StringCollection->add('bob', 'name');

                expect($this->StringCollection->optimizeUnwrap())
                    ->toContain('bob');
                expect($this->StringCollection->optimizeUnwrap())
                    ->toContainKey('name');
            });
        });
    });

    describe('->addMany()', function () {
        it('adds many items', function () {
            $new_items = ['jack', 'jill'];

            foreach ($new_items as $item) {
                expect($this->StringCollection->optimizeUnwrap())
                    ->not
                    ->toContain($item);
            }

            $this->StringCollection->addMany($new_items);

            foreach ($new_items as $item) {
                expect($this->StringCollection->optimizeUnwrap())
                    ->toContain($item);
            }
        });
    });

    describe('->getCollectionType()', function () {
        it('it returns the collectionType', function () {
            $collection_class = Double::classname([
                'class' => 'BlankCollection',
                'extends' => CollectionBase::class
            ]);

            /** @var CollectionBase $collection */
            $collection = new $collection_class();

            expect($collection->getCollectionType())
                ->not
                ->toBe('boolean');
            TestHelper::setProperty($collection, 'collection_type', 'boolean');
            expect($collection->getCollectionType())
                ->toBe('boolean');
        });
    });
});
