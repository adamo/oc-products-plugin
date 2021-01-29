<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
    public function up() {
        Schema::create('depcore_products_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('name',50);
            $table->string('short_description')->nullable( );
            $table->text('description')->nullable();
            $table->string('slug')->index();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('depcore_products_products');
    }
}
