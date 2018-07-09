<?php

namespace App\Http\Controllers;

use App\SellerProduct;
use Illuminate\Http\Request;
use Cart;
class CompareController extends Controller{
    public function compare(){
        return view('frontend.cart.compare');
    }
    public function add_to_compare($id){
        $pro_by_id = SellerProduct::find($id);
        $data = array();
        $data['id'] = $pro_by_id->id;
        $data['name'] = $pro_by_id->pro_name;
        $data['price'] = $pro_by_id->unit_price;
        $data['qty'] = 1;
        $data['options']['image']= $pro_by_id->pro_image;
        Cart::instance('compare')->add($data);
        return redirect('/compare');
    }
    public function remove_compare_item($id){
        Cart::instance('compare')->remove($id);
        return redirect('/compare');
    }
}
