<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateValuesTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_values', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('attribute_id')->unsigned();
            $table->string('value');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_values');
    }
}
