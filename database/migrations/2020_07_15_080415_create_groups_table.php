<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'groups';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->unsignedInteger("parentId")->default(0)->nullable();

            $table->unsignedInteger("companyId")->default(0)->nullable();
            $table->index(["companyId"], "groups_companyId_foreign_idx");

            $table->string('title',255)->default('')->nullable();
            $table->string('slug',255)->default('')->nullable();
            $table->enum('type',['credit','debit'])->nullable();
            $table->string('code',255)->default('')->nullable();

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->foreign('companyId', 'fk_companies_groups1_idx')
                ->references('id')->on('companies')
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
