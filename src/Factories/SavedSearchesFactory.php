<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\SavedSearch;

/**
 * Class SavedSearchesFactory
 * @package Axm\DobaApi\Factories
 */
class SavedSearchesFactory extends FactoryBase
{
    /**
     * @param array $saved_searches_data
     * @return SavedSearch[]
     */
    public static function fromArrayOfSavedSearchData(array $saved_searches_data) : array
    {
        $saved_searches = [];
        foreach ($saved_searches_data as $saved_search_data) {
            $saved_searches[] = self::fromSavedSearchData($saved_search_data);
        }

        return $saved_searches;
    }

    /**
     * @param array $saved_search_data
     * @return SavedSearch
     */
    public static function fromSavedSearchData(array $saved_search_data) : SavedSearch
    {
        $saved_search_data['id'] = $saved_search_data['saved_search_id'];
        $saved_search_data['criteria'] =
            json_decode(
                json_encode(
                    unserialize(
                        $saved_search_data['criteria']
                    )
                ),
                true
            );

        $saved_search_data['friendly_criteria'] =
            json_decode(
                json_encode(
                    unserialize(
                        $saved_search_data['friendly_criteria']
                    )
                ),
                true
            );

        $saved_search_data['date_created'] = \DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $saved_search_data['date_created']
        );

        print_r($saved_search_data['date_created']);
        /** @var SavedSearch $saved_search */
        $saved_search = self::fromArrayData(SavedSearch::class, $saved_search_data);

        return $saved_search;
    }
}
