@extends('frontend.front_view.front_index_master')



@section('page-title',  'Global Source || Main')

@section('main_sidebar')
    @include('frontend.front_view.includes.sidebar')
@endsection

@section('main_slider')
    @include('frontend.front_view.includes.slider')
@endsection
<?php
$ads_s_1 = App\HomeAdvert::where('ads_section', 1)
    ->join('seller_products', 'seller_products.id', '=', 'product_id')
    ->join('categories','categories.id', '=', 'pro_cat_id')
    ->orderBy('ads_id', 'desc')
    ->limit(3)
    ->get();
$today_f = App\HomeAdvert::where('ads_section', 2)
    ->join('seller_products','seller_products.id', '=', 'product_id')
    //  ->select('seller_products.id as pid')
    ->orderBy('home_adverts.ads_id', 'desc')
    ->limit(20)
    ->get();
$best_f = App\HomeAdvert::where('ads_section', 3)
    ->join('seller_products','seller_products.id', '=', 'product_id')
    ->orderBy('ads_id', 'desc')
    ->limit(3)
    ->get();
$ads_s_2 = App\HomeAdvert::where('ads_section', 4)
    ->join('seller_products', 'seller_products.id', '=', 'product_id')
    ->join('categories','categories.id', '=', 'pro_cat_id')
    ->orderBy('ads_id', 'desc')
    ->limit(2)
    ->get();
?>

