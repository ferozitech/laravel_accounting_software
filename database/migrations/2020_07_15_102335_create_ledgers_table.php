<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'ledgers';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title',255)->default('')->nullable();
            $table->string('slug',255)->default('')->nullable();

            $table->unsignedInteger("groupId")->default(0)->nullable();
            $table->index(["groupId"], "ledgers_groupId_foreign_idx");

            $table->text('description')->default('')->nullable();
            $table->string('ref_number',255)->default('')->nullable();
            $table->string('party_ref_number',255)->default('')->nullable();
            $table->string('opening_balance',255)->default('')->nullable();
            $table->string('account_serial',255)->default('')->nullable();

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->foreign('groupId', 'fk_groups_ledgers1_idx')
                ->references('id')->on('groups')
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
