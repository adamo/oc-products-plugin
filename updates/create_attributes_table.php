<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_attributes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',60);
            $table->string('slug')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_attributes');
    }
}