@section('main_content')
    <div class="row" data-gutter="15">
        <div class="row" data-gutter="15">
            @foreach($ads_s_1 as $ads)
                <div class="col-md-4">
                    <div class="banner" style="background-color:{{$ads->banner_color}}">
                        <a class="banner-link" href="{{url('/product-details/'.$ads->id)}}"></a>
                        <div class="banner-caption-top-left">
                            <h5 class="banner-title">{{$ads->cat_title}}</h5>
                            <p class="banner-desc">{{$ads->pro_name}}</p>
                            <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                            </p>
                            <p class="price">${{$ads->unit_price}}</p>
                        </div>

                        @if($ads->ads_image)
                            <img class="banner-img" src="{{asset($ads->ads_image)}}" alt="" title="Image Title" style="bottom: -8px; right: -32px;">
                        @else
                            <img class="banner-img" src="{{asset($ads->pro_image)}}" alt="" title="Image Title" style="bottom: -8px; right: -32px;">
                        @endif

                    </div>
                </div>
        @endforeach
        <!--  <div class="col-md-4">
            <div class="banner" style="background-color:#EF4D9C;">
                <a class="banner-link" href="#"></a>
                <div class="banner-caption-top-right">
                    <h5 class="banner-title">Welding Machines</h5>
                    <p class="banner-desc">Tig Machine</p>
                    <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                    </p>
                    <p class="price">$33</p>
                </div>
                <img class="banner-img" src="{{asset('public/frontend/img/')}}/home/tig_welding.png" alt="Image Alternative text" title="Image Title" style="bottom: -22px; left: 0; width: 235px;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="banner" style="background-color:#FEA92E;">
                <a class="banner-link" href="#"></a>
                <div class="banner-caption-bottom-left">
                    <h5 class="banner-title">HVAC</h5>
                    <p class="banner-desc">Rooftops Airconditioning.</p>
                    <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                    </p>
                    <p class="price">$33</p>
                </div>
                <img class="banner-img" src="{{asset('public/frontend/img/')}}/home/Tipo-Paquete-Condensado-por-Aire-Marca-Trane-de-5-TR-en-adelante.png" alt="Image Alternative text" title="Image Title" style="top: -4px; right: -15px; width: 220px;">
            </div>
        </div> -->
        </div>

        <div class="gap"></div>
        <h3 class="widget-title">Today Featured</h3>
        <div class="owl-carousel owl-loaded owl-nav-out" data-options='{"items":5,"loop":true,"nav":true}'>
            <?php
            $feature_product = DB::table('products')->where('hot','HOT')->take('16')->orderBY('id','desc')->get();
            ?>
            @foreach($today_f as $product)
                <div class="owl-item">
                    <div class="product  owl-item-slide">
                        <div class="product-img-wrap">
                            <a href="{{url('/product-details/'.$product->id)}}">
                                @if($product->ads_image)
                                    <img width="250" height="150" class="product-img" src="{{asset($product->ads_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                                @else
                                    <img width="250" height="150" class="product-img" src="{{asset($product->pro_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                                @endif
                            </a>
                        </div>
                        <a class="product-link" href="{{url('/product-details/'.$product->id)}}"></a>
                        <div class="product-caption">
                            <ul class="product-caption-rating">
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <h5 class="product-caption-title">{{$product->name}}</h5>
                            <div class="product-caption-price"><span class="product-caption-price-new">${{$product->unit_price}}</span>
                                <a class="wishlist98" href="{{url('/add-to-wishlist/'.$product->id)}}"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div class="gap"></div>
    <div class="container">
        <h3 class="widget-title-lg">Best of Tech</h3>
        {{--@foreach()--}}
        <div class="row" data-gutter="15">
            <?php
            $home_page_product = DB::table('products')->take('8')->orderBY('id','desc')->get();
            ?>
            @foreach($best_f as $ads)
                <div class="col-md-3">
                    <div class="product ">
                        <ul class="product-labels">
                            @if($product->hot!=NULL && $product->stuff_pick!=NULL)
                                <li>stuff pick</li>
                                <li>hot</li>
                            @elseif($product->hot!=NULL && $product->discount_price!=NULL)
                                <li>hot</li>
                                <li>
                                    <?php
                                    if($product->discount_price!=NULL && $product->discount_price<$product->price){
                                        $discount = $product->price - $product->discount_price;
                                        $main_price = $product->price;
                                        $percentage = 100*($discount/$main_price);
                                        echo $percentage."%";
                                    }
                                    ?>
                                </li>
                            @elseif($product->hot!=NULL)
                                <li>hot</li>
                            @elseif($product->stuff_pick!=NULL)
                                <li>stuff pick</li>
                            @elseif($product->discount_price!=NULL)
                                <li>-30</li>
                            @endif
                        </ul>
                        <div class="product-img-wrap">
                            @if($ads->ads_image)
                                <img class="product-img-primary" width="253" height="253" src="{{asset($product->ads_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                                <img class="product-img-alt" width="253" height="253" src="{{asset($product->ads_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                            @else
                                <img class="product-img-primary" width="253" height="253" src="{{asset($product->pro_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                                <img class="product-img-alt" width="253" height="253" src="{{asset($product->pro_image)}}" alt="{{$product->name}}" title="{{$product->name}}" />
                            @endif
                        </div>
                        <a class="product-link" href="{{url('/product-details/'.$product->id)}}"></a>
                        <div class="product-caption">
                            <ul class="product-caption-rating">
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                                <li class="rated"><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <h5 class="product-caption-title">{{$product->pro_name}}</h5>
                            <div class="product-caption-price">{{$product->unit_price}}


                         <span class="product-caption-price-new">
                            @if($product->discount_price==NULL)
                                 $ {{$product->price}}
                             @endif
                          </span>
                                @if($product->discount_price!=NULL)
                                    <span class="product-caption-price-old">${{$product->unit_price}}</span>
                                    <span class="product-caption-price-new">${{$product->discount_price}}</span>
                                @endif
                            </div>
                            <ul class="product-caption-feature-list">
                                <li>{{$product->qty}} left</li>
                                <li>Free Shipping</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{--@endforeach--}}
        <div class="gap"></div>
        <div class="row" data-gutter="15">
        <!--<div class="col-md-6">
                <div class="banner" style="background-color:#9C7B60;">
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption-left">
                        <h5 class="banner-title">HVAC</h5>
                        <p class="banner-desc">Heating and Cooling Systems Air Filter</p>
                        <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                        </p>
                        <p class="price">$100</p>
                    </div>
                    <img class="banner-img" src="{{asset('public/frontend/img/')}}/home/airqual2.png" alt="Image Alternative text" title="Image Title" style="bottom: -8px; right: 11px; width: 238px;">
                </div>
            </div>-->
            @foreach($ads_s_2 as $ads)
                <div class="col-md-6">
                    <div class="banner" style="background-color:{{$ads->banner_color}};">
                        <a class="banner-link" href="{{$ads->shop_now_link}}"></a>
                        <div class="banner-caption-left">
                            <h5 class="banner-title">{{$ads->cat_name}}</h5>
                            <p class="banner-desc">{{$ads->pro_name}}</p>
                            <p class="banner-shop-now">Shop Now <i class="fa fa-caret-right"></i>
                            </p>
                            <p class="price">{{$ads->unit_price}}</p>
                        </div>
                        @if($ads->ads_image)
                            <img class="banner-img" src="{{asset($ads->ads_image)}}" alt="" title="Image Title" style="bottom: -8px; right: 11px; width: 238px;">
                        @else
                            <img class="banner-img" src="{{asset($ads->pro_image)}}" alt="" title="Image Title" style="bottom: -8px; right: 11px; width: 238px;">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="gap"></div>
    <div class="container">
        <h3 class="widget-title-lg">Shop by Category</h3>
        <div class="row row-sm-gap" data-gutter="15">
            @foreach($all_category as $category)
                <div class="col-md-2">
                    <a class="banner-category" href="{{url('/product-category/'.$category->id)}}">
                        <img class="banner-category-img" src="{{asset($category->cat_image)}}" alt="{{$category->cat_title}}" title="{{$category->cat_title}}" width="100" height="60" />
                        <h5 class="banner-category-title">{{$category->cat_name}}</h5>
                        {{--Query for count category by product--}}
                        <?php
                        $count = DB::table('seller_products')->where('pro_cat_id',$category->id)->count();
                        ?>
                        <p class="banner-category-desc">{{$count}} products</p>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="gap"></div>
    </div>
    @include('frontend.front_view.includes.newsfeed')

@endsection
