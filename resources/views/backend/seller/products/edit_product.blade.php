@extends('backend.admin_master')
@section('page_title','Update Vendor Product')
<style media="screen">

</style>

@section('admin_content')

<?php
  $menufacturer = App\Manufacter::All();
  $category = App\Category::All();
  $subcategory = App\Subcategory::All();
  $unit = App\Unit::All();

 ?>

    <link rel="stylesheet" href="{{asset('public/backend/countryflag/geodatasource-countryflag.css')}}">

    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header"><h4>Update Vendor Product</h4>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <form action="{{route('updateVendorPro', $editpro->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="seller_id" value="{{$editpro->seller_id}}">
                <div class="card">
                    <div class="card-header">
                        <strong>General Information</strong>
                    </div>
                    <div class="card-body">
                        <div class="card-body card-block">
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label for="pro_name" class=" form-control-label">Product Name</label>
                              <input type="text" name="pro_name" class="form-control" value="{{$editpro->pro_name}}">
                              @if ($errors->has('pro_name'))
                                  <div class="error">{{ $errors->first('pro_name') }}</div>
                              @endif
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12">
                                <label for="pro_name" class=" form-control-label">Product Generic Name</label>
                                <input type="text" name="pro_generic_name" class="form-control" value="{{$editpro->pro_generic_name}}">
                                @if ($errors->has('pro_generic_name'))
                                    <div class="error">{{ $errors->first('pro_generic_name') }}</div>
                                @endif
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12">
                              <div class="form-group">
                                <label for="pro_name" class=" form-control-label">Product Keyword</label>
                                <input type="text"name="pro_keyword" class="form-control" value="{{$editpro->pro_keyword}}">
                                @if ($errors->has('pro_keyword'))
                                    <div class="error">{{ $errors->first('pro_keyword') }}</div>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="pro_image" class=" form-control-label">Product Image</label>
                                    <div id='img_contain'><img  id="blah" align='middle' src="@if($editpro->pro_image != Null) {{asset($editpro->pro_image)}} @elseif($editpro == Null) http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title=''/></div>
                                    <input type='file' id="imgInp" name="pro_image" class="col-md-12 form-control" style="margin-left:-1.2px" />
                                  </div>

                                </div>
                                <div class="col-md-8">


                                    <div class="form-group">
                                      <div class="form-group">
                                        <label for="pro_name" class=" form-control-label">Product Description</label>
                                        <textarea name="pro_description" class="form-control" value="{{$editpro->pro_description}}" rows="8" cols="80">{{$editpro->pro_description}}</textarea>
                                        @if ($errors->has('pro_description'))
                                            <div class="error">{{ $errors->first('pro_description') }}</div>
                                        @endif
                                      </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong>Product Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="card-body card-block">
                              <div class="row">
                                  <div class="col-md-4 form-group">
                                          <input type="text" class="form-control" name="part_number" id="part_number"

                                                 placeholder="Part Number" value="{{$editpro->part_number}}" >
                                  </div>
                                  <div class="col-md-4 form-group">
                                          <select id="manufacture_id" class="form-control" name="manufacture_id">
                                            <option value="@if($menuFact != null){{$menuFact->id}}@endif" selected="selected">@if($menuFact != null){{$menuFact->name}}@endif</option>
                                            @foreach($menufacturer as $m)
                                            <option value="{{$m->id}}" >{{$m->name}}</option>
                                            @endforeach
                                          </select>
                                      @if ($errors->has('manufacture_id'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('manufacture_id') }}</strong>
                                          </span>
                                      @endif
                                  </div>

                                  <div class="col-md-4 form-group">
                                          <input type="text" name="model_number" id="model_number"
                                           placeholder="Model Number" class="form-control" value="@if($editpro != Null) {{$editpro->model_number}} @endif" >
                                  </div>
                                  <!-- -------------- /section -------------- -->



                              </div>
                              <div class="row">
                                  <div class="col-md-4 form-group">

                                          <select id="supply_type" class="form-control" name="supply_type">
                                            <option value="@if($editpro != Null) {{$editpro->supply_type}} @endif" selected="selected">
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
                                                   echo "Select Supply type....";
                                                 }else {
                                                   echo "None";
                                                 }
                                               ?>
                                            </option>
                                              <option value="1">OEM / Manufacturer</option>
                                              <option value="2">Distributor</option>
                                              <option value="3">Wholesaler</option>
                                              <option value="3">Retailer</option>
                                          </select>

                                  </div>
                                  <div class="col-md-4 form-group">

                                          <select id="pro_cat_id" class="form-control" name="pro_cat_id">
                                            <option value="{{$procat->id}}" selected="selected">{{$procat->cat_name}}</option>
                                            @foreach($category as $m)
                                            <option value="{{$m->id}}" >{{$m->cat_name}}</option>
                                            @endforeach
                                          </select>

                                      @if ($errors->has('pro_cat_id'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('pro_cat_id') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                  <div class="col-md-4 form-group">

                                          <select class="form-control" id="pro_subcat_id" name="pro_subcat_id">
                                            <option value="{{$prosubcat->id}}" selected="selected">{{$prosubcat->sub_cat_name}}</option>
                                            @foreach($subcategory as $m)
                                            <option value="{{$m->id}}" >{{$m->sub_cat_name}}</option>
                                            @endforeach
                                          </select>


                                      @if ($errors->has('pro_subcat_id'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('pro_subcat_id') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 form-group">

                                        <select class="form-control" id="conditions" name="conditions">
                                            <option value="@if($editpro != Null) {{$editpro->conditions}} @endif" selected="selected">
                                             <?php
                                               if ($editpro->conditions == 1) {
                                                 echo "New";
                                               }elseif ($editpro->conditions == 2) {
                                                 echo "Refurbished";
                                               }elseif ($editpro->conditions == 3) {
                                                 echo "Fairly Used";
                                               }elseif ($editpro->conditions == Null) {
                                                 echo "Condition...";
                                               }
                                              ?>
                                            </option>
                                            <option value="1">New</option>
                                            <option value="2">Refurbished</option>
                                            <option value="3">Fairly Used</option>

                                        </select>

                                    @if ($errors->has('conditions'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('conditions') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 form-group">

                                        <select class="form-control" id="pro_warranty" name="pro_warranty">
                                          <option value="@if($editpro != Null) {{$editpro->pro_warranty}} @endif" selected="selected">
                                           <?php
                                             if ($editpro->pro_warranty == 1) {
                                               echo "Less Then 0";
                                             }elseif ($editpro->pro_warranty == 2) {
                                               echo "One Year";
                                             }elseif ($editpro->pro_warranty == 3) {
                                               echo "Above One Year";
                                             }elseif ($editpro->pro_warranty == Null) {
                                               echo "Warranty...";
                                             }
                                            ?>
                                          </option>
                                            <option value="1">Less Then 0</option>
                                            <option value="2">One Year</option>
                                            <option value="3">Above One Year</option>

                                        </select>


                                </div>
                                <div class="col-md-4 form-group">

                                        <select class="form-control" id="pro_gurrantee" name="pro_gurrantee">
                                          <option value="@if($editpro != Null) {{$editpro->pro_gurrantee}} @endif" selected="selected">
                                           <?php
                                             if ($editpro->pro_gurrantee == 1) {
                                               echo "Less Then 0";
                                             }elseif ($editpro->pro_gurrantee == 2) {
                                               echo "One Year";
                                             }elseif ($editpro->pro_gurrantee == 3) {
                                               echo "Above One Year";
                                             }elseif ($editpro->pro_gurrantee == Null) {
                                               echo "Gurrantee...";
                                             }
                                            ?>
                                          </option>
                                            <option value="1">Less Then 0</option>
                                            <option value="2">One Year</option>
                                            <option value="3">Above One Year</option>

                                        </select>


                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <strong>Additional Images</strong>
                            </div>
                            <div class="card-body">
                                <div class="card-body card-block">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">

                                        <div id='img_contain'><img  id="blah" class="col-md-12" align='middle' src="@if($editpro->a_img_1 != Null) {{asset($editpro->a_img_1)}} @elseif($editpro->a_img_1 == Null) http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title=''/></div>
                                        <input type='file' id="imgInp" name="a_img_1" class="form-control" style="margin-left:-1.2px" />
                                      </div>

                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">

                                        <div id='img_contain'><img  id="blah" class="col-md-12" align='middle' src="@if($editpro->a_img_2 != Null) {{asset($editpro->a_img_2)}} @elseif($editpro->a_img_2 == Null) http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title=''/></div>
                                        <input type='file' id="imgInp" name="a_img_2" class="form-control" style="margin-left:-1.2px" />
                                      </div>

                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">

                                        <div id='img_contain'><img  id="blah" class="col-md-12" align='middle' src="@if($editpro->a_img_3 != Null) {{asset($editpro->a_img_3)}} @elseif($editpro->a_img_3 == Null) http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title=''/></div>
                                        <input type='file' id="imgInp" name="a_img_3" class="form-control" style="margin-left:-1.2px" />
                                      </div>

                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">

                                        <div id='img_contain'><img  id="blah" class="col-md-12" align='middle' src="@if($editpro->a_img_4 != Null) {{asset($editpro->a_img_4)}} @elseif($editpro->a_img_4 == Null) http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png @endif" alt="your image" title=''/></div>
                                        <input type='file' name="a_img_4" id="imgInp" class="form-control" style="margin-left:-1.2px" />
                                      </div>

                                    </div>

                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12">
                                      <input type="color" value="{{$editpro->pro_color}}" style="height:50px" name="pro_color" class="form-control col-md-12" value="{{$editpro->pro_color}}">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-md-12">
                                      <label class="form-control-label" for="speacial_feature">Product Features</label>
                                      <textarea name="speacial_feature" value="{{$editpro->speacial_feature}}" placeholder="Special Features" class="form-control" rows="8" cols="80">{{$editpro->pro_description}}</textarea>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Prices</strong>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-4 form-group">

                                            <select id="small_order_accpeted" class="form-control"  name="small_order_accpeted">
                                                <option value="{{$editpro->small_order_accpeted}}" selected="selected">
                                                  <?php
                                                     if ($editpro->small_order_accpeted == 1) {
                                                         echo "Yes";
                                                     }elseif ($editpro->small_order_accpeted == 2) {
                                                         echo "No";
                                                     }elseif ($editpro->small_order_accpeted == null) {
                                                       echo "Small Order Accepted...";
                                                     }
                                                   ?>

                                                  </option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>

                                            </select>

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <input type="number" name="minumum_order_qty" value="{{$editpro->minumum_order_qty}}" id="minumum_order_qty"
                                                   class="form-control"
                                                   placeholder="Minimum Quantity">

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <select class="form-control" id="unit" name="unit">

                                               @if($proUnit != Null)
                                                <option value="@if($proUnit != Null) {{$proUnit->id}} @endif" selected="selected">@if($proUnit != Null) {{$proUnit->name}} @endif</option>

                                                @else($proUnit == Null)
                                                <option value="">Unit...</option>
                                                @foreach($unit as $uni)
                                                <option value="{{$uni->id}}">{{$uni->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 form-group">
                                      <input type="text" name="price_for_optional_units" id="price_for_optional_units"
                                                   class="form-control"
                                                   placeholder="Price for optional units..."
                                                    value="{{$editpro->price_for_optional_units}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <input type="text" name="unit_price" id="unit_price"
                                                   class="form-control"
                                                   placeholder="Unit Price..."
                                                    value="{{$editpro->unit_price}}">
                                                    @if ($errors->has('unit_price'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('unit_price') }}</strong>
                                                        </span>
                                                    @endif
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 form-group">

                                            <input type="text" name="price_15_days" id="price_15_days"
                                                   class="form-control"
                                                   placeholder="Price for 15 days..."
                                                    value="{{$editpro->price_15_days}}">

                                    </div>
                                    <div class="col-md-6 form-group">
                                            <input type="text" name="price_30_days" id="price_30_days"
                                                   class="form-control"
                                                   placeholder="Price for 30 days..."
                                                   value="{{$editpro->price_30_days}}">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 form-group">

                                            <input type="text" name="sample_fee" id="sample_fee"
                                                   class="form-control"
                                                   placeholder="Sample Fee..." value="{{$editpro->sample_fee}}">

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <input type="text" name="currency_in_naira" id="currency_in_naira"
                                                   class="form-control"
                                                   placeholder="Currency in Naira..."  value="{{$editpro->currency_in_naira}}">

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <input type="text" name="stock_qty" id="stock_qty"
                                                   class="form-control"
                                                   placeholder="Stock Quantity..."  value="{{$editpro->stock_qty}}">

                                        @if ($errors->has('stock_qty'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('stock_qty') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  </div>
                                  <div class="row">

                                        <div class="form-group col-md-12">
                                          <label class="form-control-label" for="speacial_feature">Credit Payment Details</label>
                                          <textarea name="credit_payment_details" value="{{$editpro->credit_payment_details}}" placeholder="Credit Payment Details" class="form-control" rows="8" cols="80">{{$editpro->pro_description}}</textarea>
                                        </div>



                                  </div>
                                  <div class="row">
                                      <div class="col-md-12 form-group">

                                                  <label class="form-control-label" for="credit_payment_details">Optional Description</label>
                                                <textarea  class="form-control"
                                       name="optional_description" class="form-control" placeholder="Optional Description" value="{{$editpro->optional_description}}">{{$editpro->optional_description}}</textarea>


                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Delivery & Packaging</strong>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-4 form-group">

                                            <input type="number" name="length" id="length"
                                                   class="form-control"
                                                   placeholder="Length" value="{{$editpro->length}}">

                                    </div>
                                    <div class="col-md-4 form-group">

                                              <input type="number" name="width" id="width"
                                                     class="form-control"
                                                     placeholder="Width" value="{{$editpro->width}}">

                                      </div>
                                    <div class="col-md-4 form-group">

                                              <input type="number" name="height" id="height"
                                                     class="form-control"
                                                     placeholder="Height" value="{{$editpro->height}}">

                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4 form-group">

                                            <input type="text" name="weight_per_pack" id="weight_per_pack"
                                                   class="form-control"
                                                   placeholder="Weight Per pack" value="{{$editpro->weight_per_pack}}">
                                       </div>
                                      <div class="col-md-4 form-group">

                                              <input type="text" name="export_carton_width" id="export_carton_width"
                                                     class="form-control"
                                                     placeholder="Export carton width" value="{{$editpro->export_carton_width}}">

                                      </div>
                                      <div class="col-md-4 form-group">

                                              <input type="text" name="export_carton_length" id="export_carton_length"
                                                     class="form-control"
                                                     placeholder="Export carton length" value="{{$editpro->export_carton_length}}">
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 form-group">

                                            <input type="number" name="export_carton_weight" id="export_carton_weight"
                                                   class="form-control"
                                                   placeholder="Export carton weight" value="{{$editpro->export_carton_weight}}">

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <select class="form-control" id="payment_type" name="payment_type">
                                                <option value="{{$editpro->payment_type}}" selected="selected">
                                                  <?php
                                                   if ($editpro->payment_type == 1) {
                                                       echo "Cash on Delivery";
                                                   }elseif ($editpro->payment_type == 2) {
                                                       echo "Cash After Inspection";
                                                   }elseif ($editpro->payment_type == 3) {
                                                     echo "Cash in Advance";
                                                   }elseif ($editpro->payment_type == Null) {
                                                       echo " Select Payment Type...";
                                                   }
                                                 ?>
                                                </option>
                                                <option value="1">Cash on Delivery</option>
                                                <option value="2">Cash After Inspection</option>
                                                <option value="3">Cash in Advance</option>

                                            </select>

                                        @if ($errors->has('payment_type'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('payment_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 form-group">

                                            <input type="text" name="strength_of_meterial" id="strength_of_meterial"
                                                   class="form-control"
                                                   placeholder="Strength of meterial" value="{{$editpro->strength_of_meterial}}">

                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 form-group">

                                            <select id="duration_delivery_state" class="form-control" name="duration_delivery_state">
                                                <option value="{{$editpro->duration_delivery_state}}" selected="selected">
                                                  <?php
                                                     if ($editpro->duration_delivery_state == 1) {
                                                         echo "24 Hours";
                                                     }elseif ($editpro->duration_delivery_state == 2) {
                                                         echo "48 Hours";
                                                     }elseif ($editpro->duration_delivery_state == 3) {
                                                         echo "3 Days";
                                                     }elseif ($editpro->duration_delivery_state == 4) {
                                                         echo "5 Days";
                                                     }elseif ($editpro->duration_delivery_state == 5) {
                                                         echo "7 Days";
                                                     }elseif ($editpro->duration_delivery_state == 6) {
                                                         echo "9 Days";
                                                     }elseif ($editpro->duration_delivery_state == 7) {
                                                         echo "20 Days";
                                                     }elseif ($editpro->duration_delivery_state == null) {
                                                         echo "Duration Delivery State...";
                                                     }
                                                   ?>
                                                </option>
                                                <option value="1">24 Hours</option>
                                                <option value="2">48 Hours</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">5 Days</option>
                                                <option value="5">7 Days</option>
                                                <option value="6">9 Days</option>
                                                <option value="7">20 Days</option>

                                            </select>

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <select id="duration_within_state" class="form-control" name="duration_within_state">
                                              <option value="{{$editpro->duration_within_state}}" selected="selected">
                                                <?php
                                                   if ($editpro->duration_within_state == 1) {
                                                       echo "24 Hours";
                                                   }elseif ($editpro->duration_within_state == 2) {
                                                       echo "48 Hours";
                                                   }elseif ($editpro->duration_within_state == 3) {
                                                       echo "3 Days";
                                                   }elseif ($editpro->duration_within_state == 4) {
                                                       echo "5 Days";
                                                   }elseif ($editpro->duration_within_state == 5) {
                                                       echo "7 Days";
                                                   }elseif ($editpro->duration_within_state == 6) {
                                                       echo "9 Days";
                                                   }elseif ($editpro->duration_within_state == 7) {
                                                       echo "20 Days";
                                                   }elseif ($editpro->duration_within_state == null) {
                                                       echo "Duration Within State...";
                                                   }
                                                 ?>
                                              </option>
                                                <option value="1">24 Hours</option>
                                                <option value="2">48 Hours</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">5 Days</option>
                                                <option value="5">7 Days</option>
                                                <option value="6">9 Days</option>
                                                <option value="7">20 Days</option>

                                            </select>

                                    </div>
                                    <div class="col-md-4 form-group">

                                            <select id="duration_out_state" class="form-control" name="duration_out_state">
                                              <option value="{{$editpro->duration_out_state}}" selected="selected">
                                                <?php
                                                   if ($editpro->duration_out_state == 1) {
                                                       echo "24 Hours";
                                                   }elseif ($editpro->duration_out_state == 2) {
                                                       echo "48 Hours";
                                                   }elseif ($editpro->duration_out_state == 3) {
                                                       echo "3 Days";
                                                   }elseif ($editpro->duration_out_state == 4) {
                                                       echo "5 Days";
                                                   }elseif ($editpro->duration_out_state == 5) {
                                                       echo "7 Days";
                                                   }elseif ($editpro->duration_out_state == 6) {
                                                       echo "9 Days";
                                                   }elseif ($editpro->duration_out_state == 7) {
                                                       echo "20 Days";
                                                   }elseif ($editpro->duration_out_state == null) {
                                                       echo "Duration Out State...";
                                                   }
                                                 ?>
                                              </option>
                                                <option value="1">24 Hours</option>
                                                <option value="2">48 Hours</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">5 Days</option>
                                                <option value="5">7 Days</option>
                                                <option value="6">9 Days</option>
                                                <option value="7">20 Days</option>

                                            </select>

                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4 form-group">

                                              <select class="form-control" id="delivery_w_state" name="delivery_w_state">
                                                  <option value="{{$editpro->delivery_w_state}}" class="form-control" selected="selected">
                                                    <?php
                                                       if ($editpro->delivery_w_state == 1) {
                                                           echo "Yes";
                                                       }elseif ($editpro->delivery_w_state == 2) {
                                                           echo "No";
                                                       }elseif ($editpro->delivery_w_state == null) {
                                                         echo "Delivery within state...";
                                                       }
                                                     ?>
                                                  </option>
                                                  <option value="1">Yes</option>
                                                  <option value="2">No</option>

                                              </select>

                                      </div>
                                      <div class="col-md-4 form-group">

                                              <input type="text" name="delivery_rate_w_range" id="delivery_rate_w_range"
                                                     class="form-control"
                                                     placeholder="Delivery rate within range..." value="{{$editpro->delivery_rate_w_range}}">

                                      </div>
                                      <div class="col-md-4 form-group">

                                              <input type="text" name="delivery_rate_o_range" id="delivery_rate_o_range"
                                                     class="form-control"
                                                     placeholder="Delivery rate out of range..." value="{{$editpro->delivery_rate_o_range}}">

                                      </div>
                                    </div>
                                    <div class=" row">

                                    </div>
                                  <div class="row">
                                    <div class="col-md-12 form-group">
                                            <label class="form-control-label" for="seller_remark">Seller Remark</label>
                                            <textarea style="height: 160px;" class="form-control" id="seller_remark"
                                        name="seller_remark" placeholder="Seller Remark" value="{{$editpro->seller_remark}}">{{$editpro->seller_remark}}</textarea>


                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>







                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-lg btn-block"><i class="fa fa-edit"></i>   Update</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-region-dropdown-menu/1.2.1/geodatasource-cr.min.js" charset="utf-8"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
