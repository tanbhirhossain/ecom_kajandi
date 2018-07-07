@extends('seller.seller_master')
@section('page_title','Add Vendor Product')
@section('seller_content')
<section id="content_wrapper">
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
                <a href="#">Profile</a>
            </li>
            <li class="breadcrumb-current-item">Update Primary Details</li>
        </ol>
    </div>
    <div class="topbar-right">


    </div>
</header>

<section id="content" class="table-layout animated fadeIn">


    <div class="chute col-md-8 chute-center pt30">
      <small>
          <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
          <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
      </small>

      <form class="" action="{{route('updateVendorPrimaryDetails')}}" method="post">@csrf


        <div style="border:3px dotted red;" class="panel mb25 mt5">
            <div class="panel-heading">
                <span class="panel-title hidden-xs"> Update Vendor/Seller Profile</span>

            </div>
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">


                    <div class="row">
                      <div class="section col-md-12 form-group">
                          <label for="vendorname" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Vendor/Seller Name</label>
                          <label for="vendorname" class="field prepend-icon">
                              <input type="text" name="vendorname" id="vendorname"
                                     class="event-name gui-input br-light light"
                                     placeholder="Vendor Name" value="@if($editVendor != null) {{$editVendor->vendorname}} @endif" >
                              <label for="pro_name" class="field-icon">
                                  <i class="fa fa-tag"></i>
                              </label>
                          </label>
                          @if ($errors->has('vendorname'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('vendorname') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                      <div class="row">
                        

                        <div class="section col-md-6 form-group">
                            <label for="contactphone" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Contact Phone</label>
                            <label for="contactphone" class="field prepend-icon">
                                <input type="text" name="contactphone" id="contactphone"
                                       class="event-name gui-input br-light light"
                                       placeholder="Contact Phone" value="@if($editVendor != null) {{$editVendor->contactphone}} @endif" >
                                <label for="pro_name" class="field-icon">
                                    <i class="fa fa-tag"></i>
                                </label>
                            </label>
                            @if ($errors->has('contactphone'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>


                    </div>
                </div>

                <button type="submit" class="btn btn-info" name="button"><i class="fa fa-edit"></i>  Update Primary Details</button>

            </div>

      </form>




    </div>



</section>


</section>

@endsection
