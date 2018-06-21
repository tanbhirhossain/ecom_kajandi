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
        $this->middleware('auth:seller');
        $this->middleware('seller');
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
         'pro_description' => 'required|min:2|',
         'pro_cat_id' => 'required',
         'pro_subcat_id' => 'required',
         'pro_image' => 'required',
         'unit_of_measure' => 'required',
         'pro_price' => 'required',
         'payment_method' => 'required',

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
         $a_img_3 = $upload_path_a_2 . $name_a_3;

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

      $product->pro_image = $pro_image;

      $product->pro_color = $request->pro_color;

      $product->a_img_1 = $a_img_1;
      $product->a_img_2 = $a_img_2;
      $product->a_img_3 = $a_img_3;
      $product->a_img_4 = $a_img_4;

      $product->speacial_feature = $request->speacial_feature;

      $product->small_order_accpeted = $request->small_order_accpeted;
      $product->minumum_order_qty = $request->minumum_order_qty;
      $product->unit_of_measure = $request->unit_of_measure;
      $product->pro_price = $request->pro_price;
      $product->price_for_optional_units = $request->price_for_optional_units;
      $product->price_15_days = $request->price_15_days;
      $product->price_30_days = $request->price_30_days;
      $product->optional_description = $request->optional_description;

      $product->sample_fee = $request->sample_fee;
      $product->currency_in_naira = $request->currency_in_naira;
      $product->credit_payment_details = $request->credit_payment_details;
      $product->length = $request->length;
      $product->width = $request->width;
      $product->height = $request->height;
      $product->weight_per_pack = $request->weight_per_pack;
      $product->export_carton_dimension = $request->export_carton_dimension;
      $product->export_carton_weight = $request->export_carton_weight;

      $product->delivery_w_state = $request->delivery_w_state;
      $product->delivery_rate_w_range = $request->delivery_rate_w_range;
      $product->delivery_rate_o_range = $request->delivery_rate_o_range;
      $product->payment_method = $request->payment_method;


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
      return view('seller.product.edit_product', compact('editpro','menuFact','proModel','procat','prosubcat'));
    }

    public function updateSellerPro(Request $request, $id)
    {
      $request->validate([
         'pro_name' => 'required|max:255|min:2',
         'pro_generic_name' => 'required',
         'pro_description' => 'required|min:2|',
         'pro_cat_id' => 'required',
         'pro_subcat_id' => 'required',

         'unit_of_measure' => 'required',
         'pro_price' => 'required',
         'payment_method' => 'required',

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
         $a_img_3 = $upload_path_a_2 . $name_a_3;

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


      $product = SellerProduct::find($id);
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

      $product->pro_image = $pro_image;

      $product->pro_color = $request->pro_color;

      $product->a_img_1 = $a_img_1;
      $product->a_img_2 = $a_img_2;
      $product->a_img_3 = $a_img_3;
      $product->a_img_4 = $a_img_4;

      $product->speacial_feature = $request->speacial_feature;

      $product->small_order_accpeted = $request->small_order_accpeted;
      $product->minumum_order_qty = $request->minumum_order_qty;
      $product->unit_of_measure = $request->unit_of_measure;
      $product->pro_price = $request->pro_price;
      $product->price_for_optional_units = $request->price_for_optional_units;
      $product->price_15_days = $request->price_15_days;
      $product->price_30_days = $request->price_30_days;
      $product->optional_description = $request->optional_description;

      $product->sample_fee = $request->sample_fee;
      $product->currency_in_naira = $request->currency_in_naira;
      $product->credit_payment_details = $request->credit_payment_details;
      $product->length = $request->length;
      $product->width = $request->width;
      $product->height = $request->height;
      $product->weight_per_pack = $request->weight_per_pack;
      $product->export_carton_dimension = $request->export_carton_dimension;
      $product->export_carton_weight = $request->export_carton_weight;

      $product->delivery_w_state = $request->delivery_w_state;
      $product->delivery_rate_w_range = $request->delivery_rate_w_range;
      $product->delivery_rate_o_range = $request->delivery_rate_o_range;
      $product->payment_method = $request->payment_method;


      $product->save();

      return back()->with('message_success', 'Seller Product Updated Succesfully');
    }

    public function deleteProduct($id)
    {
      $sellerPro = SellerProduct::find($id);
      $sellerPro->delete();

      return back()->with('message_success', 'Seller Product Deleted Succesfully');
    }

    //testing-
    public function json(Request $request)
    {
      if($request->status) {
        $sellers = SellerProduct::where('pro_status',$request->pro_status)->get();
        return response()->json(['data' => $sellers]);
      } else {
        $sellers = SellerProduct::get();
        return response()->json(['data' => $sellers]);
      }
    }

     public function deleteMultiPro()
     {
       $checked = Request::input('checked',[]);
       foreach ($checked as $id) {
            SellerProduct::where("id",$id)->delete(); //Assuming you have a Todo model.
       }
       //Or as @Alex suggested
       SellerProduct::whereIn($checked)->delete();

       return redirect()->back();
     }
}
