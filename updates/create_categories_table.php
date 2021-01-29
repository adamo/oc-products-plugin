<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',60);
            $table->string('slug')->index();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_categories');
    }
}
