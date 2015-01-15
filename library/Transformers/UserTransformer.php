<?php

/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 1:47 PM
 */

namespace Library\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use Library\Emberify\AutoIncludeable;

class UserTransformer extends TransformerAbstract {
    use AutoIncludeable;
    protected $defaultIncludes = [
        'books'
    ];

    public function transform(\User $user)
    {
        $pattern =  [
            'id' => (int) $user->id,
            'username' => $user->username,

        ];

        $pattern = $this->addIncludes($pattern, $user);

        return $pattern;
    }



}