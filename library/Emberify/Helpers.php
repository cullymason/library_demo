<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 2:26 PM
 */

namespace Library\Emberify;


use Illuminate\Database\Eloquent\Collection;

trait Helpers {

    /**
     * @param Collection $collection
     * @return string
     */
    private function pluralizeCollectionName(Collection $collection)
    {
        return lcfirst(str_plural(get_class($collection->first())));
    }

    /**
     * @param $item
     * @return string
     */
    private function singularizeItemName($item)
    {
        return lcfirst(get_class($item));
    }

    /**
     * @param $model
     * @return bool
     */
    private function isACollection($model)
    {
        return $model instanceof Collection;
    }
}