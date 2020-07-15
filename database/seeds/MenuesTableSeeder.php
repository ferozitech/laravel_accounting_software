<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('menus')->delete();
	$current_date=\Carbon\Carbon::now();
    $admins = array(
        array(
            'title' => "Header Menu",
            'slug' => "header-menu",
            'content' => "",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'title' => "Footer Menu",
            'slug' => "footer-menu",
            'content' => "",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
    );
	DB::table('menus')->insert($admins);
    }
}
