<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\SellerProduct;
use DB;

class AdvertController extends Controller
{
    public function addHomeAdvert(Request $request)
    {
      //$all_vendor = DB::table('sellers')->pluck("vendorname","id")->where('acStatus', 0)->all();
      $all_vendor = Seller::where('acStatus', 0)->get();
    	return view('backend.seller.advert_featured.today_featured',compact('all_vendor'));
    }

    public function selectPro(Request $request)
    {
    	if($request->ajax()){
    		$selected_pro = DB::table('seller_products')->where('seller_id',$request->seller_id)->pluck("name","id")->all();
    		$data = view('backend.seller.advert_featured.select_pro',compact('selected_pro'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }
}
