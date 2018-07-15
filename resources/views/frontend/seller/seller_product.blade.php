@extends('frontend.front_view.front_master')
@section('page-title','seller-product')
@section('main_content')
    <?php $all_product = DB::table('seller_products')->where('seller_id',$seller_by_id->user_id)->where('pro_status',1)->paginate(12);?>
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-wrapper">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 box">
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <h2>{{$seller_by_id->vendorname}}</h2>
                </div>
                <div class="col-md-6 col-xs-6">
                </div>
            </div>


        </div>
    </div>
    <br>
    <div class="row box">
        <div class="col-md-3 rows" >
            <h4>Categories</h4>
            <br>
            <ul style='list-style-type: none'>
                @foreach($all_category as $category)
            <li><a href='{{route('product-category',$category->id)}}'>{{$category->cat_name}} <b style='font-weight: bolder'><i class='fa fa-angle-right pull-right caret-icon' name='filter-category-buckets' data-category-id='4'></i></b></a></li><br>
               @endforeach
            </ul>
        </div>
        <div class="col-md-9 rows" style="border-left: 1px solid #000">
            <div class="row">
                <ul class='paginate' style='list-style-type:none'>
                        @foreach($all_product as $product)
                    <li>
                        <div class='col-md-4' style='margin-bottom: 10px'>
                            {!! Form::open(['method'=>'POST','url'=>'add-to-cart']) !!}
                            <div class='product '>
                                <ul class='product-labels'>
                                    {{--<li>-10%</li>--}}
                                    {{--<li>hot</li>--}}
                                </ul>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="qty" value="1">
                                <div class='product-img-wrap'>
                                    <img class='product-img-primary' src='{{asset($product->pro_image)}}' style='height: 122px' alt='{{$product->pro_name}}' title='{{$product->pro_name}}'>
                                    <img class='product-img-alt' src='{{asset($product->pro_image)}}' alt='Image Alternative text' title='{{$product->pro_name}}'>
                                </div>
                                <div class='product-caption'>
                                    <ul class="product-caption-rating">
                                        <?php $average_rating = DB::table('customer_reviews')
                                            ->where('product_id',$product->id)->get();?>
                                        <?php
                                        $avg = 0;
                                        foreach ($average_rating as $avgr){
                                            $result = $avgr->rating;
                                            $avg = $avg+$result;
                                        }?>
                                        <?php if($avg!=0){
                                        $rate_by_product = $avg/$average_rating->count();
                                        if($rate_by_product>0 && $rate_by_product<=1){?>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <?php    }elseif($rate_by_product>1 && $rate_by_product<=2){?>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <?php } elseif($rate_by_product>2 && $rate_by_product<=3){?>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <?php     }elseif ($rate_by_product>3 && $rate_by_product<=4){?>

                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li class="rated"><i class="fa fa-star"></i>
                                        </li>
                                        <li ><i class="fa fa-star"></i></li>
                                        <?php } elseif($rate_by_product>4 && $rate_by_product<=5){?>
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

                                        <?php } }else{?>
                                        <i class="fa fa-star"></i></li>
                                        <i class="fa fa-star"></i></li>
                                        <i class="fa fa-star"></i></li>
                                        <i class="fa fa-star"></i></li>
                                        <i class="fa fa-star"></i></li>
                                        <?php   }?>

                                    </ul>
                                    <h5 class='product-caption-title'><a href='{{route('product-single',$product->id)}}'>{{$product->pro_name}}</a></h5>
                                    <div class='product-caption-price'><span class='product-caption-price-new'><span style='font-size: 18px'> <span style="font-size: 15px">Regular Price</span> ${{$product->unit_price}} </span><br> <span class='add1'><button class='fa fa-shopping-cart btn btn-sm addproducttocart1' id=1>add to cart</button></span></span>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </li>
                        @endforeach


                </ul>


                <script type='text/javascript'>
                    $('.paginate').paginathing({
                        perPage: 12,
                        limitPagination:
                    })
                </script>
            </div>

        </div>
    </div>

</div>
@endsection
