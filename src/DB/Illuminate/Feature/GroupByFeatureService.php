<?php

namespace Dbwhddn10\FService\DB\Illuminate\Feature;

use Dbwhddn10\FService\Service;
use Dbwhddn10\FService\DB\Illuminate\Feature\QueryFeatureService;

class GroupByFeatureService extends Service
{
    public static function getArrBindNames()
    {
        return [
            'available_group_by'
                => 'options for {{group_by}}',
        ];
    }

    public static function getArrCallbackLists()
    {
        return [
            'query.group_by' => function ($groupBy, $query) {

                foreach ( $groupBy as $key )
                {
                    $query->groupBy($key);
                }
            },
        ];
    }

    public static function getArrLoaders()
    {
        return [
            'available_group_by' => function () {

                throw new \Exception;
            },
        ];
    }

    public static function getArrPromiseLists()
    {
        return [];
    }

    public static function getArrRuleLists()
    {
        return [
            'group_by'
                => ['string', 'in_array:{{available_group_by}}.*'],
        ];
    }

    public static function getArrTraits()
    {
        return [
            QueryFeatureService::class,
        ];
    }
}
