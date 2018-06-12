<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sellers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('admin_id')->unsigned()->nullable();
          $table->string('vendorname');
          $table->string('vendor_type');
          $table->string('producttype');
          $table->string('location');
          $table->string('country');
          $table->string('email');
          $table->text('address');
          $table->string('url');
          $table->string('cac');
          $table->string('workforce');
          $table->string('yearsofexp');
          $table->string('ratings');
          $table->string('contactname');
          $table->string('contactphone');
          $table->string('contactemail');
          $table->string('chairmanname');
          $table->string('chairmanphone');
          $table->string('chairmanemail');
          $table->string('password');
          $table->boolean('acStatus');
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('admin_id')->references('id')->on('Admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
