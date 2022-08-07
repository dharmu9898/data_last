<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
			'role_id' => '1',
			'name' => 'Rakesh Kumar',
			'email' => 'Rakesh.cotocus@gmail.com',
			
			'password' => bcrypt('rootrakesh'),
		]);

		DB::table('users')->insert([
			'role_id' => '2',
			'name' => 'Tour Operator',
			'email' => 'Tour@blog.com',
			'Country' => '101',
			'State' => '16',
			'City' => '1373',
			'password' => bcrypt('rootrr'),
		]);

		DB::table('users')->insert([
			'role_id' => '3',
			'name' => 'User',
			'email' => 'User@blog.com',
			
			'password' => bcrypt('rootur'),
		]);
    }
}
