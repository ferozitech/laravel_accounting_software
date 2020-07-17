<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    \App\Models\Group::query()->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	$current_date=\Carbon\Carbon::now();
    $admins = array(
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Equity",
            'slug' => "equity",
            'code' => "11000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Current Liabilities",
            'slug' => "current-liabilities",
            'code' => "12000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Fixed Assets",
            'slug' => "fixed-assets",
            'code' => "13000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Current Assets",
            'slug' => "current-assets",
            'code' => "12100000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Non-Current Liabilities",
            'slug' => "non-current-liabilities",
            'code' => "14310000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Income",
            'slug' => "income",
            'code' => "15000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Cost Of Sale",
            'slug' => "cost-of-sale",
            'code' => "16000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
        array(
            'parentId' => 0,
            'companyId' => null,
            'title' => "Expenses",
            'slug' => "expenses",
            'code' => "17000000",
            'created_at' => $current_date,
            'updated_at' => $current_date,
            ),
    );
	DB::table('groups')->insert($admins);
}
}
