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
			'name' => 'Sushant Kumar',
			'email' => 'Sushant.cotocus@gmail.com',
			'phone' => '7896541230',
			'password' => bcrypt('rootsushant'),
		]);

		DB::table('users')->insert([
			'role_id' => '2',
			'name' => 'Social Revolutionaries',
			'email' => 'sr@blog.com',
			'phone' => NULL,
			'password' => bcrypt('rootsr'),
		]);

		DB::table('users')->insert([
			'role_id' => '3',
			'name' => 'Social Member',
			'email' => 'sm@blog.com',
			'phone' => NULL,
			'password' => bcrypt('rootsm'),
		]);
	}

}
