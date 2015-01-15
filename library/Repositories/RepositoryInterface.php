<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 1:42 PM
 */

namespace Library\Repositories;


interface RepositoryInterface {

    public function all();
    public function find($id);

}