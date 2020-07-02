<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'menu_items';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('page_id')->default(0)->nullable();
            $table->string('title',255)->default('')->nullable();
            $table->string('slug',255)->default('')->nullable();
            $table->string('page_type',255)->default('')->nullable();
            $table->enum('menu_type',['header','footer'])->default('header')->nullable();
            $table->integer('position')->default(0)->nullable();
            $table->integer('parent_id')->default(0)->nullable();

            $table->index(["page_id"], 'menu_items_pages_id_foreign_idx');

            $table->softDeletes();
            $table->nullableTimestamps();

//            $table->foreign('page_id', 'fk_pages_menu_items1_idx')
//                ->references('id')->on('pages')
//                ->onDelete('no action')
//                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
