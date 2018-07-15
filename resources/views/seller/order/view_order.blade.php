@extends('seller.seller_master')
@section('page_title','Order List')
@section('seller_content')
<section id="content_wrapper">
<section id="content" class="table-layout animated fadeIn">

       <div class="chute chute-center">
       <div class="container invoice-wrap">
           <div class="row" id="tables1_all">
               <div class="col-md-12 text-center">
                   <button class="btn btn-lg btn-primary print_no" onclick="print_this('tables1')" type="button">Print Table!</button>
               </div>
                   <div class="row">
                       <div class="col-md-10" id="tables1">
               <div class="invoice-inner">
                           <div class="table" id="table1">
                               <div class="row">
                                   <div class="col-xs-12">
                                       <div class="invoice-title">
                                           <h2>Kajandi Ecommerce</h2>
                                           <h4>Invoice #{{$order->id}}</h4>
                                           <h6>{{$order->created_at}}</h6>
                                           <h3 class="pull-right">Order # 12345</h3>
                                       </div>
                                       <hr>
                                       <div class="row">
                                           <div class="col-xs-6">
                                               <address>
                                                   <strong>Billed To:</strong>
                                                   {{$billing->bil_first_name.' '.$billing->bil_last_name}}<br>
                                                   {{$billing->bil_address_1}}<br>
                                                  {{$billing->bil_address_2}}<br>
                                                  {{$billing->bil_phone}}<br>
                                                  <strong>{{$billing->bil_city}}</strong>,<i>{{$billing->bil_state}}</i><br/>
                                                  <u>{{$billing->bil_zipcode}}</u>
                                               </address>

                                           </div>
                                           <div class="col-xs-6 text-right">
                                               <address>
                                                   <strong>Shipped To:</strong>
                                                   {{$shipping->ship_first_name.' '.$shipping->ship_last_name}}<br>
                                                   {{$shipping->ship_address_1}}<br/>
                                                   {{$shipping->ship_address_2}}<br/>
                                                   {{$shipping->ship_phone}}<br/>
                                                   <strong>{{$shipping->ship_city}}</strong>,<i>{{$shipping->ship_state}}</i><br/>
                                                   <u>{{$shipping->ship_zip}}</u>
                                               </address>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-xs-6">
                                               <!--<address>
                                                   <strong>Payment Method:</strong>
                                                   Visa ending **** 4242<br>
                                                   jsmith@email.com
                                               </address>-->
                                           </div>
                                           <div class="col-xs-6 text-right">
                                               <address>
                                                   <strong>Order Date:</strong>
                                                   March 7, 2014<br>
                                                   <br>
                                               </address>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-10">
                                       <div class="panel panel-default">
                                           <div class="panel-heading">
                                               <h3 class="panel-title"><strong>Order summary</strong></h3>
                                           </div>
                                           <div class="panel-body">
                                               <div class="table-responsive">
                                                   <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                                       <thead>
                                                           <tr class="bg-light">
                                                               <th><strong>Item</strong></th>
                                                               <th class="text-center"><strong>Price</strong></th>
                                                               <th class="text-center"><strong>Quantity</strong></th>
                                                               <th class="text-right"><strong>Totals</strong></th>
                                                           </tr>
                                                       </thead>
                                                       <tbody>
                                                           <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                         @foreach($order_details as $single_product)
                                                           <tr>
                                                               <td>{{$single_product->product_name}}</td>
                                                               <td class="text-center">${{$price = $single_product->product_price}}</td>
                                                               <td class="text-center">{{$qty = $single_product->product_qty}}</td>
                                                               <td class="text-right">${{$qty*$price}}</td>
                                                           </tr>
                                                          @endforeach

                                                           <tr>
                                                               <td class="thick-line"></td>
                                                               <td class="thick-line"></td>
                                                               <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                               <td class="thick-line text-right">${{$qty*$price}}</td>
                                                           </tr>
                                                           <tr>
                                                               <td class="no-line"></td>
                                                               <td class="no-line"></td>
                                                               <td class="no-line text-center"><strong>Shipping</strong></td>
                                                               <td class="no-line text-right">$24</td>
                                                           </tr>
                                                           <tr>
                                                               <td class="no-line"></td>
                                                               <td class="no-line"></td>
                                                               <td class="no-line text-center"><strong>Total</strong></td>
                                                               <td class="no-line text-right">${{$qty*$price+24}}</td>
                                                           </tr>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>
           </div>
       </div>








       </div>

</section>
   </section>




@endsection
