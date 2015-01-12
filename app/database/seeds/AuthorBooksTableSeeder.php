<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AuthorBooksTableSeeder extends Seeder {

	public function run()
	{
		DB::table('author_book')->delete();
		$authorIds = Author::lists('id');
		foreach(Book::all() as $book)
		{
			$numberOfAuthors = rand(1,3);


			for($i = 0; $i<$numberOfAuthors; $i++)
			{
				$random_author_key =array_rand($authorIds,1);
				$book->authors()->attach($authorIds[$random_author_key]);
			}
		}
	}

}