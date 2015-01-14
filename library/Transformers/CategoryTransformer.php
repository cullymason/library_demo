<?php namespace Library\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract{

    public function transform(\Category $category)
    {
        return [
            'id' => (int) $category->id,
            'name' => $category->name
        ];
    }
}