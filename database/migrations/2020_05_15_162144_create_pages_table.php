<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $tableName = 'pages';
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',255)->default('')->nullable();
            $table->string('slug',255)->default('')->nullable();
            $table->string('banner_image_name',255)->default('')->nullable();
            $table->longText('banner_text')->default('')->nullable();
            $table->longText('content')->default('')->nullable();
            $table->string('meta_title',255)->default('')->nullable();
            $table->longText('meta_description')->default('')->nullable();
            $table->longText('meta_keywords')->default('')->nullable();
            $table->longText('page_css')->default('')->nullable();
            $table->longText('header_script')->default('')->nullable();
            $table->longText('footer_script')->default('')->nullable();
            $table->tinyInteger('is_disabled')->default(0)->nullable();
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
        Schema::dropIfExists('pages');
    }
}
