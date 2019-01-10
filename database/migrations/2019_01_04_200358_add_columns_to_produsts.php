<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProdusts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('inner_id')->index()->after('id');
            $table->string('vendor')->index()->after('inner_id');
            $table->string('full_name')->after('name');
            $table->string('weight')->after('slug');
            $table->string('packing')->after('weight');
            $table->string('barcode')->after('vendor')->nullable();
            $table->string('vendor_code')->after('vendor')->nullable();
            $table->json('ingredients')->nullable();
            $table->integer('portions_count')->after('packing')->nullable();
            $table->json('goals')->nullable();
            $table->integer('availability')->index()->after('full_name');
            $table->integer('present')->nullable();
            $table->integer('free_delivery')->nullable();
            $table->integer('order_only')->nullable();
            $table->string('gender')->nullable();
            $table->string('vendors_country')->nullable();
            $table->string('vendor_country_brand')->nullable();
            $table->string('form')->nullable();
            $table->integer('portion_size')->nullable();
            $table->integer('discount_price')->after('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('outer_code')->nullable();
            $table->json('attributes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('inner_id');
            $table->dropColumn('vendor');
            $table->dropColumn('full_name');
            $table->dropColumn('weight');
            $table->dropColumn('packing');
            $table->dropColumn('barcode');
            $table->dropColumn('vendor_code');
            $table->dropColumn('ingredients');
            $table->dropColumn('portions_count');
            $table->dropColumn('goals');
            $table->dropColumn('availability');
            $table->dropColumn('present');
            $table->dropColumn('free_delivery');
            $table->dropColumn('order_only');
            $table->dropColumn('gender');
            $table->dropColumn('vendors_country');
            $table->dropColumn('vendor_country_brand');
            $table->dropColumn('form');
            $table->dropColumn('portion_size');
            $table->dropColumn('discount_price');
            $table->dropColumn('currency');
            $table->dropColumn('outer_code');
            $table->dropColumn('attributes');
        });
    }
}
