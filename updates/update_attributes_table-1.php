<?php namespace Depcore\UserReview\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateAttributesTable extends Migration
{
    public function up()
    {
        Schema::table('depcore_products_attributes', function(Blueprint $table) {
			$table->boolean( 'is_filterable' )->default( 0 );
        });
    }

    public function down()
    {
        Schema::table('depcore_products_attributes', function(Blueprint $table) {
            $table->dropColumn('is_filterable');
        });
    }
}
