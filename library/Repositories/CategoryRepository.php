<?php

namespace Library\Repositories;

use Library\Transformers\CategoryTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;
use Library\Serializer\EmberSerializer;

class CategoryRepository {

    /**
     * @var \Category
     */
    private $category;
    /**
     * @var CategoryTransformer
     */
    private $categoryTransformer;
    /**
     * @var Manager
     */
    private $manager;


    function __construct(\Category $category, CategoryTransformer $categoryTransformer, Manager $manager)
    {
        $this->category = $category;
        $this->categoryTransformer = $categoryTransformer;

        $this->manager = $manager;
    }

    public function all()
    {
        $categories = $this->category->all();
        return $categories;
    }

    /**
     * @param $categories
     * @return \Illuminate\Http\JsonResponse
     */
    public function emberify($categories)
    {
        $this->manager->setSerializer(new EmberSerializer());
        $resource = new Collection($categories, new CategoryTransformer, 'categories');


        return $this->manager->createData($resource)->toArray();
    }
}