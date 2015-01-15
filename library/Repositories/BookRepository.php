<?php
/**
 * Created by PhpStorm.
 * User: cully
 * Date: 1/15/15
 * Time: 2:37 PM
 */

namespace Library\Repositories;


use Library\Emberify\Emberifiable;
use Library\Transformers\BookTransformer;

class BookRepository implements RepositoryInterface {
    use Emberifiable;
    /**
     * @var \Book
     */
    private $book;
    /**
     * @var BookTransformer
     */
    private $transformer;

    function __construct(\Book $book, BookTransformer $transformer)
    {
        $this->book = $book;
        $this->transformer = $transformer;
    }

    public function all()
    {
        $books = $this->book->all();
        return $books;
    }

    public function find($id)
    {
        $book = $this->book->find($id);
        return $book;
    }
}