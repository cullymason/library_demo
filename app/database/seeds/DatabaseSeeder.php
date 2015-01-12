<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->command->info('Migrating Main Tables..');
		$this->call('UsersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('BooksTableSeeder');
		$this->call('AuthorsTableSeeder');
		$this->command->info('Attaching relationships...');
	}

}
