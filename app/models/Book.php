<?php

class Book extends \Eloquent {
	protected $fillable = ['title'];

	public function authors() {
		return $this->belongsToMany('Author');
	}

	public function categories() {
		return $this->belongsToMany('Category');
	}
}