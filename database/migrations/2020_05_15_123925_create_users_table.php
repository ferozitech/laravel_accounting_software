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
            $table->string('f_name',255)->default('')->nullable();
            $table->string('l_name',255)->default('')->nullable();
            $table->string('display_name',255)->default('')->nullable();
            $table->text('avatar')->default('')->nullable();
            $table->text('avatar_original')->default('')->nullable();
            $table->string('email',255)->default('')->nullable();
            $table->string('password',255)->default('')->nullable();
            $table->string('social_id',255)->default('')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->string('city',255)->default('')->nullable();
            $table->text('address')->default('')->nullable();
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
