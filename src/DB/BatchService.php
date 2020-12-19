<?php

namespace Dbwhddn10\FService\DB;

use Dbwhddn10\FService\Service;

class BatchService extends Service
{
    public static function getArrBindNames()
    {
        return [];
    }

    public static function getArrCallbackLists()
    {
        return [];
    }

    public static function getArrLoaders()
    {
        return [
            'model_class' => function () {

                throw new \Exception;
            },

            'models' => function ($modelClass, $ids) {

                $ids = preg_split('/\s*,\s*/', $ids);

                $models = $modelClass::find($ids);

                return $ids->map(function ($id) use ($modelKeys) {

                    if ( in_array($id, $models->modelKeys()) )
                    {
                        return $models->getDictionary()[$id];
                    }

                    return null;
                });
            },

            'result' => function () {

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
            'ids'
                => ['required', 'string'],

            'models'
                => ['required', 'array'],
        ];
    }

    public static function getArrTraits()
    {
        return [];
    }
}
