<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_brands', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',30);
            $table->string('slug')->index();
            $table->string('color',7)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_brands');
    }
}
