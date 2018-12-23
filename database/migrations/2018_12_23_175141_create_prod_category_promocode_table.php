<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdCategoryPromocodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_category_promocodes', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('prod_category_id')->unsigned();
            $table->foreign('prod_category_id')->references('id')->on('prod_categories')->onDelete('cascade');
            $table->integer('promocode_id')->unsigned();
            $table->foreign('promocode_id')->references('id')->on('promocodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prod_category_promocodes');
    }
}
