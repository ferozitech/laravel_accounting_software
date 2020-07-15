<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'vouchers';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->dateTime('date')->nullable();
            $table->string('number',255)->default('')->nullable();
            $table->enum('type',['credit','debit'])->nullable();

            $table->unsignedInteger("categoryId")->default(0)->nullable();
            $table->index(["categoryId"], "vouchers_categoryId_foreign_idx");

            $table->unsignedInteger("userId")->default(0)->nullable();
            $table->index(["userId"], "vouchers_userId_foreign_idx");

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->foreign('categoryId', 'fk_voucher_categories_vouchers1_idx')
                ->references('id')->on('voucher_categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('userId', 'fk_users_ledgers1_idx')
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
