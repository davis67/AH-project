<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Add Users
	     *
	     */

	        $newUser = User::create([
	            'name' => 'Davis Agaba',
	            'first_name' => 'Davis',
	            'last_name' => 'Agaba',
	            'email' => 'admin@admin.com',
	            'is_permitted' => '8',
	            'team' =>'TCS',
	            'employee_no' => 'AH/518/18',
	            'password' => bcrypt('password'),
	        ]);

    }
}