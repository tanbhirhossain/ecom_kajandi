@extends('seller.seller_master')
@section('page_title','Add Vendor Product')
@section('seller_content')
<style media="screen">
  .invalid-feedback{
    color: red;
  }
</style>

<?php
  $menufacturer = App\Manufacter::All();
  $category = App\Category::All();
  $subcategory = App\Subcategory::All();
  $unit = App\Unit::All();

 ?>

<section id="content_wrapper">

   <!-- -------------- Topbar Menu Wrapper -------------- -->
   <div id="topbar-dropmenu-wrapper">
       <div class="topbar-menu row">
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-danger">
                   <span class="fa fa-music"></span>
                   <span class="service-title">Audio</span>
               </a>
           </div>
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-success">
                   <span class="fa fa-picture-o"></span>
                   <span class="service-title">Images</span>
               </a>
           </div>
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-primary">
                   <span class="fa fa-video-camera"></span>
                   <span class="service-title">Videos</span>
               </a>
           </div>
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-alert">
                   <span class="fa fa-envelope"></span>
                   <span class="service-title">Messages</span>
               </a>
           </div>
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-system">
                   <span class="fa fa-cog"></span>
                   <span class="service-title">Settings</span>
               </a>
           </div>
           <div class="col-xs-4 col-sm-2">
               <a href="#" class="service-box bg-dark">
                   <span class="fa fa-user"></span>
                   <span class="service-title">Users</span>
               </a>
           </div>
       </div>
   </div>
   <!-- -------------- /Topbar Menu Wrapper -------------- -->

   <!-- -------------- Topbar -------------- -->
   <header id="topbar" class="alt">
       <div class="topbar-left">
           <ol class="breadcrumb">
               <li class="breadcrumb-icon">
                   <a href="dashboard1.html">
                       <span class="fa fa-home"></span>
                   </a>
               </li>
               <li class="breadcrumb-active">
                   <a href="dashboard1.html">Dashboard</a>
               </li>
               <li class="breadcrumb-link">
                   <a href="index.html">Home</a>
               </li>
               <li class="breadcrumb-current-item">Products</li>
           </ol>
       </div>
   </header>
   <!-- -------------- /Topbar -------------- -->

   <!-- -------------- Content -------------- -->
   <section id="content" class="table-layout animated fadeIn">

       <!-- -------------- Column Left -------------- -->
    <!--   <aside class="chute chute-left chute290" data-chute-height="match">

           <!-- -------------- Menu Block -------------- -->
           <!--<div class="allcp-form theme-primary">

               <h5 class="pln"> Filter Products</h5>

               <h6 class="mb15"> by SKU</h6>

               <div class="section mb20">
                   <label for="order-id" class="field prepend-icon">
                       <input type="text" name="order-id" id="order-id" class="gui-input"
                              placeholder="Product SKU #">
                       <label for="order-id" class="field-icon">
                           <i class="fa fa-tag"></i>
                       </label>
                   </label>
               </div>

               <h6 class="mb15"> by price</h6>

               <div class="section row mb20">
                   <div class="col-md-6 ph10">
                       <label for="price1" class="field prepend-icon mb5">
                           <input type="text" name="price1" id="price1" class="gui-input" placeholder="0">
                           <label for="price1" class="field-icon">
                               <i class="fa fa-usd"></i>
                           </label>
                       </label>
                   </div>
                   <div class="col-md-6 ph10">
                       <label for="price2" class="field prepend-icon">
                           <input type="text" name="price2" id="price2" class="gui-input" placeholder="1000">
                           <label for="price2" class="field-icon">
                               <i class="fa fa-usd"></i>
                           </label>
                       </label>
                   </div>
               </div>

               <h6 class="mb15"> by date</h6>

               <div class="section row mb20">
                   <div class="col-md-6 ph10">
                       <label for="datepicker1" class="field prepend-icon mb5">
                           <input type="text" id="datepicker1" name="datepicker1"
                                  class="gui-input fs13"
                                  placeholder="From">
                           <label class="field-icon">
                               <i class="fa fa-calendar"></i>
                           </label>
                       </label>
                   </div>
                   <div class="col-md-6 ph10">
                       <label for="datepicker2" class="field prepend-icon">
                           <input type="text" id="datepicker2" name="datepicker2"
                                  class="gui-input fs13"
                                  placeholder="To">
                           <label class="field-icon">
                               <i class="fa fa-calendar"></i>
                           </label>
                       </label>
                   </div>
               </div>

               <h6 class="mb15"> by category</h6>

               <div class="section mb20">
                   <label class="field select">
                       <select id="filter-categories" name="filter-categories">
                           <option value="0" selected="selected">Filter by Categories</option>
                           <option value="1">iPhone</option>
                           <option value="2">iPad</option>
                           <option value="3">iMac</option>
                       </select>
                       <i class="arrow double"></i>
                   </label>
               </div>

               <hr class="short">

               <div class="section">
                   <button class="btn btn-primary pull-right ph30" type="button">Search</button>
               </div>

           </div>

       </aside>
       <!-- -------------- /Column Left -------------- -->

       <!-- -------------- Column Center -------------- -->
       <div class="chute chute-center pt30">
         <small>
             <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
             <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
         </small>
           <!-- -------------- New Product -------------- -->
           <form class="" action="{{route('postSellerProduct')}}" method="post" enctype="multipart/form-data" >
             @csrf
             <input type="hidden" name="seller_id" value="{{Auth::id()}}">
           <div class="panel mb25 mt5">
               <div class="panel-heading">
                   <span class="panel-title hidden-xs"> Add New Product</span>
                   <ul class="nav panel-tabs-border panel-tabs">
                       <li class="active">
                           <a href="#tab1_1" data-toggle="tab">General</a>
                       </li>
                       <li>
                           <a href="#tab1_2" data-toggle="tab">Additional Images</a>
                       </li>
                       <li>
                           <a href="#tab1_3" data-toggle="tab">Prices</a>
                       </li>
                       <li>
                           <a href="#tab1_4" data-toggle="tab">Packaging and Delivery</a>
                       </li>
                   </ul>
               </div>
               <div class="panel-body pn">
                   <div class="tab-content pn br-n allcp-form theme-primary">
                       <div id="tab1_1" class="tab-pane active">

                           <div class="section row mbn">
                               <div class="col-md-4 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img id="image-preview" src="{{asset('public/seller/assets')}}/img\277x140.svg">
                                      </div>
                                       <div class="row">

                                           <div class="col-xs-5 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input type="file" name="pro_image">
                                               </span>
                                               @if ($errors->has('pro_image'))
                                                   <span class="invalid-feedback">
                                                       <strong>{{ $errors->first('pro_image') }}</strong>
                                                   </span>
                                               @endif
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-8 ph10">
                                   <div class="section mb10">
                                       <label for="pro_name" class="field prepend-icon">
                                           <input type="text" name="pro_name" id="pro_name"
                                                  class="event-name gui-input br-light light"
                                                  placeholder="Product Name">
                                           <label for="pro_name" class="field-icon">
                                               <i class="fa fa-tag"></i>
                                           </label>
                                       </label>
                                       @if ($errors->has('pro_name'))
                                           <span class="invalid-feedback">
                                               <strong>{{ $errors->first('pro_name') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                                   <!--<div class="section mb10">
                                       <label for="pro_generic_name" class="field prepend-icon">
                                           <input type="text" name="pro_generic_name" id="pro_generic_name"
                                                  class="event-name gui-input br-light light"
                                                  placeholder="Product Generic Name">
                                           <label for="pro_generic_name" class="field-icon">
                                               <i class="fa fa-tag"></i>
                                           </label>
                                       </label>
                                       @if ($errors->has('pro_generic_name'))
                                           <span class="invalid-feedback">
                                               <strong>{{ $errors->first('pro_generic_name') }}</strong>
                                           </span>
                                       @endif
                                   </div>-->
                                   <div class="section mb10">
                                       <label class="field prepend-icon">
                                           <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment"
                               name="pro_description" placeholder="Product Description"></textarea>
                                           <label for="pro_description" class="field-icon">
                                               <i class="fa fa-file"></i>
                                           </label>
                                       </label>
                                       @if ($errors->has('pro_description'))
                                           <span class="invalid-feedback">
                                               <strong>{{ $errors->first('pro_description') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                                   <div class="section mb10">
                                       <label for="name21" class="field prepend-icon">
                                           <input type="text" name="pro_keyword" id="pro_keyword"
                                                  class="event-name gui-input br-light light"
                                                  placeholder="Product Keyword">
                                           <label for="pro_name" class="field-icon">
                                               <i class="fa fa-tag"></i>
                                           </label>
                                       </label>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="section row">

                               <div class="col-md-4 ph10">
                                   <label for="part_number" class="field prepend-icon">
                                       <input type="text" name="part_number" id="part_number"
                                              class="gui-input"
                                              placeholder="Part Number">
                                       <label for="part_number" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="manufacture_id" class="field select">
                                       <select id="manufacture_id" name="manufacture_id">
                                           <option value="" selected="selected">Manufacterer...</option>
                                           @foreach($menufacturer as $m)
                                           <option value="{{$m->id}}" >{{$m->name}}</option>
                                           @endforeach
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                                   @if ($errors->has('manufacture_id'))
                                       <span class="invalid-feedback">
                                           <strong>{{ $errors->first('manufacture_id') }}</strong>
                                       </span>
                                   @endif
                               </div>

                               <div class="col-md-4 ph10">
                                   <label for="model_number" class="field prepend-icon">
                                       <input type="text" name="model_number" id="model_number"
                                              class="gui-input"
                                              placeholder="Model Number">
                                       <label for="model_number" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <!-- -------------- /section -------------- -->



                           </div>
                           <div class="section row">
                               <div class="col-md-4 ph10">
                                   <label for="supply_type" class="field select">
                                       <select id="supply_type" name="supply_type">
                                           <option value="" selected="selected">Supply Type...</option>
                                           <option value="1">OEM / Manufacturer</option>
                                           <option value="2">Distributor</option>
                                           <option value="3">Wholesaler</option>
                                           <option value="3">Retailer</option>
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="pro_cat_id" class="field select">
                                       <select id="pro_cat_id" name="pro_cat_id">
                                         <option value="" selected="selected">Category...</option>
                                         @foreach($category as $m)
                                         <option value="{{$m->id}}" >{{$m->cat_name}}</option>
                                         @endforeach
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                                   @if ($errors->has('pro_cat_id'))
                                       <span class="invalid-feedback">
                                           <strong>{{ $errors->first('pro_cat_id') }}</strong>
                                       </span>
                                   @endif
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="pro_subcat_id" class="field select">
                                       <select id="pro_subcat_id" name="pro_subcat_id">
                                         <option value="">Sub Category...</option>
                                         @foreach($subcategory as $m)
                                         <option value="{{$m->id}}" >{{$m->sub_cat_name}}</option>
                                         @endforeach
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                                   @if ($errors->has('pro_subcat_id'))
                                       <span class="invalid-feedback">
                                           <strong>{{ $errors->first('pro_subcat_id') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="section row">
                             <div class="col-md-4 ph10">
                                 <label for="supply_type" class="field select">
                                     <select id="condition" name="condition">
                                         <option value="" selected="selected">Condition...</option>
                                         <option value="1">New</option>
                                         <option value="2">Refurbished</option>
                                         <option value="3">Fairly Used</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="supply_type" class="field select">
                                     <select id="pro_warranty" name="pro_warranty">
                                         <option value="" selected="selected">Warranty...</option>
                                         <option value="1">Less Then 0</option>
                                         <option value="2">One Year</option>
                                         <option value="3">Above One Year</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="supply_type" class="field select">
                                     <select id="pro_gurrantee" name="pro_gurrantee">
                                         <option value="" selected="selected">Gurrantee...</option>
                                         <option value="1">Less Then 0</option>
                                         <option value="2">One Year</option>
                                         <option value="3">Above One Year</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                           </div>
                       </div>

                       <div id="tab1_2" class="tab-pane">

                           <div class="section row">


                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('public/seller/assets')}}/img\277x140.svg">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input type="file" name="a_img_1">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('public/seller/assets')}}/img\277x140.svg">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input type="file" name="a_img_2">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('public/seller/assets')}}/img\277x140.svg">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input type="file" name="a_img_3">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>


                           <!-- -------------- /Section -------------- -->



                             <div class="col-md-3 ph10">
                                 <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                     <div class="fileupload-preview thumbnail mb20">
                                         <img src="{{asset('public/seller/assets')}}/img\277x140.svg">
                                    </div>
                                     <div class="row">
                                         <div class="col-xs-12 ph10">
                                             <span class="button btn-primary btn-file btn-block">
                                               <span class="fileupload-new">Select</span>
                                               <span class="fileupload-exists">Change</span>
                                               <input type="file" name="a_img_4">
                                             </span>
                                         </div>

                                     </div>
                                 </div>
                             </div>

                           </div>

                           <div class="row">
                             <div class="col-md-4 ph10">
                                <label style="text-align:center;margin-top:19%" for="pro_color"><strong style="text-align:center">Select Color</strong></label>
                                 <label style="margin-top:10px;" for="pro_color" class="field prepend-icon">
                                     <input type="color" name="pro_color" id="pro_color"
                                            class="gui-input"
                                            placeholder="Color">
                                     <label for="pro_color" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-8 ph10">
                               <div class="section mb10">
                                   <label class="field prepend-icon">
                                       <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment"
                           name="speacial_feature" placeholder="Special Features"></textarea>
                                       <label for="speacial_feature" class="field-icon">
                                           <i class="fa fa-file"></i>
                                       </label>
                                   </label>
                               </div>
                             </div>
                           </div>




                       </div>
                       <div id="tab1_3" class="tab-pane">
                           <div class="section row">
                               <div class="col-md-4 ph10">
                                   <label for="small_order_accpeted" class="field select">
                                       <select id="small_order_accpeted" name="small_order_accpeted">
                                           <option value="" selected="selected">Small Order Accepted...</option>
                                           <option value="1">Yes</option>
                                           <option value="0">No</option>

                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="minumum_order_qty" class="field prepend-icon">
                                       <input type="number" name="minumum_order_qty" id="minumum_order_qty"
                                              class="gui-input"
                                              placeholder="Minimum Quantity">
                                       <label for="minumum_order_qty" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                 <label for="payment_type" class="field select">
                                     <select id="unit" name="unit">
                                         <option value="" selected="selected">Select Unit ...</option>
                                         @foreach($unit as $uni)
                                         <option value="{{$uni->id}}">{{$uni->name}}</option>
                                         @endforeach


                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                               </div>
                           </div>
                           <div class="section row">
                             <div class="col-md-6 ph10">
                                 <label for="unit_price" class="field prepend-icon">
                                     <input type="text" name="unit_price" id="unit_price"
                                            class="gui-input"
                                            placeholder="Unit Price...">
                                     <label for="unit_price" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                                 @if ($errors->has('unit_price'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('unit_price') }}</strong>
                                     </span>
                                 @endif
                             </div>
                             <div class="col-md-6 ph10">
                                 <label for="price_for_optional_units" class="field prepend-icon">
                                     <input type="text" name="price_for_optional_units" id="price_for_optional_units"
                                            class="gui-input"
                                            placeholder="Price for optional units...">
                                     <label for="price_for_optional_units" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                           </div>

                           <div class="section row">
                             <div class="col-md-6 ph10">
                                 <label for="price_15_days" class="field prepend-icon">
                                     <input type="text" name="15_days_price" id="15_days_price"
                                            class="gui-input"
                                            placeholder="Price for 15 days...">
                                     <label for="15_days_price" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-6 ph10">
                                 <label for="30_days_price" class="field prepend-icon">
                                     <input type="text" name="30_days_price" id="30_days_price"
                                            class="gui-input"
                                            placeholder="Price for 30 days...">
                                     <label for="price_30_days" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                           </div>
                           <div class="section row">
                             <div class="col-md-4 ph10">
                                 <label for="sample_fee" class="field prepend-icon">
                                     <input type="text" name="sample_fee" id="sample_fee"
                                            class="gui-input"
                                            placeholder="Sample Fee...">
                                     <label for="sample_fee" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="currency_in_naira" class="field prepend-icon">
                                     <input type="text" name="currency_in_naira" id="currency_in_naira"
                                            class="gui-input"
                                            placeholder="Currency in Naira...">
                                     <label for="currency_in_naira" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="currency_in_naira" class="field prepend-icon">
                                     <input type="text" name="stock_qty" id="stock_qty"
                                            class="gui-input"
                                            placeholder="Stock Quantity...">
                                     <label for="stock_qty" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>

                                 </label>
                                 @if ($errors->has('stock_qty'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('stock_qty') }}</strong>
                                     </span>
                                 @endif
                             </div>
                           </div>
                           <div class="section row">
                               <div class="col-md-12 ph10">
                                 <div class="section mb10">
                                     <label class="field prepend-icon">
                                         <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment"
                             name="credit_payment_details" placeholder="Credit Payment Details"></textarea>
                                         <label for="credit_payment_details" class="field-icon">
                                             <i class="fa fa-file"></i>
                                         </label>
                                     </label>
                                 </div>
                               </div>
                           </div>
                           <div class="section row">
                               <div class="col-md-12 ph10">
                                 <div class="section mb10">
                                     <label class="field prepend-icon">
                                         <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment"
                             name="optional_description" placeholder="Optional Description"></textarea>
                                         <label for="optional_description" class="field-icon">
                                             <i class="fa fa-file"></i>
                                         </label>
                                     </label>
                                 </div>
                               </div>
                           </div>
                           <!-- -------------- /Section -------------- -->

                           <!--<div class="section br10">
                               <input id="tagsinput" type="text"
                                      value="Apple, Device, Gadget, iPhone, iPad, iMac">
                           </div>-->
                           <!-- -------------- /Section -------------- -->
                       </div>
                       <div id="tab1_4" class="tab-pane">
                           <div class="section row">
                             <div class="col-md-4 ph10">
                                 <label for="length" class="field prepend-icon">
                                     <input type="number" name="length" id="length"
                                            class="gui-input"
                                            placeholder="Length">
                                     <label for="length" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                               <!-- -------------- /section -------------- -->

                               <div class="col-md-4 ph10">
                                   <label for="width" class="field prepend-icon">
                                       <input type="number" name="width" id="width"
                                              class="gui-input"
                                              placeholder="Width">
                                       <label for="width" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <!-- -------------- /section -------------- -->

                               <div class="col-md-4 ph10">
                                   <label for="height" class="field prepend-icon">
                                       <input type="number" name="height" id="height"
                                              class="gui-input"
                                              placeholder="Height">
                                       <label for="height" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <!-- -------------- /section -------------- -->

                           </div>
                           <div class="section row">
                               <div class="col-md-4 ph10">
                                 <label for="weight_per_pack" class="field prepend-icon">
                                     <input type="number" name="weight_per_pack" id="weight_per_pack"
                                            class="gui-input"
                                            placeholder="Weight Per pack">
                                     <label for="weight_per_pack" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                               <div class="col-md-4 ph10">
                                   <label for="export_carton_width" class="field prepend-icon">
                                       <input type="number" name="export_carton_width" id="export_carton_width"
                                              class="gui-input"
                                              placeholder="Export carton width">
                                       <label for="export_carton_width" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="export_carton_width" class="field prepend-icon">
                                       <input type="number" name="export_carton_length" id="export_carton_length"
                                              class="gui-input"
                                              placeholder="Export carton length">
                                       <label for="export_carton_length" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>

                           </div>
                           <div class="section row">

                             <div class="col-md-4 ph10">
                                 <label for="export_carton_weight" class="field prepend-icon">
                                     <input type="number" name="export_carton_weight" id="export_carton_weight"
                                            class="gui-input"
                                            placeholder="Export carton weight">
                                     <label for="export_carton_weight" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="payment_type" class="field select">
                                     <select id="payment_type" name="payment_type">
                                         <option value="" selected="selected">Select Payment Type...</option>
                                         <option value="1">Cash in advance</option>
                                         <option value="2">Cash in delivery</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                                 @if ($errors->has('payment_type'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('payment_type') }}</strong>
                                     </span>
                                 @endif
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="export_carton_weight" class="field prepend-icon">
                                     <input type="text" name="strength_of_meterial" id="strength_of_meterial"
                                            class="gui-input"
                                            placeholder="Strength of meterial">
                                     <label for="strength_of_meterial" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                           </div>
                           <div class="section row">
                             <div class="col-md-4 ph10">
                                 <label for="small_order_accpeted" class="field select">
                                     <select id="duration_delivery_state" name="duration_delivery_state">
                                         <option value="" selected="selected">Duration Delivery State...</option>
                                         <option value="1">24 Hours</option>
                                         <option value="2">48 Hours</option>
                                         <option value="3">3 Days</option>
                                         <option value="4">5 Days</option>
                                         <option value="5">7 Days</option>
                                         <option value="6">9 Days</option>
                                         <option value="7">20 Days</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="duration_within_state" class="field select">
                                     <select id="duration_delivery_state" name="duration_within_state">
                                         <option value="" selected="selected">Duration within State...</option>
                                         <option value="1">24 Hours</option>
                                         <option value="2">48 Hours</option>
                                         <option value="3">3 Days</option>
                                         <option value="4">5 Days</option>
                                         <option value="5">7 Days</option>
                                         <option value="6">9 Days</option>
                                         <option value="7">20 Days</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                             <div class="col-md-4 ph10">
                                 <label for="duration_out_state" class="field select">
                                     <select id="duration_out_state" name="duration_out_state">
                                         <option value="" selected="selected">Duration Out State...</option>
                                         <option value="1">24 Hours</option>
                                         <option value="2">48 Hours</option>
                                         <option value="3">3 Days</option>
                                         <option value="4">5 Days</option>
                                         <option value="5">7 Days</option>
                                         <option value="6">9 Days</option>
                                         <option value="7">20 Days</option>

                                     </select>
                                     <i class="arrow double"></i>
                                 </label>
                             </div>
                           </div>
                           <div class="section row">
                               <div class="col-md-4 ph10">
                                   <label for="supply_type" class="field select">
                                       <select id="supply_type" name="supply_type">
                                           <option value="" selected="selected">Delivery within state...</option>
                                           <option value="1">Yes</option>
                                           <option value="2">No</option>

                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="delivery_rate_w_range" class="field prepend-icon">
                                       <input type="text" name="delivery_rate_w_range" id="delivery_rate_w_range"
                                              class="gui-input"
                                              placeholder="Delivery rate within range...">
                                       <label for="delivery_rate_w_range" class="field-icon">
                                           <i class="fa fa-usd"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="delivery_rate_o_range" class="field prepend-icon">
                                       <input type="text" name="delivery_rate_o_range" id="delivery_rate_o_range"
                                              class="gui-input"
                                              placeholder="Delivery rate out of range...">
                                       <label for="delivery_rate_o_range" class="field-icon">
                                           <i class="fa fa-usd"></i>
                                       </label>
                                   </label>
                               </div>
                             </div>
                             <div class="section row">

                             </div>
                           <div class="section row">
                             <div class="section mb10">
                                 <label class="field prepend-icon">
                                     <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="seller_remark"
                         name="seller_remark" placeholder="Seller Remark"></textarea>
                                     <label for="pro_description" class="field-icon">
                                         <i class="fa fa-file"></i>
                                     </label>
                                 </label>

                             </div>
                           </div>
                           <hr class="short alt">

                           <div class="section mbn text-right">
                               <p class="text-right">
                                   <button class="btn btn-primary" type="submit">Add product</button>
                               </p>
                           </div>
                           <!-- -------------- /section -------------- -->
                       </div>

                   </div>
               </div>
           </div>
            </form>



       </div>


   </section>

</section>
@endsection
