@extends('seller.seller_master')
@section('page_title','Product List')
@section('seller_content')
<?php
  $menufacturer = App\Manufacter::All();
  $category = App\Category::All();
  $subcategory = App\Category::All();

 ?>
<section id="content_wrapper">

    <!-- -------------- Topbar Menu Wrapper -------------- -->
    <div id="topbar-dropmenu-wrapper">
        <div class="topbar-menu row">
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-danger">
                    <span class="fa fa-music"></span>
                    <span class="service-title">Audio</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-success">
                    <span class="fa fa-picture-o"></span>
                    <span class="service-title">Images</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-primary">
                    <span class="fa fa-video-camera"></span>
                    <span class="service-title">Videos</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-alert">
                    <span class="fa fa-envelope"></span>
                    <span class="service-title">Messages</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-system">
                    <span class="fa fa-cog"></span>
                    <span class="service-title">Settings</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="#" class="service-box bg-dark">
                    <span class="fa fa-user"></span>
                    <span class="service-title">Users</span>
                </a>
            </div>
        </div>
    </div>
    <!-- -------------- /Topbar Menu Wrapper -------------- -->

    <!-- -------------- Topbar -------------- -->
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
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-current-item">Products</li>
            </ol>
        </div>
    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">

            <!-- -------------- Products Status Table -------------- -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Products</span><br><br>

                            <a href="{{route('addSellerPro')}}" class="btn btn-primary btn-lg text-uppercase">Add Products</a>
                        </div>
                        <div class="panel-body pn">
                            <div class="panel-menu p12 allcp-form theme-primary mtn">
                              <small>
                                  <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                                  <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                              </small>
                                <div class="row">
                                    <div class="col-md-2 pb5">
                                        <label class="field select">
                                            <select id="bulk-action" name="bulk-action" class="empty">
                                                <option value="">Actions</option>
                                                <option value="1">Edit</option>
                                                <option value="2">Delete</option>
                                                <option value="3">Active</option>
                                                <option value="4">Inactive</option>
                                            </select>
                                            <i class="arrow double"></i>
                                        </label>
                                    </div>
                                    <div class="col-md-5 pb5">
                                        <label class="field select">
                                            <select id="filter-category" name="filter-category" class="empty">
                                                <option value="">Filter by Category</option>
                                                @foreach($category as $cat)
                                                  <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                    <div class="col-md-5 pb5">
                                        <label class="field select">
                                            <select id="filter-status" name="filter-status" class="empty">

                                                <option value="">Filter by Status</option>

                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                <option value="2">Low Stock</option>
                                                <option value="3">Out of Stock</option>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                            </div> <br>
                            <div class="table-responsive">

                                <table id="dtListUsers" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center"></th>
                                        <th class="">Id</th>
                                        <th class="">Image</th>
                                        <th class="">Product Title</th>
                                        <th class="">Model</th>
                                        <th class="">Price</th>
                                        <th class="">Stock</th>
                                        <th class="text-right">Status</th>
                                        <th class="text-right">View</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sellerProduct as $sp)
                                    <form  action="{{route('deleteMultiPro')}}" method="get">@csrf
                                    <tr>

                                        <td class="text-center">
                                            <label class="option block mn">
                                                <input value="{{$sp->id}}" type="checkbox" name="checked[]" >
                                                <span class="checkbox mn"></span>
                                            </label>
                                        </td>
                                          <td class="">{{$sp->id}}</td>
                                        <td class="w100">
                                            <img class="img-responsive mw40 ib mr10" title="Image"
                                                 src="{{asset($sp->pro_image)}}">
                                        </td>

                                        <td class="">{{$sp->pro_name}}</td>
                                        <td class="">{{$sp->model_number}}</td>
                                        <td class="">{{$sp->pro_price}}</td>
                                        <td class="">{{$sp->unit_of_measure}}</td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">
                                                <button type="button"
                                                        class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        <?php
                                                          if ($sp->pro_status == 0) {
                                                              echo "<b style='color:red'>Inactive</b>";
                                                          }elseif ($sp->pro_status == 1) {
                                                              echo "Active";
                                                          }elseif ($sp->pro_status == 2) {
                                                              echo "Low Stock";
                                                          }else {
                                                            echo "Out of Stock";
                                                          }

                                                         ?>
                                                      </a>
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu"  role="menu">
                                                    <li>
                                                        <a href="{{route('editProduct', $sp->id)}}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('deleteSellerPro', $sp->id)}}">Delete</a>
                                                    </li>

                                                    <li class="divider"></li>


                                                    <li>
                                                        <a href="2">Low Stock</a>
                                                    </li>
                                                    <li>
                                                        <a href="3">Out of Stock</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary pull-right">View</a></td>
                                    </tr>


                                    @endforeach
                                    <button type="submit" class="btn btn-danger">Del</button>
                                    </form>

                                    {{ $sellerProduct->links() }}

                                    </tbody>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- -------------- /Column Center -------------- -->

    </section>
    <!-- -------------- /Content -------------- -->

</section>

@endsection
