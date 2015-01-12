<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BookCategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('book_category')->delete();
		$categoryIds = Category::lists('id');
		foreach(Book::all() as $book)
		{
			$numberOfCategories = rand(1,3);


			for($i = 0; $i<$numberOfCategories; $i++)
			{
				$random_category_key =array_rand($categoryIds,1);
				$book->categories()->attach($categoryIds[$random_category_key]);
			}
		}
	}

}