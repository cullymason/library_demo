<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 4:16 PM
 */

namespace Library\Emberify;


trait AutoIncludeable {

    private function addIncludes($pattern, $model)
    {
        if(count($this->defaultIncludes) > 0)
        {
            foreach($this->defaultIncludes as $key => $value)
            {
                if($value == str_plural($value))
                {
                    $pattern[$value] = $model->$value->lists('id');
                }
                else
                {
                    $pattern[$value] = $model->$value->id;
                }
            }
        }
        return $pattern;
    }
    public function __call($name, $args)
    {

        $pattern = '/(\binclude)/';
        if(preg_match($pattern,$name, $matches))
        {
            // valid include
        }

    }
}