<?php

use Library\Repositories\BookRepository;

class BookController extends \BaseController {
	/**
	 * @var BookRepository
	 */
	private $bookRepository;

	function __construct(BookRepository $bookRepository)
	{
		$this->bookRepository = $bookRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /book
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = $this->bookRepository->all();
		return $this->bookRepository->emberify($books);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /book/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /book
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = $this->bookRepository->find($id);
		return $this->bookRepository->emberify($book);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /book/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}