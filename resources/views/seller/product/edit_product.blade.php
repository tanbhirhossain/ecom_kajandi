@extends('seller.seller_master')
@section('page_title','Edit Vendor Product')
@section('seller_content')
<style media="screen">
  .invalid-feedback{
    color: red;
  }
</style>
<?php
  $menufacturer = App\Manufacter::All();
  $category = App\Category::All();
  $subcategory = App\Category::All();

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
      <!-- <aside class="chute chute-left chute290" data-chute-height="match">

           <!-- -------------- Menu Block -------------- -->
        <!--   <div class="allcp-form theme-primary">

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

           </div>-->

       </aside>
       <!-- -------------- /Column Left -------------- -->

       <!-- -------------- Column Center -------------- -->
       <div class="chute chute-center pt30">
         <small>
             <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
             <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
         </small>
           <!-- -------------- New Product -------------- -->
           <form class="" action="{{route('updateSellerPro', $editpro->id)}}" method="post" enctype="multipart/form-data" >
             @csrf
             <input type="hidden" name="seller_id" value="{{Auth::id()}}">
           <div class="panel mb25 mt5">
               <div class="panel-heading">
                   <span class="panel-title hidden-xs"> Edit Product</span>
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
                                           <img src="{{asset($editpro->pro_image)}}">
                                      </div>
                                       <div class="row">

                                           <div class="col-xs-5 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input  type="file" name="pro_image">
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
                                           <input type="text" value="{{$editpro->pro_name}}" name="pro_name" id="pro_name"
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
                                   <div class="section mb10">
                                       <label for="pro_generic_name" class="field prepend-icon">
                                           <input type="text" value="{{$editpro->pro_generic_name}}" name="pro_generic_name" id="pro_generic_name"
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
                                   </div>
                                   <div class="section mb10">
                                       <label class="field prepend-icon">
                                           <textarea style="height: 160px;" value="{{$editpro->pro_description}}" class="gui-textarea br-light bg-light" id="comment"
                               name="pro_description" placeholder="Product Description">{{$editpro->pro_description}}</textarea>
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
                                           <input type="text"  name="pro_keyword" value="{{$editpro->pro_keyword}}" id="pro_keyword"
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
                                       <input type="text" name="part_number" value="{{$editpro->part_number}}" id="part_number"
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

                                         <option value="@if($menuFact != null){{$menuFact->id}}@endif" selected="selected">@if($menuFact != null){{$menuFact->name}}@endif</option>
                                         @foreach($menufacturer as $m)
                                         <option value="{{$m->id}}" >{{$m->name}}</option>
                                         @endforeach
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>

                               <div class="col-md-4 ph10">
                                   <label for="model_number" class="field prepend-icon">
                                       <input type="text" name="model_number" value="{{$editpro->model_number}}" id="model_number"
                                              class="gui-input"
                                              placeholder="Model Number">
                                       <label for="model_number" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <!-- -------------- /section -------------- -->



                           </div>
                           <!-- -------------- /Section -------------- -->

                           <div class="section row">
                               <div class="col-md-4 ph10">
                                   <label for="supply_type" class="field select">
                                       <select id="supply_type" name="supply_type">
                                           <option value="{{$editpro->supply_type}}" selected="selected">
                                             <?php

                                                if($editpro->supply_type == 1) {
                                                  echo "OEM / Manufacturer";
                                                }elseif ($editpro->supply_type == 2) {
                                                  echo "Distributor";
                                                }elseif ($editpro->supply_type == 3) {
                                                  echo "Wholesaler";
                                                }elseif($editpro->supply_type == 4) {
                                                  echo "Retailer";
                                                }elseif ($editpro->supply_type == null) {
                                                  echo "Select Supply type";
                                                }else {
                                                  echo "None";
                                                }
                                              ?>
                                           </option>
                                           <option value="1">OEM / Manufacturer</option>
                                           <option value="2">Distributor</option>
                                           <option value="3">Wholesaler</option>
                                           <option value="4">Retailer</option>
                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="pro_cat_id" class="field select">
                                       <select id="pro_cat_id" name="pro_cat_id">
                                         <option value="{{$procat->id}}" selected="selected">{{$procat->cat_name}}</option>
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
                                         <option value="{{$prosubcat->id}}" selected="selected">{{$prosubcat->sub_cat_name}}</option>
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
                           <!-- -------------- /Section -------------- -->


                       </div>
                       <div id="tab1_2" class="tab-pane">

                           <div class="section row">


                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('/')}}{{$editpro->a_img_1}}">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input value="{{$editpro->a_img_1}}" type="file" name="a_img_1">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('/')}}{{$editpro->a_img_2}}">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input value="{{$editpro->a_img_2}}" type="file" name="a_img_2">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-3 ph10">
                                   <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                       <div class="fileupload-preview thumbnail mb20">
                                           <img src="{{asset('/')}}{{$editpro->a_img_3}}">
                                      </div>
                                       <div class="row">
                                           <div class="col-xs-12 ph10">
                                               <span class="button btn-primary btn-file btn-block">
                                                 <span class="fileupload-new">Select</span>
                                                 <span class="fileupload-exists">Change</span>
                                                 <input value="{{$editpro->a_img_3}}" type="file" name="a_img_3">
                                               </span>
                                           </div>

                                       </div>
                                   </div>
                               </div>



                             <div class="col-md-3 ph10">
                                 <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                     <div class="fileupload-preview thumbnail mb20">
                                         <img src="{{asset('/')}}{{$editpro->a_img_4}}">
                                    </div>
                                     <div class="row">
                                         <div class="col-xs-12 ph10">
                                             <span class="button btn-primary btn-file btn-block">
                                               <span class="fileupload-new">Select</span>
                                               <span class="fileupload-exists">Change</span>
                                               <input value="{{$editpro->a_img_4}}" type="file" name="a_img_4">
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
                                     <input type="color" name="pro_color" value="{{$editpro->pro_color}}" id="pro_color"
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
                                       <textarea style="height: 160px;" value="{{$editpro->speacial_feature}}" class="gui-textarea br-light bg-light" id="comment"
                           name="speacial_feature" placeholder="Special Features">{{$editpro->speacial_feature}}</textarea>
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
                                       <select id="small_order_accpeted"  name="small_order_accpeted">
                                           <option value="{{$editpro->small_order_accpeted}}" selected="selected">
                                             <?php
                                                if ($editpro->small_order_accpeted == 1) {
                                                    echo "Yes";
                                                }elseif ($editpro->small_order_accpeted == 2) {
                                                    echo "No";
                                                }elseif ($editpro->small_order_accpeted == null) {
                                                  echo ";Small Order Accepted...";
                                                }
                                              ?>

                                             </option>
                                           <option value="1">Yes</option>
                                           <option value="0">No</option>

                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>

                               <div class="col-md-4 ph10">
                                   <label for="minumum_order_qty" class="field prepend-icon">
                                       <input type="number" name="minumum_order_qty" value="{{$editpro->minumum_order_qty}}" id="minumum_order_qty"
                                              class="gui-input"
                                              placeholder="Minimum Quantity">
                                       <label for="minumum_order_qty" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="unit_of_measure" class="field prepend-icon">
                                       <input type="number" value="{{$editpro->unit_of_measure}}" name="unit_of_measure" id="unit_of_measure"
                                              class="gui-input"
                                              placeholder="Unit of measure">
                                       <label for="unit_of_measure" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                                   @if ($errors->has('unit_of_measure'))
                                       <span class="invalid-feedback">
                                           <strong>{{ $errors->first('unit_of_measure') }}</strong>
                                       </span>
                                   @endif

                               </div>
                               <!-- -------------- /section -------------- -->



                           </div>
                           <!-- -------------- /Section -------------- -->

                           <div class="section row">
                             <div class="col-md-6 ph10">
                                 <label for="pro_price" class="field prepend-icon">
                                     <input type="text" name="pro_price" value="{{$editpro->pro_price}}" id="pro_price"
                                            class="gui-input"
                                            placeholder="Price...">
                                     <label for="pro_price" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                                 @if ($errors->has('pro_price'))
                                     <span class="invalid-feedback">
                                         <strong>{{ $errors->first('pro_price') }}</strong>
                                     </span>
                                 @endif
                             </div>
                             <div class="col-md-6 ph10">
                                 <label for="price_for_optional_units" class="field prepend-icon">
                                     <input type="text" name="price_for_optional_units" value="{{$editpro->price_for_optional_units}}" id="price_for_optional_units"
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
                                     <input type="text" name="price_15_days" value="{{$editpro->price_15_days}}" id="price_15_days"
                                            class="gui-input"
                                            placeholder="Price for 15 days...">
                                     <label for="15_days_price" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-6 ph10">
                                 <label for="30_days_price" class="field prepend-icon">
                                     <input type="text" name="price_30_days" value="{{$editpro->price_30_days}}" id="price_30_days"
                                            class="gui-input"
                                            placeholder="Price for 30 days...">
                                     <label for="price_30_days" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                           </div>
                           <div class="section row">
                             <div class="col-md-6 ph10">
                                 <label for="sample_fee" class="field prepend-icon">
                                     <input type="text" name="sample_fee" value="{{$editpro->sample_fee}}" id="sample_fee"
                                            class="gui-input"
                                            placeholder="Sample Fee...">
                                     <label for="sample_fee" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>
                             <div class="col-md-6 ph10">
                                 <label for="currency_in_naira" class="field prepend-icon">
                                     <input type="text" name="currency_in_naira" value="{{$editpro->currency_in_naira}}" id="currency_in_naira"
                                            class="gui-input"
                                            placeholder="Currency in Naira...">
                                     <label for="currency_in_naira" class="field-icon">
                                         <i class="fa fa-usd"></i>
                                     </label>
                                 </label>
                             </div>

                           </div>
                           <div class="section row">
                               <div class="col-md-12 ph10">
                                 <div class="section mb10">
                                     <label class="field prepend-icon">
                                         <textarea style="height: 160px;" class="gui-textarea br-light bg-light" value="{{$editpro->credit_payment_details}}"  id="credit_payment_details"
                             name="credit_payment_details" placeholder="Credit Payment Details">{{$editpro->credit_payment_details}}</textarea>
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
                                         <textarea style="height: 160px;" value="{{$editpro->optional_description}}" class="gui-textarea br-light bg-light" id="optional_description"
                             name="optional_description" placeholder="Optional Description">{{$editpro->optional_description}}</textarea>
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
                                     <input type="number" value="{{$editpro->length}}" name="length" id="length"
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
                                       <input type="number" name="width" value="{{$editpro->width}}" id="width"
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
                                       <input type="number" name="height" value="{{$editpro->height}}" id="height"
                                              class="gui-input"
                                              placeholder="Length">
                                       <label for="height" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                               <!-- -------------- /section -------------- -->

                           </div>
                           <!-- -------------- /Section -------------- -->

                           <div class="section row">
                             <div class="col-md-4 ph10">
                                 <label for="weight_per_pack" class="field prepend-icon">
                                     <input type="number" name="weight_per_pack" value="{{$editpro->weight_per_pack}}" id="weight_per_pack"
                                            class="gui-input"
                                            placeholder="Weight Per pack">
                                     <label for="weight_per_pack" class="field-icon">
                                         <i class="fa fa-sort-amount-desc"></i>
                                     </label>
                                 </label>
                             </div>
                               <!-- -------------- /section -------------- -->

                               <div class="col-md-4 ph10">
                                   <label for="export_carton_dimension" class="field prepend-icon">
                                       <input type="number" name="export_carton_dimension" value="{{$editpro->export_carton_dimension}}" id="export_carton_dimension"
                                              class="gui-input"
                                              placeholder="Export carton dimension">
                                       <label for="export_carton_dimension" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>

                               <div class="col-md-4 ph10">
                                   <label for="export_carton_weight" class="field prepend-icon">
                                       <input type="number" name="export_carton_weight" value="{{$editpro->export_carton_weight}}" id="export_carton_weight"
                                              class="gui-input"
                                              placeholder="Export carton weight">
                                       <label for="export_carton_weight" class="field-icon">
                                           <i class="fa fa-sort-amount-desc"></i>
                                       </label>
                                   </label>
                               </div>
                             </div>
                             <div class="section row">
                               <div class="col-md-4 ph10">
                                   <label for="supply_type" class="field select">
                                       <select id="delivery_w_state" name="delivery_w_state">

                                             <option value="{{$editpro->delivery_w_state}}" selected="selected">
                                               <?php

                                                  if($editpro->delivery_w_state == 1) {
                                                    echo "Yes";
                                                  }elseif ($editpro->delivery_w_state == 2) {
                                                    echo "No";

                                                  }elseif ($editpro->delivery_w_state == null) {
                                                    echo "Delivery Within State.........";
                                                  }
                                                ?>
                                             </option>
                                           </option>
                                           <option value="1">Yes</option>
                                           <option value="0">No</option>

                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="delivery_rate_w_range" class="field prepend-icon">
                                       <input type="text" name="delivery_rate_w_range" value="{{$editpro->delivery_rate_w_range}}" id="delivery_rate_w_range"
                                              class="gui-input"
                                              placeholder="Delivery rate within range...">
                                       <label for="delivery_rate_w_range" class="field-icon">
                                           <i class="fa fa-usd"></i>
                                       </label>
                                   </label>
                               </div>
                               <div class="col-md-4 ph10">
                                   <label for="delivery_rate_o_range" class="field prepend-icon">
                                       <input type="text" name="delivery_rate_o_range" value="{{$editpro->delivery_rate_o_range}}" id="delivery_rate_o_range"
                                              class="gui-input"
                                              placeholder="Delivery rate out of range...">
                                       <label for="delivery_rate_o_range" class="field-icon">
                                           <i class="fa fa-usd"></i>
                                       </label>
                                   </label>
                               </div>
                             </div>
                             <div class="section row">
                               <div class="col-md-12 ph10">
                                   <label for="payment_method" class="field select">
                                       <select id="payment_method" name="payment_method">
                                           <option value="{{$editpro->payment_method}}" selected="selected">
                                             <?php
                                                if ($editpro->payment_method == 1) {
                                                    echo "Cash in advance";
                                                }else {
                                                  echo "Cash in delivery";
                                                }
                                              ?>
                                           </option>
                                           <option value="1">Cash in advance</option>
                                           <option value="2">Cash in delivery</option>

                                       </select>
                                       <i class="arrow double"></i>
                                   </label>
                                   @if ($errors->has('payment_method'))
                                       <span class="invalid-feedback">
                                           <strong>{{ $errors->first('payment_method') }}</strong>
                                       </span>
                                   @endif
                               </div>
                             </div>


                           <hr class="short alt">

                           <div class="section mbn text-right">
                               <p class="text-right">
                                   <button class="btn btn-primary" type="submit">Update product</button>
                               </p>
                           </div>
                           <!-- -------------- /section -------------- -->

                       </div>

                   </div>
               </div>
           </div>
            </form>

           <!-- -------------- Recent Orders -------------- -->
      <!--  <div class="panel">
               <div class="panel-menu p12 allcp-form theme-primary mtn">
                   <div class="row">
                       <div class="col-md-2 pb5">
                           <label class="field select">
                               <select id="bulk-action" name="bulk-action">
                                   <option value="0">Actions</option>
                                   <option value="1">Edit</option>
                                   <option value="2">Delete</option>
                                   <option value="3">Active</option>
                                   <option value="4">Inactive</option>
                               </select>
                               <i class="arrow double"></i>
                           </label>
                       </div>
                       <div class="col-md-5 pb5">
                           <label class="field select">
                               <select id="filter-category" name="filter-category">
                                   <option value="0">Filter by Category</option>
                                   <option value="1">iPhone</option>
                                   <option value="2">iPad</option>
                                   <option value="3">iMac</option>
                               </select>
                               <i class="arrow"></i>
                           </label>
                       </div>
                       <div class="col-md-5 pb5">
                           <label class="field select">
                               <select id="filter-status" name="filter-status">
                                   <option value="0">Filter by Status</option>
                                   <option value="1">Active</option>
                                   <option value="2">Inactive</option>
                                   <option value="3">Low Stock</option>
                                   <option value="4">Out of Stock</option>
                               </select>
                               <i class="arrow"></i>
                           </label>
                       </div>
                   </div>
               </div>
               <div class="panel-body pn">
                   <div class="table-responsive">
                       <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                           <thead>
                           <tr class="bg-light">
                               <th class="text-center"></th>
                               <th class="">Image</th>
                               <th class="">Product Title</th>
                               <th class="">SKU</th>
                               <th class="">Price</th>
                               <th class="">Stock</th>
                               <th class="text-right">Status</th>
                               <th class="text-right">View</th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/1.jpg">
                               </td>
                               <td class="">Apple iPhone 5</td>
                               <td class="">#123</td>
                               <td class="">$500</td>
                               <td class="">300</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/2.jpg">
                               </td>
                               <td class="">Apple iPhone 6</td>
                               <td class="">#1234</td>
                               <td class="">$600</td>
                               <td class="">500</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/3.jpg">
                               </td>
                               <td class="">Apple iPad</td>
                               <td class="">#2345</td>
                               <td class="">$400</td>
                               <td class="">300</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/4.jpg">
                               </td>
                               <td class="">Apple iPad Air</td>
                               <td class="">#4563</td>
                               <td class="">$800</td>
                               <td class="">500</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/5.jpg">
                               </td>
                               <td class="">Apple iMac</td>
                               <td class="">#5555</td>
                               <td class="">$999</td>
                               <td class="">100</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/6.jpg">
                               </td>
                               <td class="">Apple iMac 27"</td>
                               <td class="">#5656</td>
                               <td class="">$1999</td>
                               <td class="">300</td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Active
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li class="active">
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/7.jpg">
                               </td>
                               <td class="">Apple iPhone 4S</td>
                               <td class="">#6666</td>
                               <td class="">$300</td>
                               <td class="text-warning">
                                   <b>15</b>
                               </td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-warning br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Disabled
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li>
                                               <a href="#">Active</a>
                                           </li>
                                           <li class="active">
                                               <a href="#" class="text-warning">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li>
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/8.jpg">
                               </td>
                               <td class="">Apple iPhone 6S 16GB</td>
                               <td class="">#1010</td>
                               <td class="">$995</td>
                               <td class="text-danger">
                                   <b>0 - Sold Out</b>
                               </td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-danger br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Sold Out
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li>
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li class="active">
                                               <a href="#" class="text-warning">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/9.jpg">
                               </td>
                               <td class="">Apple iPhone 6S 32GB</td>
                               <td class="">#1011</td>
                               <td class="">$1195</td>
                               <td class="text-danger">
                                   <b>0 - Sold Out</b>
                               </td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-danger br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Sold Out
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li>
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li class="active">
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           <tr>
                               <td class="text-center">
                                   <label class="option block mn">
                                       <input type="checkbox" name="inputname" value="FR">
                                       <span class="checkbox mn"></span>
                                   </label>
                               </td>
                               <td class="w100">
                                   <img class="img-responsive mw40 ib mr10" title="user"
                                        src="{{asset('public/seller')}}/assets/img/pages/products/10.jpg">
                               </td>
                               <td class="">Apple iPhone 6S 64GB</td>
                               <td class="">#1012</td>
                               <td class="">$1395</td>
                               <td class="text-danger">
                                   <b>0 - Sold Out</b>
                               </td>
                               <td class="text-right">
                                   <div class="btn-group text-right">
                                       <button type="button"
                                               class="btn btn-danger br2 btn-xs fs12 dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"> Sold Out
                                           <span class="caret ml5"></span>
                                       </button>
                                       <ul class="dropdown-menu" role="menu">
                                           <li>
                                               <a href="#">Edit</a>
                                           </li>
                                           <li>
                                               <a href="#">Delete</a>
                                           </li>
                                           <li>
                                               <a href="#">Archive</a>
                                           </li>
                                           <li class="divider"></li>
                                           <li>
                                               <a href="#">Active</a>
                                           </li>
                                           <li>
                                               <a href="#">Inactive</a>
                                           </li>
                                           <li>
                                               <a href="#">Low Stock</a>
                                           </li>
                                           <li class="active">
                                               <a href="#">Out of Stock</a>
                                           </li>
                                       </ul>
                                   </div>
                               </td>
                               <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                           </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div> -->

       </div>
       <!-- -------------- /Column Center -------------- -->

   </section>
   <!-- -------------- /Content -------------- -->

</section>
@endsection
