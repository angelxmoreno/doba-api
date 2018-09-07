<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Collections\SavedSearchesCollection;
use Axm\DobaApi\Entity\SavedSearch;

/**
 * Class SavedSearchesFactory
 * @package Axm\DobaApi\Factories
 */
class SavedSearchesFactory extends FactoryBase
{
    public const COLLECTION = SavedSearchesCollection::class;

    /**
     * @param array $data
     * @return SavedSearch
     */
    public static function fromData(array $data) : SavedSearch
    {
        $data['id'] = $data['saved_search_id'];

        $data['criteria'] =
            json_decode(
                json_encode(
                    unserialize(
                        $data['criteria']
                    )
                ),
                true
            );

        $data['friendly_criteria'] =
            json_decode(
                json_encode(
                    unserialize(
                        $data['friendly_criteria']
                    )
                ),
                true
            );

        $data['date_created'] = \DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $data['date_created']
        );

        /** @var SavedSearch $saved_search */
        $saved_search = self::hydrate(SavedSearch::class, $data);

        return $saved_search;
    }
}
