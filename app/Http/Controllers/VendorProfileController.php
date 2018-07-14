<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\SellerProduct;
use Auth;

class VendorProfileController extends Controller
{
    public function showVendorProfile($id){
      $vendorProduct = SellerProduct::where('seller_id', $id)->get();
      $vendorProfile = Seller::where('user_id', $id)->first();
      return view('frontend.seller.profile.show_profile',compact('vendorProfile','vendorProduct'));
    }
}
