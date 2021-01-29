<?php namespace Depcore\Products\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSvgIconsTable extends Migration
{
    public function up()
    {
        Schema::create('depcore_products_svg_icons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('iconable_id')->unsigned()->index(  )->nullable(  );
            $table->string('iconable_type')->nullable();
            $table->string('symbol');
            $table->string('viewport');
            $table->text('code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('depcore_products_svg_icons');
    }
}
