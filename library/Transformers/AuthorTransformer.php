<?php namespace Library\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract {

    public function transform(\Author $author)
    {
        return [
            'id' => $author->id,
            'first_name' => $author->first_name,
            'last_name' => $author->last_name
        ];
    }

}