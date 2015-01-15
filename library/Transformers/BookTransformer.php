<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 2:31 PM
 */

namespace Library\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use Library\Emberify\AutoIncludeable;


class BookTransformer extends TransformerAbstract {
    use AutoIncludeable;

    protected $defaultIncludes = [
        'categories', 'authors'
    ];
    public function transform(\Book $book)
    {
        $pattern = [
            'id' => (int) $book->id,
            'title' => $book->title
        ];

        $pattern = $this->addIncludes($pattern, $book);

        return $pattern;
    }
}