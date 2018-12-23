<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromocode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->boolean('status')->default(false);
            $table->integer('quantity');
            $table->integer('percent')->nullable();
            $table->integer('summ')->nullable();
            $table->timestamp('started_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('finished_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
}
