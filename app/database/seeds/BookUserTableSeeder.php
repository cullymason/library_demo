<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BookUserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('book_user')->delete();
		$bookIds = Book::lists('id');
		$totalBooks = Book::count();
		foreach(User::all() as $user)
		{
			$numberOfBooks = rand(1,$totalBooks);
			for($i = 0; $i<$numberOfBooks; $i++)
			{
				$random_book_key =array_rand($bookIds,1);
				$user->books()->attach($bookIds[$random_book_key]);
			}
		}
	}

}