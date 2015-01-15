<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 1:09 PM
 */

namespace Library\Emberify;

use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;

trait Emberifiable {
    use Helpers;

    /**
     * @param $model
     * @return \Illuminate\Http\JsonResponse
     */
    public function emberify($model)
    {
        $manager = new Manager();
        $manager->setSerializer(New EmberSerializer());

        if($this->isACollection($model))
        {
            $resource = $this->emberifyCollection($model);
        }
        else
        {
            $resource = $this->emberifyItem($model);
        }

        return $manager->createData($resource)->toArray();
    }

    /**
     * @param $collection
     * @return Collection
     */
    private function emberifyCollection($collection)
    {
        $collectionName = $this->pluralizeCollectionName($collection);
        $resource = new Collection($collection, $this->transformer, $collectionName);
        return $resource;
    }

    /**
     * @param $item
     * @return Item
     */
    private function emberifyItem($item)
    {
        $itemName = $this->singularizeItemName($item);
        $resource = new Item($item, $this->transformer, $itemName);
        return $resource;
    }


}