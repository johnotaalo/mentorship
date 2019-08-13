<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::create([
			'name' => 'Admin User',
			'email' => 'admin@mentorship-nascop.org',
			'password' => Hash::make('admin'),
			'role' => 1
		]);
		User::create([
			'name' => 'Sample User',
			'email' => 'sampleUser@mentorship-nascop.org',
			'password' => Hash::make('secret'),
			'role' => 2
		]);
    }
}
