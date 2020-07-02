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
	DB::table('users')->delete();
    $users = array(
        array(
        'f_name'=>'Ghalib',
        'l_name'=>'Soomro',
        'display_name'=>'',
        'avatar'=>'',
        'avatar_original'=>'',
        'email'=>'johnsmith@example.com',
        'password'=>'$2y$10$JV1QVRcrMLUCrsadjZmaPORz57PyG7tGD1nhW0/oFkzXNkb6203JG',
        'social_id'=>'',
        'country_id'=>166,
        'state_id'=>2730,
        'city'=>'Karachi',
        'address'=>'Pakistan',
        'remember_token'=>'',
        'deleted_at'=>null,
        'created_at'=>'2020-06-17 09:22:28',
        'updated_at'=>'2020-06-17 09:22:28',
    ));
	DB::table('users')->insert($users);
}
}
