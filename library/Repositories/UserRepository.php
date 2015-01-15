<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 1:39 PM
 */

namespace Library\Repositories;

use Library\Emberify\Emberifiable;
use Library\Transformers\UserTransformer;

class UserRepository implements RepositoryInterface{
    use Emberifiable;


    /**
     * @var \User
     */
    private $user;
    /**
     * @var UserTransformer
     */
    private $transformer;

    function __construct(\User $user, UserTransformer $transformer)
    {
        $this->user = $user;
        $this->transformer = $transformer;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->find($id);
    }
}