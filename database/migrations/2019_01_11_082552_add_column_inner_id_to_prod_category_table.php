<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInnerIdToProdCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prod_categories', function (Blueprint $table) {
            //
            $table->string('inner_id')->index('inner_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prod_categories', function (Blueprint $table) {
            //
            $table->dropColumn('inner_id');
        });
    }
}
