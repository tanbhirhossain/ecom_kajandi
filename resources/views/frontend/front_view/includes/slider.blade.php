<div class="col-md-9">
    <div class="owl-carousel owl-loaded owl-nav-dots-inner owl-carousel-curved" data-options='{"items":1,"loop":true}'>
        <?php
        $slider_product = App\HomeSlider::where('pro_status', 1)
            ->join('seller_products', 'seller_products.id', '=', 'product_id')
            ->select('home_sliders.*','seller_products.pro_image','seller_products.id as pid')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        ?>
    @foreach($slider_product as $product)
        <div class="owl-item">
            <div class="slider-item" style="background-color:#3D3D3D; height:490px;background-image:url({{asset($product->slider_image)}}); height:490px;">
                <div class="slider-item-inner slider-item-inner-container">
                    <div class="slider-item-caption-left slider-item-caption-white slider-item-caption-sm">
                        <h4 class="slider-item-caption-title">{{$product->slider_title}}</h4>
                        <p class="slider-item-caption-desc">
                          {!! \Illuminate\Support\Str::words($product->description, 25,'....')  !!}  {{$product->slider_description}}
                        </p><a class="btn btn-lg btn-ghost btn-white" href="{{url('/product-details/'.$product->pid)}}">Shop Now</a>
                    </div>
                    <img class="slider-item-img-right" src="{{asset($product->pro_image)}}" alt="Image Alternative text" title="Image Title" style="top: 50%; width: 50%; right: -10%;" />
                </div>
            </div>
        </div>
@endforeach



    </div>
</div>
