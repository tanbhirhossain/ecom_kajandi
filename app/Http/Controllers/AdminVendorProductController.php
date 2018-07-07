<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerProduct;
use DB;

class AdminVendorProductController extends Controller
{
    public function pendingVendorPro()
    {
      $pending_pro = SellerProduct::where('pro_status', 0)
                    ->join('sellers', 'sellers.user_id', '=', 'seller_id')
                    ->select('seller_products.*', 'sellers.vendorname', 'sellers.id as sid')
                    ->get();


      return view('backend.seller.products.pending_list',compact('pending_pro'));
    }

    public function approveVendorPro($id)
    {
      $avp = DB::table('seller_products')
              ->where('id', $id)
              ->update([
                'pro_status' => 1,
              ]);
      return back()->with('message_success', 'Vendor Product Approved Succesfully');
    }

    public function approvedSellerPro()
    {
      $approved_pro = SellerProduct::where('pro_status', 1)
                    ->join('sellers', 'sellers.user_id', '=', 'seller_id')
                    ->select('seller_products.*', 'sellers.vendorname', 'sellers.id as sid')
                    ->get();
      return view('backend.seller.products.approved_list',compact('approved_pro'));
    }

    public function blockVendorPro($id)
    {
      $avp = DB::table('seller_products')
              ->where('id', $id)
              ->update([
                'pro_status' => 0,
              ]);
      return back()->with('message_success', 'Vendor Product Blocked Succesfully');
    }


}
