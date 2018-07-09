<?php

namespace App\Http\Controllers;

use App\Category;
use App\Seller;
use App\SellerProduct;
use Illuminate\Http\Request;

class FSellerProductController extends Controller{
  public function seller_profile($id){
     $seller_by_id =  Seller::find($id);
    return view('frontend.seller.seller_product',compact('seller_by_id','all_product'));
  }
}
