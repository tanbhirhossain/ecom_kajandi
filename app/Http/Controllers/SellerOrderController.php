<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use App\Customer;
use Auth;

class SellerOrderController extends Controller
{
    public function VendorOrderList()
    {
      $ordered = Order::
              join('order_details', 'order_details.id', '=', 'orders.id')
            ->join('users','users.id', '=', 'cus_id')
            ->join('seller_products', 'seller_products.id', '=', 'order_details.product_id')
            ->join('sellers', 'sellers.id', '=', 'seller_products.seller_id')
            ->select(
                      'orders.*',
                      'users.name as cust_name',
                      'seller_products.pro_name as pros_name',
                      'seller_products.pro_name',
                      'seller_products.id as sp_id',
                      'seller_products.pro_image',
                      'sellers.id as s_id',
                      'order_details.product_qty',
                      'order_details.id as od_id'

                    )
            ->where('sellers.id', Auth::id())
            ->get();
      return view('seller.order.order_list',compact('ordered'));
    }

    public function viewOrder($id){
        $order = Order::where('id',$id)->first();
        $shipping_id = $order->ship_id;
        $billing_id = $order->cus_id;
        $order_details = OrderDetail::where('order_id',$id)->get();
        $shipping = Shipping::where('id',$shipping_id)->first();
        $billing = Customer::where('cus_id',$billing_id)->first();
        return view('seller.order.view_order',compact('order',
            'order_details','shipping','billing'));
    }
}
