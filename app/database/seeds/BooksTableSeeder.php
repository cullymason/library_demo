<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		DB::table('books')->delete();
		foreach(range(1, 10) as $index)
		{
			Book::create([
				'title'=>$faker->sentence(3)
			]);
		}
	}

}