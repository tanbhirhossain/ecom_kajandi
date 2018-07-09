<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerProduct;
use DB;
use App\Manufacter;
use Auth;
//use Request;

class SellerProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('seller');
    }

    public function index()
    {
      return view('seller.product.add_product');
    }


    public function postSellerProduct(Request $request)
    {
      $request->validate([
        'pro_name' => 'required|max:255|min:2',
        'pro_generic_name' => 'required',
        'manufacture_id' => 'required',
        'pro_description' => 'required|min:2|',
        'pro_cat_id' => 'required',
        'pro_subcat_id' => 'required',
        'pro_image' => 'required',
        'stock_qty' => 'required',
        'unit_price' => 'required',
        'payment_type' => 'required',
        'conditions' => 'required'

     ]);

     $file = $request->file( 'pro_image' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $pro_image = $upload_path . $name;

     }else{
         $pro_image = '';
     }

     $file = $request->file( 'a_img_1' );
     if($file!=NULL) {
         $name_a_1        = time() . '_' . $file->getClientOriginalName();
         $upload_path_a_1 = 'public/seller/product_img/';
         $file->move( $upload_path_a_1, $name_a_1 );
         $a_img_1 = $upload_path_a_1 . $name_a_1;

     }else{
         $a_img_1 = '';
     }

     $file = $request->file( 'a_img_2' );
     if($file!=NULL) {
         $name_a_2        = time() . '_' . $file->getClientOriginalName();
         $upload_path_a_2 = 'public/seller/product_img/';
         $file->move( $upload_path_a_2, $name_a_2 );
         $a_img_2 = $upload_path_a_2 . $name_a_2;

     }else{
         $a_img_2 = '';
     }

     $file = $request->file( 'a_img_3' );
     if($file!=NULL) {
         $name_a_3        = time() . '_' . $file->getClientOriginalName();
         $upload_path_a_3 = 'public/seller/product_img/';
         $file->move( $upload_path_a_3, $name_a_3 );
         $a_img_3 = $upload_path_a_3 . $name_a_3;

     }else{
         $a_img_3 = '';
     }

     $file = $request->file( 'a_img_4' );
     if($file!=NULL) {
         $name_a_4        = time() . '_' . $file->getClientOriginalName();
         $upload_path_a_4 = 'public/seller/product_img/';
         $file->move( $upload_path_a_4, $name_a_4 );
         $a_img_4 = $upload_path_a_4 . $name_a_4;

     }else{
         $a_img_4 = '';
     }


      $product = new SellerProduct();
      $product->seller_id = $request->seller_id;
      $product->pro_status = 0;

      $product->pro_name = $request->pro_name;
      $product->pro_generic_name = $request->pro_generic_name;
      $product->pro_description = $request->pro_description;
      $product->pro_keyword = $request->pro_keyword;
      $product->part_number = $request->part_number;
      $product->manufacture_id = $request->manufacture_id;
      $product->model_number = $request->model_number;
      $product->supply_type = $request->supply_type;
      $product->pro_cat_id = $request->pro_cat_id;
      $product->pro_subcat_id = $request->pro_subcat_id;
      $product->conditions = $request->conditions;
      $product->pro_warranty = $request->pro_warranty;
      $product->pro_gurrantee = $request->pro_gurrantee;

      $product->pro_image = $pro_image;

      $product->pro_color = $request->pro_color;

      $product->a_img_1 = $a_img_1;
      $product->a_img_2 = $a_img_2;
      $product->a_img_3 = $a_img_3;
      $product->a_img_4 = $a_img_4;

      $product->speacial_feature = $request->speacial_feature;

      $product->small_order_accpeted = $request->small_order_accpeted;
      $product->minumum_order_qty = $request->minumum_order_qty;
      $product->unit = $request->unit;
      $product->unit_price = $request->unit_price;
      $product->price_for_optional_units = $request->price_for_optional_units;
      $product->price_15_days = $request->price_15_days;
      $product->price_30_days = $request->price_30_days;
      $product->optional_description = $request->optional_description;

      $product->stock_qty = $request->stock_qty;
      $product->sample_fee = $request->sample_fee;
      $product->currency_in_naira = $request->currency_in_naira;
      $product->credit_payment_details = $request->credit_payment_details;
      $product->length = $request->length;
      $product->width = $request->width;
      $product->height = $request->height;

      $product->weight_per_pack = $request->weight_per_pack;
      $product->export_carton_width = $request->export_carton_width;
      $product->export_carton_length = $request->export_carton_length;
      $product->export_carton_weight = $request->export_carton_weight;


      $product->delivery_w_state = $request->delivery_w_state;
      $product->delivery_rate_w_range = $request->delivery_rate_w_range;
      $product->delivery_rate_o_range = $request->delivery_rate_o_range;

      $product->strength_of_meterial = $request->strength_of_meterial;
      $product->seller_remark = $request->seller_remark;
      $product->payment_type = $request->payment_type;

      $product->duration_delivery_state = $request->duration_delivery_state;
      $product->duration_within_state = $request->duration_within_state;
      $product->duration_out_state = $request->duration_out_state;



      $product->save();

      return back()->with('message_success', 'Seller Product Added Succesfully');
    }

    public function productList()
    {
      $sellerProduct = SellerProduct::where('seller_id', Auth::id())->paginate(10);
      return view('seller.product.product_list')->with(compact('sellerProduct'));
    }

    public function editProduct($id)
    {
      $editpro = SellerProduct::find($id);
      $menuFact = DB::table('manufacters')->where('id', $editpro->manufacture_id)->first();
      $procat = DB::table('categories')->where('id', $editpro->pro_cat_id)->first();
      $prosubcat = DB::table('subcategories')->where('id', $editpro->pro_subcat_id)->first();
      $proUnit = DB::table('units')->where('id', $editpro->unit)->first();
      return view('seller.product.edit_product', compact('editpro','menuFact','proModel','procat','prosubcat','proUnit'));

    }

    public function updateSellerPro(Request $request, $id)
    {
      $request->validate([
       'pro_name' => 'required|max:255|min:2',
       'pro_generic_name' => 'required',
       'manufacture_id' => 'required',
       'pro_description' => 'required|min:2|',
       'pro_cat_id' => 'required',
       'pro_subcat_id' => 'required',
       //'pro_image' => 'required',
       'stock_qty' => 'required',
       'unit_price' => 'required',
       'payment_type' => 'required',
       'conditions' => 'required'

     ]);

    $product = SellerProduct::find($id);
     $file = $request->file( 'pro_image' );
     if($file!=NULL) {
         unlink( $product->pro_image );
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $pro_image = $upload_path . $name;
     }else{
         $pro_image = $product->pro_image;
     }

     $file = $request->file( 'a_img_1' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $a_img_1 = $upload_path . $name;
         if ($product->a_img_1 != Null) {
             unlink( $product->a_img_1 );
         }

     }else {
       $a_img_1 = $product->a_img_1;
     }

     $file = $request->file( 'a_img_2' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $a_img_2 = $upload_path . $name;
         if ($product->a_img_2 != Null) {
             unlink( $product->a_img_2 );
         }

     }else {
       $a_img_2 = $product->a_img_2;
     }

     $file = $request->file( 'a_img_3' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $a_img_3 = $upload_path . $name;
         if ($product->a_img_3 != Null) {
             unlink( $product->a_img_3 );
         }

     }else {
       $a_img_3 = $product->a_img_3;
     }


     $file = $request->file( 'a_img_4' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/seller/product_img/';
         $file->move( $upload_path, $name );
         $a_img_4 = $upload_path . $name;
         if ($product->a_img_4 != Null) {
             unlink( $product->a_img_4 );
         }

     }else {
       $a_img_4 = $svimg->a_img_4;
     }

     // $file = $request->file( 'a_img_1' );
     // if($file!=NULL) {
     //     unlink( $product->a_img_1 );
     //     $name        = time() . '_' . $file->getClientOriginalName();
     //     $upload_path = 'public/seller/product_img/';
     //     $file->move( $upload_path, $name );
     //     $a_img_1 = $upload_path . $name;
     // }else{
     //     $a_img_1 = $product->a_img_1;
     // }
     //
     // $file = $request->file( 'a_img_2' );
     // if($file!=NULL) {
     //     unlink( $product->a_img_2 );
     //     $name        = time() . '_' . $file->getClientOriginalName();
     //     $upload_path = 'public/seller/product_img/';
     //     $file->move( $upload_path, $name );
     //     $a_img_2 = $upload_path . $name;
     // }else{
     //     $a_img_2 = $product->a_img_2;
     // }
     //
     // $file = $request->file( 'a_img_3' );
     // if($file!=NULL) {
     //     unlink( $product->a_img_3 );
     //     $name        = time() . '_' . $file->getClientOriginalName();
     //     $upload_path = 'public/seller/product_img/';
     //     $file->move( $upload_path, $name );
     //     $a_img_3 = $upload_path . $name;
     // }else{
     //     $a_img_3 = $product->a_img_3;
     // }
     //
     //
     // $file = $request->file( 'a_img_4' );
     // if($file!=NULL) {
     //     unlink( $product->a_img_4 );
     //     $name        = time() . '_' . $file->getClientOriginalName();
     //     $upload_path = 'public/seller/product_img/';
     //     $file->move( $upload_path, $name );
     //     $a_img_4 = $upload_path . $name;
     // }else{
     //     $a_img_4 = $product->a_img_4;
     // }

    $product->seller_id = $request->seller_id;
    $product->pro_name = $request->pro_name;
    $product->pro_generic_name = $request->pro_generic_name;
    $product->pro_description = $request->pro_description;
    $product->pro_keyword = $request->pro_keyword;
    $product->part_number = $request->part_number;
    $product->manufacture_id = $request->manufacture_id;
    $product->model_number = $request->model_number;
    $product->supply_type = $request->supply_type;
    $product->pro_cat_id = $request->pro_cat_id;
    $product->pro_subcat_id = $request->pro_subcat_id;
    $product->conditions = $request->conditions;
    $product->pro_warranty = $request->pro_warranty;
    $product->pro_gurrantee = $request->pro_gurrantee;

    $product->pro_image = $pro_image;

    $product->pro_color = $request->pro_color;

    $product->a_img_1 = $a_img_1;
    $product->a_img_2 = $a_img_2;
    $product->a_img_3 = $a_img_3;
    $product->a_img_4 = $a_img_4;

    $product->speacial_feature = $request->speacial_feature;

    $product->small_order_accpeted = $request->small_order_accpeted;
    $product->minumum_order_qty = $request->minumum_order_qty;
    $product->unit = $request->unit;
    $product->unit_price = $request->unit_price;
    $product->price_for_optional_units = $request->price_for_optional_units;
    $product->price_15_days = $request->price_15_days;
    $product->price_30_days = $request->price_30_days;
    $product->optional_description = $request->optional_description;

    $product->stock_qty = $request->stock_qty;
    $product->sample_fee = $request->sample_fee;
    $product->currency_in_naira = $request->currency_in_naira;
    $product->credit_payment_details = $request->credit_payment_details;
    $product->length = $request->length;
    $product->width = $request->width;
    $product->height = $request->height;

    $product->weight_per_pack = $request->weight_per_pack;
    $product->export_carton_width = $request->export_carton_width;
    $product->export_carton_length = $request->export_carton_length;
    $product->export_carton_weight = $request->export_carton_weight;


    $product->delivery_w_state = $request->delivery_w_state;
    $product->delivery_rate_w_range = $request->delivery_rate_w_range;
    $product->delivery_rate_o_range = $request->delivery_rate_o_range;

    $product->strength_of_meterial = $request->strength_of_meterial;
    $product->seller_remark = $request->seller_remark;
    $product->payment_type = $request->payment_type;

    $product->duration_delivery_state = $request->duration_delivery_state;
    $product->duration_within_state = $request->duration_within_state;
    $product->duration_out_state = $request->duration_out_state;




      $product->save();

      return back()->with('message_success', 'Seller Product Updated Succesfully');
       //dd($product);
    }

    public function deleteProduct($id)
    {
      $sellerPro = SellerProduct::find($id);
      if ($sellerPro->pro_image != Null) {
          unlink($sellerPro->pro_image);
      }
      if ($sellerPro->a_img_1 != Null) {
        unlink($sellerPro->a_img_1);
      }
      if ($sellerPro->a_img_2 != Null) {
        unlink($sellerPro->a_img_2);
      }
      if ($sellerPro->a_img_3 != Null) {
        unlink($sellerPro->a_img_3);
      }
      if ($sellerPro->a_img_4 != Null) {
        unlink($sellerPro->a_img_4);
      }
      $sellerPro->delete();

      return back()->with('message_success', 'Seller Product Deleted Succesfully');
    }

    public function multiDeletePro(Request $request )
    {
        $ids = $request->ids;
        DB::table("seller_products")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }


}
