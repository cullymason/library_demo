<?php

use Library\Repositories\AuthorRepository;

class AuthorController extends \BaseController {
	/**
	 * @var AuthorRepository
	 */
	private $authorRepository;

	function __construct(AuthorRepository $authorRepository)
	{
		$this->authorRepository = $authorRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /author
	 *
	 * @return Response
	 */
	public function index()
	{
		$authors = $this->authorRepository->all();

		return $this->authorRepository->emberify($authors);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /author/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /author
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /author/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$author = $this->authorRepository->find($id);

		return $this->authorRepository->emberify($author);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /author/{id}/edit
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
	 * PUT /author/{id}
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
	 * DELETE /author/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}