<?php namespace Depcore\UserReview\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateAttributesTable2 extends Migration
{
    public function up()
    {
        Schema::table('depcore_products_attributes', function(Blueprint $table) {
            $table->boolean('is_published')->default(false);
        });
    }

    public function down()
    {
        Schema::table('depcore_products_attributes', function(Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
}
