@extends('frontend.front_view.front_master')
@section('page-title','Product Page')
@section('main_content')
<style media="screen">
  #chk_d{
    display: inline-block;
    vertical-align: middle;
    margin: 0;
    padding: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ccc;
    cursor: pointer;
    top: 0;
    left: -7px;
    margin-left: -13px;
    float: left;
    text-align: center;
    line-height: 20px;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -ms-transition: 0.3s;
    transition: 0.3s;
    position: relative;
    overflow: hidden;
    -webkit-border-radius: 2px;
    border-radius: 2px;
  }
</style>
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Welding &amp; Fabrication</h1>
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="../index.html">Home</a>
                </li>
                <li><a href="#">Welding &amp; Fabrication</a>
                </li>
            </ol>
            <ul class="category-selections clearfix">
                <li>
                    <a class="fa fa-th-large category-selections-icon active" href="#"></a>
                </li>
                <li>
                    <a class="fa fa-th-list category-selections-icon" href="#"></a>
                </li>
                <li><span class="category-selections-sign">Sort by :</span>
                    {!! Form::open(['url'=>'product-sorting','method'=>'GET']) !!}
                    <select onchange="this.form.submit()" class="category-selections-select" name="product_sort">
                        <option selected disabled>--Default--</option>
                        <option value="new_est">Newest First</option>
                        <option value="best_rated">Best Raited</option>
                        <option value="low_price">Price : Lowest First</option>
                        <option value="high_price">Price : Highest First</option>
                        <option value="a_to_z">Title : A - Z</option>
                        <option value="z_to_a">Title : Z - A</option>
                    </select>
                    {!! Form::close() !!}
                </li>
                <li><span class="category-selections-sign">Items :</span>
                    {!! Form::open(['url'=>'product-sorting-item','method'=>'GET']) !!}
                    <select onchange="this.form.submit()" class="category-selections-select" name="product_item">
                        <option selected disabled>--Select Item--</option>
                        <option value="nine_item">9 / page</option>
                        <option  value="twelve_item">12 / page</option>
                        <option value="eighteen_item">18 / page</option>
                        <option value="all_item">All</option>
                    </select>
                    {!! Form::close() !!}
                </li>
            </ul>
        </header>


        <div class="row">
            <div class="col-md-3">
                <aside class="category-filters">
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Category</h3>
                        <input type="hidden" id="category" value="2">
                        <input type="hidden" id="category_level" value="category">
                        {!! Form::open(['url'=>'product-by-category','method'=>'GET']) !!}
                        <select onchange="this.form.submit()" class="category-selections-select" name="pro_by_cat">
                            @foreach($all_category as $category)
                                <option value="{{$category->id}}" class="main-category">{{$category->cat_name}}</option>
                                @foreach($all_sub_category as $sub_category)
                                    @if($sub_category->cat_id==$category->id)
                                        <option value="{{$sub_category->id}}" class="sub-category" >&nbsp;&nbsp;{{$sub_category->sub_cat_name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                        {!! Form::close() !!}

                    </div>

                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Location</h3>
                        <input type="hidden" id="category" value="2">
                        <input type="hidden" id="category_level" value="category">

                        <select class="category-selections-select">
                            <option>Abia</option>
                            <option>Adamawa</option>
                            <option>Akwa Ibom	</option>
                            <option>Anambra</option>
                            <option>Bauchi</option>
                            <option>Bayelsa</option>
                            <option>Benue</option>
                            <option>Borno</option>
                            <option>Cross River	</option>
                            <option>Delta	</option>
                            <option>Ebonyi	</option>
                            <option>Edo	</option>
                            <option>Ekiti	</option>
                            <option>Enugu	</option>
                            <option>Gombe	</option>
                            <option>Imo	</option>
                            <option>Jigawa	</option>
                            <option>Kaduna	</option>
                            <option>Kano	</option>
                            <option>Katsina	</option>
                            <option>Kebbi	</option>
                            <option>Kogi	</option>
                            <option>Kwara	</option>

                        </select>

                    </div>

                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Vendor type</h3>
                        <input type="hidden" id="category" value="2">
                        <input type="hidden" id="category_level" value="category">
                        {!! Form::open(['url'=>'product-by-v-type','method'=>'GET']) !!}
                        <select class="category-selections-select" name="v_type" onchange="this.form.submit()">
                            <option selected disabled>--Default--</option>
                            <option value="1">OEM</option>
                            <option value="2">Distributor</option>
                            <option value="3">Wholesaler</option>
                            <option value="4">Retailer</option>
                        </select>
                        {!! Form::close() !!}
                    </div>
                    {!! Form::open(['url'=>'filter-by-price','method'=>'GET']) !!}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Price</h3>
                        {{--<span class="rangeValues"></span>--}}
                        {{--<input value="500" min="500" max="50000" step="500" type="range">--}}
                        {{--<input value="50000" min="500" max="50000" step="500" type="range">--}}

                        <input onchange="this.form.submit()" type="text" name="price_slider" id="price-slider" />
                        <input type="submit">
                    </div>
                    {!! Form::close() !!}



                    <form class="" action="{{route('product-by-po-delivery')}}" method="get">


                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Payment type</h3>
                        <div class='checkbox'>
                            <label>
                                <input type='checkbox'  name="payment_type"  onclick='if(this.checked){this.form.submit()}' value='1' />Pay on delivery
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </label>
                        </div>

                        <div class='checkbox'>
                            <label>
                                <input   type='checkbox' name="payment_type" onclick='if(this.checked){this.form.submit()}' value='2'  />Pay after inspection
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </label>
                        </div>

                        <div class='checkbox'>
                            <label>
                                <input   type='checkbox' name="payment_type" onclick='if(this.checked){this.form.submit()}' value='3' />Pay in Advance
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>

                            </label>
                        </div>
                    </div>
                  </form>


                    {{--{!! Form::open(['url'=>'product-sorting','method'=>'GET']) !!}--}}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Pricing</h3>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />Instant payment
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />15 days Payment
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />30 days Payment
                            </label>
                        </div>
                    </div>
                    {{--{!! Form::close() !!}--}}
                    {!! Form::open(['url'=>'product-by-manufacture','method'=>'GET','id'=>'brand_form']) !!}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Manufacturer</h3>
                        
                         @foreach($menufacturer as $menfac)
                        <div class='checkbox'>
                            <label>
                                <input  name='menufact_id'  type='checkbox' onclick='if(this.checked){this.form.submit()}' value='{{$menfac->id}}' />{{$menfac->name}} ({{App\SellerProduct::where('manufacture_id',$menfac->id)->count()}})
                            </label>
                        </div>
                        @endforeach

                    </div>
                    {!! Form::close() !!}
                    {{--{!! Form::open(['url'=>'product-sorting','method'=>'GET']) !!}--}}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Model</h3>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />Samsung s6 (02)
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />Samsung j5 (03)
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />apple x (03)
                            </label>
                        </div>
                    </div>
                    {{--{!! Form::close() !!}--}}
                    {!! Form::open(['url'=>'product-by-condition','method'=>'GET']) !!}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Condition</h3>
                        <div class='checkbox'>
                            <label>
                                <input  name='condition' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=3 />Faily Used ({{App\SellerProduct::where('condition',3)->count()}})
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input  name='condition' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=1 />New ({{App\SellerProduct::where('condition',1)->count()}})
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input  name='condition' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=2 />Refurbished ({{App\SellerProduct::where('condition',2)->count()}})
                            </label>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    {!! Form::open(['url'=>'product-by-supply-type','method'=>'GET']) !!}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Source</h3>
                        <div class='checkbox'>
                            <label>
                                <input  name='supply_type' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=4 />Retailer ({{App\SellerProduct::where('supply_type',4)->count()}})
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input  name='supply_type' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=2 />Distributor ({{App\SellerProduct::where('supply_type',2)->count()}})
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input  name='supply_type' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=3 />Wholesaler ({{App\SellerProduct::where('supply_type',3)->count()}})
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input  name='supply_type' type='checkbox' onclick='if(this.checked){this.form.submit()}' value=1 />OEM ({{App\SellerProduct::where('supply_type',1)->count()}})
                            </label>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    {{--{!! Form::open(['url'=>'product-sorting','method'=>'GET']) !!}--}}
                    <div class="category-filters-section">
                        <h3 class="widget-title-sm">Add On</h3>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />Less Than 1yr (02)
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />1 Year (03)
                            </label>
                        </div>
                        <div class='checkbox'>
                            <label>
                                <input class='i-check form' name='model[]' type='checkbox' value=1 />More Than 1yr (03)
                            </label>
                        </div>
                    </div>
                    {{--{!! Form::close() !!}--}}


                </aside>
            </div>
            <div class="col-md-9">

                <!-- Updated -->
                <div class="row" id="data" data-gutter="15">
                    <div class="vendor-product">
                        <div class="row">
                            @if(count($all_products)=='0')
                            @if(isset($search_message) && $search_message!=NULL)
                   <p class="alert alert-warning"> {{$search_message}}</p>
                   @endif
                    @endif
                        @foreach($all_products as $product)
                            <!-- Single Product -->
                                <div class="col-md-12 change_grid">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row" id="data" data-gutter="10" >
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="pro-image">
                                                        <a href="{{route('product-single',$product->id)}}"><img  width="100" height="150" src="{{asset($product->pro_image)}}"></a>
                                                        <a href="{{route('product-single',$product->id)}}">{{$product->pro_name}}</a>
                                                    </div>

                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="pro-image">
                                                        <a href="{{route('product-single',$product->id)}}"><img src="{{asset($product->a_img_1)}}"></a>
                                                        <a href="{{route('product-single',$product->id)}}">{{$product->pro_name}}</a>
                                                    </div>

                                                </div>

                                                <div class="col-md-4 col-sm-4">
                                                    <div class="pro-image">
                                                        <a href="{{route('product-single',$product->id)}}"><img src="{{asset($product->a_img_2)}}"></a>
                                                        <a href="{{route('product-single',$product->id)}}">{{$product->pro_name}}</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="row" id="data" data-gutter="10">
                                                <div class="pro-info">
                                                    <p class="name"><span class="tag">My Product</span>
                                                        <?php $seller = DB::table('sellers')->where('user_id',$product->seller_id)->first();?>
                                                        @if($seller!=NUll)
                                                            {{$seller->vendorname}}
                                                            @endif
                                                    </p>
                                                    <p class="location"><span class="tag">Location</span>
                                                        @if($seller!=NULL)
                                                            {{$seller->location}}
                                                            @endif
                                                    </p>
                                                    <p class="type"><span class="tag">Vendor type</span>
                                                        @if($product->supply_type=='1')
                                                            OEM
                                                        @elseif($product->supply_type=='2')
                                                            DISTRIBUTOR
                                                        @elseif($product->supply_type=='3')
                                                            WHOLESELLER
                                                        @elseif($product->supply_type=='4')
                                                            RETAILER
                                                        @endif

                                                    </p>
                                                </div>

                                            </div>

                                            <div class="row" data-gutter="10">
                                                <div class="col-md-4 col-sm-4">
                                                    <ul class="product-caption-rating">
                                                        <li class="rated"><i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="rated"><i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="rated"><i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="rated"><i class="fa fa-star"></i>
                                                        </li>
                                                        <li><i class="fa fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <button class="btn btn-primary" href="#">Contact supplier</button>
                                                </div>

                                            </div>
                                            <div class="row" data-gutter="10">
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="details-option">
                                                        <a href="#"><i class="fa fa-star"></i> Favourite</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="details-option">
                                                        <a href="#"><i class="fa fa-plus"></i> Compare</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Single Product -->
                            @endforeach
                        </div>

                    </div>

                </div>
                <!-- /Updated -->

                <div class="row" id="row" data-gutter="10">
                    <div class="vendor-pagination">

                        {{--{{ $all_products->count()}}--}}
                        {{--@if(function_exists('links'))--}}
                        <span class="text-center"> {{ $all_products->links() }}</span>
                        {{--@endif--}}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
