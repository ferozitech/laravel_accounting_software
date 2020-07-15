<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'transactions';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->unsignedInteger("ledgerId")->default(0)->nullable();
            $table->index(["ledgerId"], "transactions_ledgerId_foreign_idx");

            $table->unsignedInteger("voucherId")->default(0)->nullable();
            $table->index(["voucherId"], "transactions_voucherId_foreign_idx");

            $table->unsignedInteger("userId")->default(0)->nullable();
            $table->index(["userId"], "transactions_userId_foreign_idx");

            $table->enum('transactionType',['credit','debit'])->nullable();
            $table->decimal('amount')->default(0.00)->nullable();
            $table->text('description')->default("")->nullable();

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->foreign('ledgerId', 'fk_ledgers_transactions1_idx')
                ->references('id')->on('ledgers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('voucherId', 'fk_vouchers_transactions1_idx')
                ->references('id')->on('vouchers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('userId', 'fk_users_transactions1_idx')
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
