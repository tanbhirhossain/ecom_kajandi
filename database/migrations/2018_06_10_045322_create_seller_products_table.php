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
            $table->integer('pro_status')->comment('0=>Inactive, 1=>Inactive, 2=>Low Stock, 3=>Out of Stock ');
            $table->string('pro_name');
            $table->string('pro_generic_name');
            $table->string('pro_description');
            $table->string('pro_keyword')->nullable();
            $table->string('part_number')->nullable();
            $table->integer('manufacture_id')->unisgned();
            $table->string('model_number')->nullable();
            $table->integer('supply_type')->nullable()->comment('1=>OEM / Manufacturer, 2=>Distributor, 3=>Wholesaler, 4=>Retailer');
            $table->integer('pro_cat_id')->unsigned();
            $table->integer('pro_subcat_id')->unsigned();
            $table->string('pro_image');
            $table->string('pro_color')->nullable();
            $table->string('a_img_1')->nullable();
            $table->string('a_img_2')->nullable();
            $table->string('a_img_3')->nullable();
            $table->string('a_img_4')->nullable();
            $table->string('speacial_feature')->nullable();
            //Payment Dalivery information
            $table->integer('small_order_accpeted')->nullable()->comment('1=>Yes, 0=>No');
            $table->integer('minumum_order_qty')->nullable();
            $table->integer('unit_of_measure');// unsigned needed type Integer
            $table->float('pro_price');// unsigned needed type Integer
            $table->float('price_for_optional_units')->nullable();
            $table->float('price_15_days')->nullable();
            $table->float('price_30_days')->nullable();

            $table->string('optional_description')->nullable();
            //Add more Button Section
            $table->string('sample_fee')->nullable();
            $table->string('currency_in_naira')->nullable();
            $table->string('credit_payment_details')->nullable();// unsigned needed type Integer


            //Dimensions per unit
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight_per_pack')->nullable();
            $table->string('export_carton_dimension')->nullable();
            $table->integer('export_carton_weight')->nullable();
            //Delivery details
            $table->integer('delivery_w_state')->nullable()->comment('0=>No, 1=>Yes');
            $table->float('delivery_rate_w_range')->nullable();
            $table->float('delivery_rate_o_range')->nullable();

            $table->integer('payment_method')->comment('1=>Cash in advance, 2=>Cash on delivery');


            $table->timestamps();

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
