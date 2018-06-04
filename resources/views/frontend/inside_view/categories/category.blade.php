@extends('frontend.inside_view.inside_master')
@section('page-title', 'Category || ')
@section('main_content')

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
            <select class="category-selections-select">
                <option selected="">Newest First</option>
                <option>Best Sellers</option>
                <option>Trending Now</option>
                <option>Best Raited</option>
                <option>Price : Lowest First</option>
                <option>Price : Highest First</option>
                <option>Title : A - Z</option>
                <option>Title : Z - A</option>
            </select>
        </li>
        <li><span class="category-selections-sign">Items :</span>
            <select class="category-selections-select">
                <option>9 / page</option>
                <option selected="">12 / page</option>
                <option>18 / page</option>
                <option>All</option>
            </select>
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

                            <select class="category-selections-select">
              <option class="main-category" selected="">Main Category 1</option>
              <option class="sub-category">Sub category 1</option>
              <option class="sub-category">Sub category 2</option>
              <option class="sub-category">Sub category 3</option>
              <option class="sub-category">Sub category 4</option>


              <option class="main-category">Main Category 2</option>

              <option class="sub-category">Sub category 1</option>
              <option class="sub-category">Sub category 2</option>
              <option class="sub-category">Sub category 3</option>
              <option class="sub-category">Sub category 4</option>



            </select>

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
                            <h3 class="widget-title-sm">Price</h3>

              <!--<span class="rangeValues"></span>
              <input value="500" min="500" max="50000" step="500" type="range">
              <input value="50000" min="500" max="50000" step="500" type="range">-->

            <input type="text" id="price-slider" />


                        </div>

                    <form>
                        <div class="category-filters-section">
                            <h3 class="widget-title-sm">Payment type</h3>
                            <div class='checkbox'>
              <label>
                <input class='i-check form' name='manufacturer[]' type='checkbox' value=1 />Pay on delivery

              </label>
            </div>

            <div class='checkbox'>
              <label>
                <input class='i-check form' name='manufacturer[]' type='checkbox' value=1 />Pay after inspection
              </label>
            </div>

            <div class='checkbox'>
              <label>
                <input class='i-check form' name='manufacturer[]' type='checkbox' value=1 />Pay in Advance

              </label>
            </div>

                       </div>
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


        </form>
                </aside>
            </div>
    <div class="col-md-9">
                <div class="row" id="data" data-gutter="15">
                    <div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hot_wedge_welding_1.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hot wedge welding</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦500,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Plastic_Fabrication_2.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Plastic Fabrication</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦400,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499634292.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499634292.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hand_tool_3.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hand tool</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦300,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633746.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633746.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hot_wedge_welding_5.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hot wedge welding</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦2,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/vendorproduct/1509026351.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/vendorproduct/1509026351.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hot_wedge_welding_7.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hot wedge welding</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦5,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499634292.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499634292.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hand_tool_9.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hand tool</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦496,860</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Plastic_Fabrication_10.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Plastic Fabrication</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦450,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633334.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Plastic_Fabrication_11.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Plastic Fabrication</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦900,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1499633746.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1499633746.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Hot_wedge_welding_12.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Hot wedge welding</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦150,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1510997152.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1510997152.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Plastic_Fabrication_13.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Plastic Fabrication</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦4,500,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div><div class='col-md-4'>
                        <div class='product '>
                            <ul class='product-labels'></ul>
                            <div class='product-img-wrap'>
                                <img class='product-img-primary' src='../img/products/1510997282.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                                <img class='product-img-alt' src='../img/products/1510997282.jpg' alt='Image Alternative text' title='Image Title' style='height: 180px' />
                            </div>
                            <a class='product-link' href='../product/Plastic_Fabrication_14.html'></a>
                            <div class='product-caption'>
                                <ul class='product-caption-rating'>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li class='rated'><i class='fa fa-star'></i>
                                    </li>
                                    <li><i class='fa fa-star'></i>
                                    </li>
                                </ul>
                                <h5 class='product-caption-title'>Plastic Fabrication</h5>
                                <div class='product-caption-price'><span class='product-caption-price-new'>₦50,000</span>
                                </div>
                                <ul class='product-caption-feature-list'>
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div>


              </div>

  </div>
</div>
</div>


    <div class="gap"></div>


@endsection
