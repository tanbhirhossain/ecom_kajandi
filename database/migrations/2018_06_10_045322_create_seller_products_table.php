<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('image')->nullable();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->string('partnumber');
            $table->string('unit');
            $table->string('weight');
            $table->string('length');
            $table->integer('category')->unsigned();
            $table->integer('subscategory')->unsigned();
            $table->string('availability');
            $table->string('quantity');
            $table->float('price');
            $table->float('pricewithin15days');
            $table->float('pricewithin30days');
            $table->string('condition_id');// unsigned needed type Integer
            $table->string('source_id');// unsigned needed type Integer
            $table->string('payondelivery');
            $table->float('deliveryratestate');
            $table->float('deliveryrateoutstatewithgeo');
            $table->float('deliveryrateoutsidegeo');
            $table->string('addon_id');// unsigned needed type Integer
            $table->string('strengthofmaterial');
            $table->string('addon_type');
            $table->string('color');
            $table->string('remark');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('manufacturer_id')->references('id')->on('manufacters');
            $table->foreign('model_id')->references('id')->on('product_models');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('subscategory')->references('id')->on('subcategories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_products');
    }
}
