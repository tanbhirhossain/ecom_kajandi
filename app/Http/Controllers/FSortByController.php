<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use DB;
use App\SellerProduct;
class FSortByController extends Controller{
    public function product_details($id){
        $product_by_id = SellerProduct::find($id);
        return view('frontend.product.product_single')->with(compact('product_by_id'));
    }
    public function shop_content(){
        $all_products = SellerProduct::where('pro_status',1)->orderBy('id','desc')->paginate(12);
        return view('frontend.product.shop')
            ->with(compact('all_products'));
    }
    public function product_by_category($id){
        $cat = $id;
        $all_products = SellerProduct::where('pro_cat_id',$id)->where('pro_status',1)->paginate(12);
        return view('frontend.product.shop')->with(compact('all_products','cat'));
    }
    public function product_by_sub_category($id){
        $all_products = SellerProduct::where('pro_cat_id',$id)->where('pro_status',1)->paginate(12);
        return view('frontend.product.shop')->with(compact('all_products'));
    }
    public function product_by_manufacturer($id){
        $all_products = SellerProduct::where('manufacturer_id',$id)->where('pro_status',1)->paginate(12);
        return view('frontend.product.shop')->with(compact('all_products'));
    }
    public function product_by_manufacture(Request $request){
    $menufact_id = $request->menufact_id;
        $all_products = SellerProduct::where('manufacture_id', $menufact_id)->where('pro_status', 1)->paginate(12);
        return view('frontend.product.shop')->with(compact('all_products', 'menufact_id'));
    }
    public function product_by_model($id){
        $all_products = SellerProduct::where('model_id',$id)->where('pro_status',1)->paginate(12);
        return view('frontend.product.shop')->with(compact('all_products'));
    }
    public function search(Request $request){
        $search = $request->search;
        $all_products = DB::table('seller_products')
            // ->where('seller_products.pro_status',1)
            ->where('seller_products.pro_name', 'LIKE', "%$search%")
            ->orWhere('seller_products.pro_description', 'LIKE', "%$search%")
            ->orWhere('seller_products.unit_price', 'LIKE', "%$search%")
            ->paginate(12);
        $search_message = "Search Result Not Found...!";
        return view('frontend.product.shop')
            ->with(compact('all_products','search_message'));
    }
    public function advance_search(Request $request){
        $search = $request->keyword;
        $cat = $request->all_department;
        if($search!=NULL && $cat=='All Departmens' || $cat==5) {
            $all_products = DB::table('seller_products')
                ->where('seller_products.pro_name', 'LIKE', "%$search%")
                ->orWhere('seller_products.pro_description', 'LIKE', "%$search%")
                ->orWhere('seller_products.unit_price', 'LIKE', "%$search%")
//                ->orWhere('seller_products.pro_status', '1')
                ->paginate(12);
            $search_message = "Search Result Not Found...!";
            return view('frontend.product.shop')
                ->with(compact('all_products','search_message'));
        }
        elseif($cat!=NULL && $search!=NULL){
            $count = SellerProduct::where('pro_status',1);
            if($count!=NULL){
                $all_products = DB::table('seller_products')
                    // ->where('seller_products.pro_status',1)
                    ->where('seller_products.supply_type', $cat)
                    ->where('seller_products.pro_name', 'LIKE', "%$search%")
                    ->orWhere('seller_products.pro_description', 'LIKE', "%$search%")
                    ->orWhere('seller_products.unit_price', 'LIKE', "%$search%")
                    ->paginate(12);
                $search_message = "Search Result Not Found...!";
                return view('frontend.product.shop')->with(compact('all_products','search_message'));
            }
        }elseif ($cat!=NULL && $search==NULL){
            $all_products = DB::table('seller_products')
                ->where('pro_status',1)
                ->where('supply_type',$cat)
                ->paginate(12);
            $search_message = "Search Result Not Found...!";
            return view('frontend.product.shop')->with(compact('all_products','search_message'));
        }

    }
    public function product_sorting(Request $request){
        $sort_by = $request->product_sort;
        if($request->product_sort=='new_est'){
            $all_products = SellerProduct::orderBy('id','desc')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','sort_by'));
        }elseif($request->product_sort=='best_rated'){
            
        }elseif($request->product_sort=='low_price'){
            $all_products = SellerProduct::orderBy('unit_price','asc')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','sort_by'));
        }elseif($request->product_sort=='high_price'){
            $all_products = SellerProduct::orderBy('unit_price','desc')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','sort_by'));
        }elseif($request->product_sort=='a_to_z'){
            $all_products = SellerProduct::orderBy('pro_name','asc')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','sort_by'));
        }elseif($request->product_sort=='z_to_a'){
            $all_products = SellerProduct::orderBy('pro_name','desc')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','sort_by'));
        }
    }
    public function product_sorting_item(Request $request){
        $item_by = $request->product_item;
        if($request->product_item=='nine_item'){
            $all_products = SellerProduct::take('9')->where('pro_status',1)->orderBY('id','desc')->get();
            return view('frontend.product.shop')
                ->with(compact('all_products','item_by'));
        }elseif($request->product_item=='twelve_item'){
            $all_products = SellerProduct::take('12')->where('pro_status',1)->orderBY('id','desc')->get();
            return view('frontend.product.shop')
                ->with(compact('all_products','item_by'));
        }elseif($request->product_item=='eighteen_item'){
            $all_products = SellerProduct::take('18')->where('pro_status',1)->orderBY('id','desc')->get();
            return view('frontend.product.shop')
                ->with(compact('all_products','item_by'));
        }elseif($request->product_item=='all_item'){
            $all_products = SellerProduct::orderBy('pro_name','desc')->where('pro_status',1)->get();
            return view('frontend.product.shop')
                ->with(compact('all_products','item_by'));
        }
    }
    public function product_by_cat(Request $request){
        $cat = $request->pro_by_cat;
        $all_products = SellerProduct::where('pro_cat_id',$cat)->where('pro_status',1)->count();
        if($all_products=='0'){
            $all_products = SellerProduct::where('pro_cat_id',$cat)->where('pro_status',1)->paginate(12);
        }elseif($all_products!='0'){
            $all_products = SellerProduct::where('pro_subcat_id',$cat)->where('pro_status',1)->paginate(12);
        }
        return view('frontend.product.shop')->with(compact('all_products','cat'));
    }
    public function filter_by_v_type(Request $request){
        $v_type = $request->v_type;
        if($request->v_type=='o'){
            $all_products = SellerProduct::where('supply_type',1)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','v_type'));
        }elseif($request->v_type=='d'){
            $all_products = SellerProduct::where('supply_type',2)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','v_type'));
        }elseif($request->v_type=='w'){
            $all_products = SellerProduct::where('supply_type',3)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','v_type'));
        }elseif($request->v_type=='r'){
            $all_products = SellerProduct::where('supply_type',4)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','v_type'));
        }
    }
    public function filter_by_price(Request $request){
        $query = SellerProduct::orderBy('unit_price','asc')->where('pro_status',1);

        $price = $request->price_slider;
        $pr =  explode(';',$price);
        $min = $pr['0'];
        $max = $pr['1'];
        if ($min && $max){
            $query = $query->where('unit_price','>=',$min);
            $query = $query->where('unit_price','<=',$max);
        }
        $all_products = $query->paginate(12);
        return view('frontend.product.shop')
            ->with(compact('all_products'));

    }
    public function product_by_condition(Request $request){
        if ($request->condition=='1') {
            $cond = 'new';
            $all_products = SellerProduct::where('conditions',1)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','cond'));
        }elseif ($request->condition=='2') {
            $cond = "refurbished";
            $all_products = SellerProduct::where('conditions',2)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','cond'));
        }elseif ($request->condition=='3') {
            $cond = 'fair';
            $all_products = SellerProduct::where('conditions',3)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products','cond'));
        }
    }
    public function product_by_supply_type(Request $request) {
        if ($request->supply_type=='1') {
            $all_products = SellerProduct::where('supply_type',1)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->supply_type=='2') {
            $all_products = SellerProduct::where('supply_type',2)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->supply_type=='3') {
            $all_products = SellerProduct::where('supply_type',3)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->supply_type=='4') {
            $all_products = SellerProduct::where('supply_type',4)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }
    }
    public function product_by_po_delivery(Request $request) {
        if ($request->payment_type=='1') {
            $all_products = SellerProduct::where('payment_type',1)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->payment_type=='2') {
            $all_products = SellerProduct::where('payment_type',2)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->payment_type=='3') {
            $all_products = SellerProduct::where('payment_type',3)->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }
    }
    public function product_by_pricing(Request $request) {
        if ($request->pricing=='1') {
            $all_products = SellerProduct::where('pro_status',1)->whereNotNull('unit_price')->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->pricing=='15') {
            $all_products = SellerProduct::where('pro_status',1)->whereNotNull('price_15_days')->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }elseif ($request->pricing=='30') {
            $all_products = SellerProduct::whereNotNull('price_30_days')->where('pro_status',1)->paginate(12);
            return view('frontend.product.shop')
                ->with(compact('all_products'));
        }
    }

    public function error_page(){
        return view('frontend.page.error_page');
    }

}
