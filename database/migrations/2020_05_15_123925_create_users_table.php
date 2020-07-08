<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'users';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username',255)->default('')->nullable();
            $table->string('name',255)->default('')->nullable();
            $table->string('email',255)->default('')->nullable();
            $table->string('father_name',255)->default('')->nullable();
            $table->string('dob',255)->default('')->nullable();
            $table->string('CNIC',255)->default('')->nullable();
            $table->string('marital_status',255)->default('')->nullable();
            $table->string('type',255)->default('')->nullable();
            $table->string('Address',255)->default('')->nullable();
            $table->string('password',255)->default('')->nullable();
            $table->string('city',255)->default('')->nullable();
            $table->string('state',255)->default('')->nullable();
            $table->string('country',255)->default('')->nullable();
            $table->string('qualification',255)->default('')->nullable();
            $table->string('designation',255)->default('')->nullable();
            $table->string('joining_date',255)->default('')->nullable();
            $table->string('starting_salary',255)->default('')->nullable();
            $table->string('current_salary',255)->default('')->nullable();
            $table->string('remember_token',255)->default('')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
