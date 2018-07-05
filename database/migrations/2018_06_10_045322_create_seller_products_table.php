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

            $table->string('pro_description');
            $table->string('pro_keyword')->nullable();
            $table->string('part_number')->nullable();

            $table->string('model_number')->nullable();
            $table->integer('supply_type')->nullable()->comment('1=>OEM / Manufacturer, 2=>Distributor, 3=>Wholesaler, 4=>Retailer');
            $table->integer('pro_cat_id')->unsigned();
            $table->integer('pro_subcat_id')->unsigned();
            $table->string('pro_image')->nullble();
            $table->integer('manufacture_id')->unisgned();
            $table->integer('model_id')->unisgned();

            $table->integer('condition')->comment('1=>New, 2=>Refurbished, 3=>Fairly Used');
            $table->integer('pro_warranty')->nullable()->comment('1=>Less Then 0, 2=>One Year, 3=>Above One Year');
            $table->integer('pro_gurrantee')->nullable()->comment('1=>Less Then 0, 2=>One Year, 3=>Above One Year');
            //$table->integer('source')->comment('1=>OEM, 2=>Retailer,3=>Distributor');
            $table->string('a_img_1')->nullable();
            $table->string('a_img_2')->nullable();
            $table->string('a_img_3')->nullable();
            $table->string('a_img_4')->nullable();

            $table->string('pro_color')->nullable();//
            $table->string('speacial_feature')->nullable();

            $table->integer('small_order_accpeted')->nullable()->comment('1=>Yes, 2=>No');
            $table->integer('minumum_order_qty')->nullable();
            $table->integer('unit')->unsigned()->nullable();// unsigned needed type Integer
            $table->float('unit_price');// unsigned needed type Integer
            $table->float('price_for_optional_units')->nullable();
            $table->float('price_15_days')->nullable();
            $table->float('price_30_days')->nullable();
            $table->integer('stock_qty');
            $table->string('sample_fee')->nullable();
            $table->string('currency_in_naira')->nullable();
            $table->string('credit_payment_details')->nullable();// unsigned needed type Integer
            $table->string('optional_description')->nullable();

            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();




            $table->integer('weight_per_pack')->nullable();
            $table->string('export_carton_width')->nullable();
            $table->integer('export_carton_length')->nullable();
            $table->integer('export_carton_weight')->nullable();

            $table->integer('payment_type')->comment('1=>Cash on delivery, 2=>Cash after inspection, 3=>Cash in Advance',);

            $table->integer('delivery_w_state')->nullable()->comment('2=>No, 1=>Yes');
            $table->float('delivery_rate_w_range')->nullable();
            $table->float('delivery_rate_o_range')->nullable();

            $table->integer('duration_delivery_state')->nullable()->comment('1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ');
            $table->integer('duration_within_state')->nullable()->comment('1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ');
            $table->integer('duration_out_state')->nullable()->comment('1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ');

            $table->integer('strength_of_meterial')->nullable()->comment('1=>Grade 1, 2=>Grade 2, 3=>Grade 3, 4=>Grade 4 ');
            $table->string('seller_remark')->nullable();







            //Payment Dalivery information





            //Add more Button Section




            //Dimensions per unit


            //Delivery details





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
