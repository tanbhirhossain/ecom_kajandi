@extends('frontend.front_view.front_master')
@section('page-title','Contact Supplier')
@section('main_content')
<div class="rfq_section">
    <div class="container" >
        <p class="text-center alert-success">{{Session::get('message_success')}}</p>
        <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
        <div class="col-md-1"></div>
        <div class="col-md-10 rqf_col" style="border:2px solid #F27F77;padding: 10px">
            <div class="rqf_content">
                <div class="formInput">
                  {!! Form::open(['url'=>'save-customer-request','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <h4><i class="fa fa-user" style="margin: 10px"></i><a href="{{route('seller-product',$seller_id->user_id)}}">{{$seller_id->vendorname}}</a> </h4>
                            <h4>Product Name: <a href="{{route('product-single',$product->id)}}">{{$product->pro_name}}</a></h4>
                        </div>
                    <input type="hidden" name="product_title" value="{{$product->pro_name}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="seller_id" value="{{$seller_id->user_id}}">

                        <div class="rqf_quantity">
                            <div class="rqf_quantity_input">
                                <input type="text" name="product_qty" placeholder="Enter Quantity" class="rqf_quantity_input_box">
                                @if ($errors->has('product_qty'))
                                    <div class="error">{{ $errors->first('product_qty') }}</div>
                                @endif

                                <select class="rqf_quantity_input_select" name="product_unit">
                                    <option>Select Unit</option>
                                    @foreach(\App\Unit::all() as $unit)
                                        <option value="{{$unit->name}}">{{$unit->name}}</option>
                                    @endforeach
                                    @if ($errors->has('product_unit'))
                                        <div class="error">{{ $errors->first('product_unit') }}</div>
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class="text_area_file">
                           <textarea  name="user_message" class="rqf_message textarea"></textarea>
                            @if ($errors->has('user_message'))
                                <div class="error">{{ $errors->first('user_message') }}</div>
                            @endif
                            <input type="file" name="attach_file" class="rqf_file">
                            @if ($errors->has('attach_file'))
                                <div class="error">{{ $errors->first('attach_file') }}</div>
                            @endif
                            <p class="msg_word_remaining">Remaining: <span>7924</span></p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="recommend">  Recommend matching suppliers if this supplier doesn't contact me on Message Center within 24 hours. RFQ

                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="agree">  Agree to share Business Card with supplier.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default submit_btn_rqf">Submit</button>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="gap gap-small"></div>
</div>
@endsection
