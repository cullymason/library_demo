<?php

namespace Library\Repositories;

use Library\Emberify\Emberifiable;
use Library\Transformers\CategoryTransformer;


class CategoryRepository implements RepositoryInterface {
    use Emberifiable;
    /**
     * @var \Category
     */
    private $category;
    /**
     * @var CategoryTransformer
     */
    private $transformer;


    function __construct(\Category $category, CategoryTransformer $transformer)
    {
        $this->category = $category;
        $this->transformer = $transformer;
    }

    public function all()
    {
        $categories = $this->category->all();
        return $categories;
    }

    public function find($id)
    {
        $categories = $this->category->find($id);
        return $categories;
    }

}