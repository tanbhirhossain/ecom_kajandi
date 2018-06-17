<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\SellerProduct;
use App\HomeAdvert;
use DB;

class AdvertController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
      $this->middleware('admin');
  }
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

    public function storeAdvert(Request $request)
    {
      $request->validate([
         'ads_section' => 'required',
         'seller_id' => 'required',
         'product_id' => 'required',
         'ads_image' => 'required'
     ]);
     $file = $request->file( 'ads_image' );
     if($file!=NULL) {
         $name        = time() . '_' . $file->getClientOriginalName();
         $upload_path = 'public/backend/AdvertImg/';
         $file->move( $upload_path, $name );
         $advert_image = $upload_path . $name;
     }else{
         $advert_image = '';
     }
      $sv = new HomeAdvert();
      $sv->admin_id = $request->admin_id;
      $sv->ads_section = $request->ads_section;
      $sv->seller_id = $request->seller_id;
      $sv->product_id = $request->product_id;
      $sv->ads_title = $request->ads_title;
      $sv->ads_description = $request->ads_description;
      $sv->shop_now_link = $request->shop_now_link;
      $sv->banner_color = $request->banner_color;
      $sv->price = $request->price;
      $sv->ads_image = $advert_image;
      $sv->save();
      return back()->with('message_success', 'Home Advert Added Succesfully');
    }

    public function adrvertList()
    {
      $all_advert = HomeAdvert::
                    join('sellers','sellers.id','=','seller_id')
                  ->join('seller_products','seller_products.id','product_id')
                  ->select('home_adverts.id as hid','home_adverts.ads_image','home_adverts.price','sellers.vendorname','seller_products.name','seller_products.image')
                  ->get();
      return view('backend.seller.advert_featured.advert_list',compact('all_advert'));
    }

    public function editAdvert($id)
    {
      $all_vendor = Seller::where('id', $id)->get();
      $editAds = HomeAdvert::find($id);

      return view('backend.seller.advert_featured.edit_advert',compact('editAds','all_vendor'));
    }
}
