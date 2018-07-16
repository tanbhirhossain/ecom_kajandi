@extends('frontend.front_view.front_index_master')



@section('page-title',  'Global Source || Main')

@section('main_sidebar')
    @include('frontend.front_view.includes.sidebar')
@endsection

@section('main_slider')
    @include('frontend.front_view.includes.slider')
@endsection
<?php
$ads_s_1 = App\HomeAdvert::where('ads_section', 1)->where('pro_status', 1)
    ->join('seller_products', 'seller_products.id', '=', 'product_id')
    ->join('categories','categories.id', '=', 'pro_cat_id')
    ->orderBy('ads_id', 'desc')
    ->limit(3)
    ->get();
$today_f = App\HomeAdvert::where('ads_section', 2)->where('pro_status', 1)
    ->join('seller_products','seller_products.id', '=', 'product_id')
    //  ->select('seller_products.id as pid')
    ->orderBy('home_adverts.ads_id', 'desc')
    ->limit(20)
    ->get();
$best_f = App\HomeAdvert::where('ads_section', 3)->where('pro_status', 1)
    ->join('seller_products','seller_products.id', '=', 'product_id')
    ->orderBy('ads_id', 'desc')
    ->limit(8)
    ->get();
$ads_s_2 = App\HomeAdvert::where('ads_section', 4)->where('pro_status', 1)
    ->join('seller_products', 'seller_products.id', '=', 'product_id')
    ->join('categories','categories.id', '=', 'pro_cat_id')
    ->orderBy('ads_id', 'desc')
    ->limit(2)
    ->get();
?>

@section('main_content')
<div class="row" data-gutter="15">
  @foreach($ads_s_1 as $ads)
      <div class="col-md-4">
          <div class="banner" style="background-color:{{$ads->banner_color}}">
              {{--<a class="banner-link" href="{{url('/product-details/'.$ads->id)}}"></a>--}}
              <div class="banner-caption-top-left">
                  <a href="{{route('product-category',$ads->pro_cat_id)}}" style="color:#fff;text-decoration: none">
                      <h5 class="banner-title">{{$ads->cat_title}}</h5>
                  </a>
                  <p class="banner-desc">{{$ads->pro_name}}</p>
                  <p class="banner-shop-now">
                      <a style="color: #fff;text-decoration: none" href="{{url('/product-details/'.$ads->product_id)}}"> Shop Now </a>
                      <i class="fa fa-caret-right"></i>
                  </p>
                  <p class="price">${{$ads->unit_price}}</p>
              </div>

              @if($ads->ads_image)
                  <img class="banner-img" src="{{asset($ads->ads_image)}}" alt="" title="{{$ads->pro_name}}" style="bottom: -8px; right: -32px;">
              @else
                  <img class="banner-img" src="{{asset($ads->pro_image)}}" alt="" title="{{$ads->pro_name}}" style="bottom: -8px; right: -32px;">
              @endif

          </div>
      </div>
@endforeach

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
                           <a href="{{url('/product-details/'.$product->product_id)}}">
                               @if($product->ads_image)
                                   <img width="250" height="150" class="product-img" src="{{asset($product->ads_image)}}" alt="{{$product->pro_name}}" title="{{$product->pro_name}}" />
                               @else
                                   <img width="250" height="150" class="product-img" src="{{asset($product->pro_image)}}" alt="{{$product->pro_name}}" title="{{$product->pro_name}}" />
                               @endif
                           </a>
                       </div>
                       {{--<a class="product-link" href="{{url('/product-details/'.$product->product_id)}}"></a>--}}
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
                           <div class="product-caption-price"><span class="product-caption-price-new">${{$product->unit_price}}</span>
                               <a class="wishlist98" href="{{url('/add-to-wishlist/'.$product->product_id)}}"><i class="fa fa-heart"></i></a>
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
       <div class="row" data-gutter="15">
           <?php
           $home_page_product = DB::table('products')->take('8')->orderBY('id','desc')->get();
           ?>
           @foreach($best_f as $ads)
               <div class="col-md-3">
                   <div class="product ">

                       <div class="product-img-wrap">
                           @if($ads->ads_image)
                               <img class="product-img-primary" width="253" height="253" src="{{asset($ads->ads_image)}}" alt="{{$ads->pro_name}}" title="{{$ads->pro_name}}" />
                               <img class="product-img-alt" width="253" height="253" src="{{asset($ads->ads_image)}}" alt="{{$ads->pro_name}}" title="{{$ads->pro_name}}" />
                           @else
                               <img class="product-img-primary" width="253" height="253" src="{{asset($ads->pro_image)}}" alt="{{$ads->pro_name}}" title="{{$ads->pro_name}}" />
                               <img class="product-img-alt" width="253" height="253" src="{{asset($ads->pro_image)}}" alt="{{$ads->pro_name}}" title="{{$ads->pro_name}}" />
                           @endif
                       </div>
                       <a class="product-link" href="{{url('/product-details/'.$ads->product_id)}}"></a>
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
                           <h5 class="product-caption-title">{{$ads->pro_name}}</h5>
                           <div class="product-caption-price">


                        <span class="product-caption-price-new">

                                $ {{$ads->unit_price}}

                         </span>
                               {{--@if($product->discount_price!=NULL)--}}
                                   {{--<span class="product-caption-price-old">${{$product->unit_price}}</span>--}}
                                   {{--<span class="product-caption-price-new">${{$product->discount_price}}</span>--}}
                               {{--@endif--}}
                           </div>
                           <ul class="product-caption-feature-list">
                               <li>{{$ads->stock_qty}} left</li>
                               {{--<li>Free Shipping</li>--}}
                           </ul>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>

       <div class="gap"></div>
       <div class="row" data-gutter="15">
         @foreach($ads_s_2 as $ads)
             <div class="col-md-6">
                 <div class="banner" style="background-color:{{$ads->banner_color}};">
                     {{--<a class="banner-link" href="{{$ads->shop_now_link}}"></a>--}}
                     <div class="banner-caption-left">
                         <a href="{{route('product-category',$ads->pro_cat_id)}}" style="color:#fff;text-decoration: none">
                             <h5 class="banner-title">{{$ads->cat_title}}</h5>
                         </a>
                         <p class="banner-desc">{{$ads->pro_name}}</p>
                         <p class="banner-shop-now">
                             <a style="color: #fff;text-decoration: none" href="{{url('/product-details/'.$ads->product_id)}}"> Shop Now </a>
                             <i class="fa fa-caret-right"></i>
                         </p>
                         <p class="price">${{$ads->unit_price}}</p>
                     </div>
                     @if($ads->ads_image)
                         <img class="banner-img" src="{{asset($ads->ads_image)}}" alt="" title="{{$ads->pro_name}}" style="bottom: -8px; right: 11px; width: 238px;">
                     @else
                         <img class="banner-img" src="{{asset($ads->pro_image)}}" alt="" title="{{$ads->pro_name}}" style="bottom: -8px; right: 11px; width: 238px;">
                     @endif
                 </div>
             </div>
         @endforeach
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
