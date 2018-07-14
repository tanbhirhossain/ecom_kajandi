@extends('frontend.front_view.front_master')
@section('page-title','Company Profile')

@section('main_content')

<style media="screen">
  body{
    background-color: white;
  }
</style>

  <div class="gap"></div>

  <!-- Page Content -->
  <div class="banner-wrap">
      <div class="container">
          <div class="row text-center">
              <div style="border:3px dotted grey" class="col-md-12">
                  <img src="{{asset($vendorProfile->company_banner)}}" alt="">
              </div>
          </div>
      </div>
  </div>

  <div class="gap"></div>

  <!-- Company Intro -->
  <div  class="company-intro-wrap">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h4>Company Introduction</h4>
                  <hr>
              </div>
          </div>

          <div class="row">
              <div class="col-md-4 col-sm-12">
                  <div class="product-preview">
                      <div class="single-preview prev-1 bg current" style="background-image: url({{asset($vendorProfile->company_img_1)}});"></div>
                      <div class="single-preview prev-2 bg" style="background-image: url({{asset($vendorProfile->company_img_2)}});"></div>
                      <div class="single-preview prev-3 bg" style="background-image: url({{asset($vendorProfile->company_img_3)}});"></div>
                  </div>

                  <div class="product-thumb-wrap">
                      <div class="product-thumb thumb-1 bg current" style="background-image: url({{asset($vendorProfile->company_img_1)}});"></div>
                      <div class="product-thumb thumb-2 bg" style="background-image: url({{asset($vendorProfile->company_img_2)}});"></div>
                      <div class="product-thumb thumb-3 bg" style="background-image: url({{asset($vendorProfile->company_img_3)}});"></div>
                  </div>
              </div>

              <div class="col-md-5 col-sm-6">
                  <div class="intro-content-wrap">
                      <h5>Verification Type: <a href="#">Onsite Check</a></h5>
                      <p><span>Location:</span> {{$vendorProfile->location}}</p>
                      <p><span>Year Established:</span> {{$vendorProfile->established_year}}</p>
                      <p><span>Business Type:</span> {{$vendorProfile->seller_type}}</p>
                      <p><span>Total Annual Revenue:</span> {{$vendorProfile->annual_revenue}}</p>
                      <p><span>Main Products:</span> {{$vendorProfile->main_products}}</p>
                      <p><span>Main Markets:</span> {{$vendorProfile->main_market}}</p>
                      <a href="#">Learn More About US <i class="fa fa-caret-right"></i></a>
                  </div>
              </div>

              <div class="col-md-3 col-sm-6">
                  <ul class="product-author">
                      <li><a href="#"><i class="fa fa-user"></i> {{$vendorProfile->contactname}}</a></li>
                      <!--<li><a href="#"><i class="fa fa-comment"></i> Chat Now</a></li>-->
                      <li><a href="#" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Contact Supplier</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <!-- end of Company Intro -->

  <div class="gap"></div>


  <!-- Product Showcase -->
  <div class="showcase-wrap">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h4>Product Showcase</h4>
                  <hr>
              </div>
          </div>

          <div class="row">
              <div class="col-xs-12">
                  <div class="showcase-wrap-inner">
                    @foreach($vendorProduct as $vp)

                        <div class="col-md-3">

                          <div class="product ">
                            <ul class="product-labels"></ul>
                            <div class="product-img-wrap">
                              <img class="product-img-primary" src="{{asset($vp->pro_image)}}" alt="Image Alternative text" title="Image Title" />
                              <img class="product-img-alt" src="{{asset($vp->pro_image)}}" alt="Image Alternative text" title="Image Title" />
                            </div>
                            <a class="product-link" href="{{route('product-single',$vp->id)}}"></a>
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
                              <h5 class="product-caption-title">{{$vp->pro_name}}</h5>
                              <div class="product-caption-price"><span class="product-caption-price-new">${{$vp->unit_price}}</span>
                              </div>
                              <ul class="product-caption-feature-list">
                                <li>Free Shipping</li>
                              </ul>
                            </div>
                          </div>
                        </div>

                      @endforeach





                  </div>
              </div>
          </div>

          <div class="gap"></div>

          <div class="row">
              <div class="col-md-12">
                  <div class="supplier-email">
                      <h4>Email to this supplier</h4>
                      <form action="#" class="supplier-mail-form">
                          <div class="col-sm-2 text-right">
                              <p>To:</p>
                              <p>Message:</p>
                          </div>

                          <div class="col-sm-10">
                              <textarea rows="6" placeholder="Enter your inquiry details such as product name, color, size, MOQ, FOB, etc."></textarea>
                              <p><i>Your message must be between 20-8000 characters</i></p>
                              <p><input type="checkbox" id="check"> <label for="check">I agree to share my Business Card to the supplier.</label></p>
                              <button type="submit" class="btn btn-primary btn-lg">Send</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- end of Product Showcase -->
  <div class="gap"></div>
  <!-- end of Page Content -->


@endsection
