<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 3:45 PM
 */

namespace Library\Emberify;


use League\Fractal\TransformerAbstract;

class EmberTransformer extends TransformerAbstract {

    public function transform($something)
    {
        return [
            $something->id
        ];
    }
}