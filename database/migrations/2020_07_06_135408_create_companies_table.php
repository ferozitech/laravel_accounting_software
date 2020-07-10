<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'companies';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->unsignedInteger("userId")->default(0)->nullable();
            $table->index(["userId"], "companies_userId_foreign_idx");

            $table->string('Title',255)->default('')->nullable();
            $table->string('slug',255)->default('')->nullable();
            $table->string('logo',255)->default('')->nullable();
            $table->string('email',255)->default('')->unique()->nullable();
            $table->string('phone',255)->default('')->nullable();
            $table->string('website',255)->default('')->nullable();
            $table->dateTime('financial_period_from')->nullable();
            $table->dateTime('financial_period_to')->nullable();
            $table->string('registration_number',255)->default('')->nullable();
            $table->dateTime('date_of_incorp')->nullable();
            $table->string('ntn_number',255)->default('')->nullable();
            $table->string('salestax_number',255)->default('')->nullable();
            $table->string('authorised_capital',255)->default('')->nullable();
            $table->string('paidup_capital',255)->default('')->nullable();
            $table->string('share_price',255)->default('')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->foreign('userId', 'fk_users_companies1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
