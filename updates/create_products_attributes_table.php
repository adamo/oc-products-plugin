<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_products_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('value_id')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_products_attributes');
    }
}
