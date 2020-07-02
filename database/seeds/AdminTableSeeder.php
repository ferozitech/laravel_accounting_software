<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('admins')->delete();
    $admins = array( array(
        'name' => "admin",
        'email' => "admin@admin.com",
        'password' => '$2y$10$JV1QVRcrMLUCrsadjZmaPORz57PyG7tGD1nhW0/oFkzXNkb6203JG',
    ));
	DB::table('admins')->insert($admins);
}
}
