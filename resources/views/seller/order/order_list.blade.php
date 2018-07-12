@extends('seller.seller_master')
@section('page_title','Order List')
@section('seller_content')
<?php
  $menufacturer = App\Manufacter::All();
  $category = App\Category::All();
  $subcategory = App\Category::All();

 ?>
<section id="content_wrapper">


  <!--  <div id="topbar-dropmenu-wrapper">
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
    </div>-->

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
                <li class="breadcrumb-current-item">Order List</li>
            </ol>
        </div>
    </header>

    <section id="content" class="table-layout animated fadeIn">


        <div class="chute chute-center">


            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Order List</span><br><br>


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




                                              <div  class="dropdown">
                                                    <button style="background-color: Transparent; border:1px solid #ECECEC    ;padding-left: 30px;padding-right:40px" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                                  </button>
                                                    <ul style="border: 1px solid #2E73C7" class="dropdown-menu">
                                                      <li> <a  class="delete_all" data-url="" >Delete</a></li>
                                                      <!-- <li><a  class="" data-url="" >Active</a></li>
                                                      <li><a  class="" data-url="" >Inactive</a></li> -->
                                                    </ul>
                                                  </div>


                                            <i class="arrow double"></i>
                                        </label>
                                    </div>
                                    <form class="" action="{{route('listVendorProductByCat')}}" method="get">


                                    <div class="col-md-5 pb5">
                                        <label class="field select">
                                            <select onchange="this.form.submit()" id="filter-category" name="filterCategory" class="empty">
                                                <option value="">Filter by Category</option>



                                                <option value="all">All Category</option>
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                    </form>
                                      <form  action="{{route('listByStatus')}}" method="get">
                                    <div class="col-md-5 pb5">
                                        <label class="field select">


                                            <select id="filter-status" name="filterStatus" onchange="this.form.submit()" class="empty">
                                                <option value="">Filter by Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                <option value="2">Low Stock</option>
                                                <option value="3">Out of Stock</option>
                                                <option value="all">All</option>
                                            </select>

                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                      </form>
                                </div>
                            </div> <br>

                            <div class="table-responsive">

                                <table id="dtListUsers" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">

                                        <th class="">Id</th>
                                        <th class="">Customer Name</th>
                                        <th class="">Product</th>
                                        <th class="">Image</th>
                                        <th class="">Order Total</th>
                                        <th class="">Stock</th>
                                        <th class="text-right">Status</th>
                                        <th class="text-right">View</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($ordered as $order)
                                    <tr>
                                        <td class="">{{$order->id}}</td>
                                        <td class="">{{$order->cust_name}}</td>
                                        <td class="">{{$order->pro_name}}</td>
                                        <td class="w100">
                                            <img class="img-responsive mw40 ib mr10" title="Image"
                                                 src="{{asset($order->pro_image)}}">
                                        </td>
                                        <td class="">{{$order->order_total}}</td>
                                        <td class=""></td>
                                        <td class="text-right">
                                            <div class="btn-group text-right">


                                                  <button type="button" class="btn btn-warning br2 btn-xs fs12 dropdown-toggle"
                                                  data-toggle="dropdown" aria-expanded="false">
                                                  {{$order->order_status}}
                                                  <span class="caret ml5"></span></button>




                                                <ul class="dropdown-menu"  role="menu">
                                                    <li>
                                                        <a href="">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="">Delete</a>
                                                    </li>

                                                    <li class="divider"></li>



                                                </ul>
                                            </div>
                                        </td>
                                        <td><a href="" target="_blank" class="btn btn-primary pull-right">View</a></td>
                                    </tr>

                                    @endforeach


                                    </tbody>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>


</section>



@endsection
