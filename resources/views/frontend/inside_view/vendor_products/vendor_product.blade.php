@extends('frontend.inside_view.inside_master')
@section('page-title', 'Vendor Product || ')
@section('main_content')
<div class="container">
<header class="page-header">
      <h1 class="page-title">Vendors</h1>
      <ol class="breadcrumb page-breadcrumb">
          <li><a href="index.html">Home</a>
          </li>
          <li><a href="#">Vendors</a>
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
                          <h3 class="widget-title-sm">Vendor type</h3>
                          <input type="hidden" id="category" value="2">
                          <input type="hidden" id="category_level" value="category">

                              <select class="category-selections-select">
                  <option>Vwndor type 1</option>
                  <option>Vwndor type 2</option>
                  <option>Vwndor type 3</option>
              </select>

                      </div>

                      <form>




          </form>
                  </aside>
              </div>
      <div class="col-md-9">

        <div class="row" id="data" data-gutter="15">
                      <div class="vendor-product">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div class="row" id="data" data-gutter="10" >
                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>
                  </div>

              </div>

              <div class="col-md-6 col-sm-6">
                <div class="row" id="data" data-gutter="10">
                  <div class="pro-info">
                    <p class="name"><span class="tag">My Product</span>Vendor Name</p>
                    <p class="location"><span class="tag">Location</span>Vendor Location 1, Vendor Location 2, Vendor Location 3 </p>
                    <p class="type"><span class="tag">Vendor type</span>Vendor Type is here</p>
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

                  </div>
        <div class="row" data-gutter="15">
                      <div class="vendor-product">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div class="row" data-gutter="10" >
                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product title is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>
                  </div>

              </div>

              <div class="col-md-6 col-sm-6">
                <div class="row" data-gutter="10">
                  <div class="pro-info">
                    <p class="name"><span class="tag">My Product</span>Vendor Name</p>
                    <p class="location"><span class="tag">Location</span>Vendor Location 1, Vendor Location 2, Vendor Location 3 </p>
                    <p class="type"><span class="tag">Vendor type</span>Vendor Type is here</p>
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

                  </div>
        <div class="row" data-gutter="15">
                      <div class="vendor-product">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                  <div class="row" data-gutter="10" >
                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product title is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>

                    <div class="col-md-4 col-sm-4">
                      <div class="pro-image">
                        <a href="#"><img src="img/products/1499633746.jpg"></a>
                        <a href="#">Product tile is here</a>
                      </div>

                    </div>
                  </div>

              </div>

              <div class="col-md-6 col-sm-6">
                <div class="row" data-gutter="10">
                  <div class="pro-info">
                    <p class="name"><span class="tag">My Product</span>Vendor Name</p>
                    <p class="location"><span class="tag">Location</span>Vendor Location 1, Vendor Location 2, Vendor Location 3 </p>
                    <p class="type"><span class="tag">Vendor type</span>Vendor Type is here</p>
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

                  </div>
        <div class="row" id="row" data-gutter="10">
          <div class="vendor-pagination">

            <nav aria-label="Page navigation">
                <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
                </ul>
            </nav>
          </div>
        </div>


      </div>

    </div>
</div>
</div>


      <div class="gap"></div>

@endsection
