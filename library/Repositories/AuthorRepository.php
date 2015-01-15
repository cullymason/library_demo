<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 4:29 PM
 */

namespace Library\Repositories;


use Library\Emberify\Emberifiable;
use Library\Transformers\AuthorTransformer;

class AuthorRepository implements RepositoryInterface {
    use Emberifiable;
    /**
     * @var \Author
     */
    private $author;
    /**
     * @var AuthorTransformer
     */
    private $transformer;

    function __construct(\Author $author, AuthorTransformer $transformer)
    {
        $this->author = $author;
        $this->transformer = $transformer;
    }

    public function all()
    {
        return $this->author->all();
    }

    public function find($id)
    {
        return $this->author->find($id);

    }
}