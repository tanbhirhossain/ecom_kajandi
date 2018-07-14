@extends('seller.seller_master')
@section('page_title','Add Vendor Product')
@section('seller_content')
<section id="content_wrapper">
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
                <a href="#">Profile</a>
            </li>
            <li class="breadcrumb-current-item">Update Profile</li>
        </ol>
    </div>
    <div class="topbar-right">


    </div>
</header>

<section id="content" class="table-layout animated fadeIn">


    <div class="chute col-md-8 chute-center pt30">
      <small>
          <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
          <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
      </small>


        <div style="border:3px dotted red;" class="panel mb25 mt5">
            <div class="panel-heading">
                <span class="panel-title hidden-xs"> Update Vendor/Seller Profile</span>

            </div>
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">


                    <div class="row">
                      <div class="section col-md-12 form-group">
                          <label for="vendorname" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Vendor/Seller Name</label>
                          <label for="vendorname" class="field prepend-icon">
                              <input type="text" name="vendorname" id="vendorname"
                                     class="event-name gui-input br-light light"
                                     placeholder="Vendor Name" value="@if($editVendor != Null){{$editVendor->vendorname}} @endif" readonly>
                              <label for="pro_name" class="field-icon">
                                  <i class="fa fa-tag"></i>
                              </label>
                          </label>
                      </div>
                    </div>
                      <div class="row">
                        <div class="section col-md-6 form-group">
                            <label for="email" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Email</label>
                            <label for="email" class="field prepend-icon">
                                <input type="text" name="email" id="email"
                                       class="event-name gui-input br-light light"
                                       placeholder="Email Address" value="@if($editVendor != Null){{$editVendor->email}} @endif" readonly>
                                <label for="pro_name" class="field-icon">
                                    <i class="fa fa-tag"></i>
                                </label>
                            </label>
                        </div>

                        <div class="section col-md-6 form-group">
                            <label for="contactphone" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Contact Phone</label>
                            <label for="contactphone" class="field prepend-icon">
                                <input type="text" name="contactphone" id="contactphone"
                                       class="event-name gui-input br-light light"
                                       placeholder="Contact Phone" value="@if($editVendor != Null){{$editVendor->contactphone}} @endif" readonly>
                                <label for="pro_name" class="field-icon">
                                    <i class="fa fa-tag"></i>
                                </label>
                            </label>
                        </div>
                      </div>

                      <a type="button" class="btn btn-primary" href="{{route('editVendorPrimaryDetails')}}" name="button">Edit This Section</a>
                    </div>
                </div>

            </div>
            <form class="" action="{{route('updateVendorProfile')}}" method="post" enctype="multipart/form-data" >
              @csrf
              <input type="hidden" name="seller_id" value="{{Auth::id()}}">
            <div class="panel">
              <div class="panel-heading">
                  <span class="panel-title hidden-xs"> General Information</span>
              </div>
              <div class="panel-body pn">
                  <div class="tab-content pn br-n allcp-form theme-primary">



                        <div class="section row">
                          <div class="col-md-4 ph10">
                              <label for="vendor_type" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Vendor Type</label>
                              <label for="vendor_type" class="field select">
                                  <select id="vendor_type" name="vendor_type">
                                      <option value="@if($editVendor != Null) {{$editVendor->vendor_type}} @endif" selected="selected">
                                        <?php
                                          if ($editVendor->vendor_type == 1) {
                                            echo "OEM / Manufacturer";
                                          }elseif ($editVendor->vendor_type == 2) {
                                            echo "Distributor";
                                          }elseif ($editVendor->vendor_type == 3){
                                            echo "Wholesaler";
                                          }elseif ($editVendor->vendor_type == 4){
                                            echo "Retailer.";
                                          }elseif ($editVendor->vendor_type == Null){
                                            echo "Vendor Type...";
                                          }
                                         ?>
                                      </option>
                                      <option value="1">OEM / Manufacturer</option>
                                      <option value="2">Distributor</option>
                                      <option value="3">Wholesaler</option>
                                      <option value="4">Retailer</option>
                                  </select>
                                  <i class="arrow double"></i>
                              </label>
                          </div>
                          <div class="col-md-4 ph10">
                              <label for="producttype" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Product Type</label>
                              <label for="producttype" class="field select">
                                  <select id="producttype" name="producttype">
                                    <option value="@if($editVendor != Null){{$editVendor->producttype}} @endif" selected="selected">
                                      <?php
                                        if ($editVendor->producttype == 1) {
                                          echo "Goods";
                                        }elseif ($editVendor->producttype == 2) {
                                          echo "Service";
                                        }elseif ($editVendor->producttype == Null){
                                          echo "Product Type...";
                                        }
                                       ?>
                                    </option>
                                      <option value="1">Goods</option>
                                      <option value="2">Service</option>

                                  </select>
                                  <i class="arrow double"></i>
                              </label>
                          </div>
                          <div class="col-md-4 ph10">
                              <label for="location" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Location</label>
                              <label for="location" class="field select">
                                  <select id="location" name="location">
                                      @if($editVendor->location == Null)
                                      <option value="" selected="selected">Location...</option>
                                      @elseif($editVendor->location != Null)
                                      <option selected="selected">@if($editVendor != Null){{$editVendor->location}} @endif</option>
                                      @endif

                                      <option>ABUJA FCT</option>
                                      <option>ABIA</option>
                                      <option>ADAMAWA</option>
                                      <option>AKWA IBOM</option>
                                      <option>ANAMBRA</option>
                                      <option>BAUCHI</option>
                                      <option>BAYELSA</option>
                                      <option>BENUE</option>
                                      <option>BORNO</option>
                                      <option>CROSS RIVER</option>
                                      <option>DELTA</option>
                                      <option>EBONYI</option>
                                      <option>EDO</option>
                                      <option>EKITI</option>
                                      <option>ENUGU</option>
                                      <option>GOMBE</option>
                                      <option>IMO</option>
                                      <option>JIGAWA</option>
                                      <option>KADUNA</option>
                                      <option>KANO</option>
                                      <option>KATSINA</option>
                                      <option>KEBBI</option>
                                      <option>KOGI</option>
                                      <option>KWARA</option>
                                      <option>LAGOS</option>
                                      <option>NASSARAWA</option>
                                      <option>NIGER</option>
                                      <option>OGUN</option>
                                      <option>ONDO</option>
                                      <option>OSUN</option>
                                      <option>OYO</option>
                                      <option>PLATEAU</option>
                                      <option>RIVERS</option>
                                      <option>SOKOTO</option>
                                      <option>TARABA</option>
                                      <option>YOBE</option>
                                      <option>ZAMFARA</option>
                                      <option>Outside Nigeria</option>


                                  </select>
                                  <i class="arrow double"></i>
                              </label>
                          </div>
                        </div>

                        <div class="section row">
                          <div class="col-md-12 ph10">
                              <label for="address" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Address</label>
                              <label for="address" class="field prepend-icon">
                                  <input type="text" name="address" id="address"
                                         class="event-name gui-input br-light light"
                                          value="@if($editVendor != Null) {{$editVendor->address}} @endif" placeholder="Address">
                                  <label for="pro_name" class="field-icon">
                                      <i class="fa fa-tag"></i>
                                  </label>
                              </label>
                          </div>
                        </div>

                        <div class="section row">
                          <div class="col-md-6 ph10">
                              <label for="country" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Country</label>
                              <label for="country" class="field select">
                                  <select id="country" name="country">
                                    @if($editVendor->country == Null)
                                    <option value="" selected="selected">Country...</option>
                                    @elseif($editVendor->country != Null)
                                    <option selected="selected">@if($editVendor != Null){{$editVendor->country}} @endif</option>
                                    @endif

  	<option>Afghanistan</option>
  	<option>Albania</option>
  	<option>Algeria</option>
  	<option>Andorra</option>
  	<option>Antigua and Barbuda</option>
  	<option>Argentina</option>
  	<option>Armenia</option>
  	<option>Australia</option>
  	<option>Austria</option>
  	<option>Azerbaijan</option>
  	<option>Bahamas</option>
  	<option>Bahrain</option>
  	<option>Bangladesh</option>
  	<option>Barbados</option>
  	<option>Belarus</option>
  	<option>Belgium</option>
  	<option>Belize</option>
  	<option>Benin</option>
  	<option>Bhutan</option>
  	<option>Bolivia</option>
  	<option>Bosnia and Herzegovina</option>
  	<option>Botswana</option>
  	<option>Brazil</option>
  	<option>Brunei</option>
  	<option>Bulgaria</option>
  	<option>Burkina Faso</option>
  	<option>Burundi</option>
  	<option>Cambodia</option>
  	<option>Cameroon</option>
  	<option>Canada</option>
  	<option>Cape Verde</option>
  	<option>Central African Republic</option>
  	<option>Chad</option>
  	<option>Chile</option>
  	<option>China</option>
  	<option>Colombia</option>
  	<option>Comoros</option>
  	<option>Congo</option>
  	<option>Costa Rica</option>
  	<option>Cote d'Ivoire</option>
  	<option>Croatia</option>
  	<option>Cuba</option>
  	<option>Cyprus</option>
  	<option>Czech Republic</option>
  	<option>Denmark</option>
  	<option>Djibouti</option>
  	<option>Dominica</option>
  	<option>Dominican Republic</option>
  	<option>East Timor</option>
  	<option>Ecuador</option>
  	<option>Egypt</option>
  	<option>El Salvador</option>
  	<option>Equatorial Guinea</option>
  	<option>Eritrea</option>
  	<option>Estonia</option>
  	<option>opia">Ethiopia</option>
  	<option>Fiji</option>
  	<option>Finland</option>
  	<option>France</option>
  	<option>Gabon</option>
  	<option>>Gambia</option>
  	<option>Georgia</option>
  	<option>Germany</option>
  	<option>Ghana</option>
  	<option>Greece</option>
  	<option>Grenada</option>
  	<option>Guatemala</option>
  	<option>Guinea</option>
  	<option>Guinea-Bissau</option>
  	<option>Guyana</option>
  	<option>Haiti</option>
  	<option>Honduras</option>
  	<option>Hong Kong</option>
  	<option>Hungary</option>
  	<option>Iceland</option>
  	<option>India</option>
  	<option>>Indonesia</option>
  	<option>Iran</option>
  	<option>Iraq</option>
  	<option>Ireland</option>
  	<option>option>
    <option>Italy</option>
  	<option>Jamaica</option>
  	<option>Japan</option>
  	<option>Jordan</option>
  	<option>Kazakhstan</option>
  	<option>Kenya</option>
  	<option>Kiribati</option>
  	<option>North Korea</option>
  	<option>South Korea</option>
  	<option>Kuwait</option>
  	<option>Kyrgyzstan</option>
  	<option>Laos</option>
  	<option>Latvia</option>
  	<option>Lebanon</option>
  	<option>Lesotho</option>
  	<option>Liberia</option>
  	<option>Libya</option>
  	<option>Liechtenstein</option>
  	<option>Lithuania</option>
  	<option>Luxembourg</option>
  	<option>Macedonia</option>
  	<option>Madagascar</option>
  	<option>Malawi</option>
  	<option>>Malaysia</option>
  	<option>Maldives</option>
  	<option>Mali</option>
  	<option>Malta</option>
  	<option>Marshall Islands</option>
  	<option>Mauritania</option>
  	<option>Mauritius</option>
  	<option>Mexico</option>
  	<option>Micronesia</option>
  	<option>Moldova</option>
  	<option>Monaco</option>
  	<option>Mongolia</option>
  	<option>Montenegro</option>
  	<option>Morocco</option>
  	<option>Mozambique</option>
  	<option>Myanmar</option>
  	<option>Namibia</option>
  	<option>Nauru</option>
  	<option>Nepal</option>
  	<option>Netherlands</option>
  	<option>New Zealand</option>
  	<option>Nicaragua</option>
  	<option>Niger</option>
  	<option>Nigeria</option>
  	<option>Norway</option>
  	<option>Oman</option>
  	<option>Pakistan</option>
  	<option>Palau</option>
  	<option>Panama</option>
  	<option>Papua New Guinea</option>
  	<option>Paraguay</option>
  	<option>Peru</option>
  	<option>Philippines</option>
  	<option>Poland</option>
  	<option>Portugal</option>
  	<option>Puerto Rico</option>
  	<option>Qatar</option>
  	<option>Romania</option>
  	<option>Russia</option>
  	<option>Rwanda</option>
  	<option>Saint Kitts and Nevis</option>
  	<option>Saint Lucia</option>
  	<option>Saint Vincent and the Grenadines</option>
  	<option>Samoa</option>
  	<option>San Marino</option>
  	<option>Sao Tome and Principe</option>
  	<option>Saudi Arabia</option>
  	<option>Senegal</option>
  	<option>Serbia and Montenegro</option>
  	<option>Seychelles</option>
  	<option>Sierra Leone</option>
  	<option>Singapore</option>
  	<option>Slovakia</option>
  	<option>Slovenia</option>
  	<option>Solomon Islands</option>
  	<option>Somalia</option>
  	<option>South Africa</option>
  	<option>Spain</option>
  	<option>Sri Lanka</option>
  	<option>Sudan</option>
  	<option>Suriname</option>
  	<option>Swaziland</option>
  	<option>Sweden</option>
  	<option>Switzerland</option>
  	<option>Syria</option>
  	<option>Taiwan</option>
  	<option>Tajikistan</option>
  	<option>Tanzania</option>
  	<option>Thailand</option>
  	<option>Togo</option>
  	<option>Tonga</option>
  	<option>Trinidad and Tobago</option>
  	<option>Tunisia</option>
  	<option>Turkey</option>
  	<option>Turkmenistan</option>
  	<option>Tuvalu</option>
  	<option>Uganda</option>
  	<option>Ukraine</option>
  	<option>United Arab Emirates</option>
  	<option>>United Kingdom</option>
  	<option>United States</option>
  	<option>Uruguay</option>
  	<option>Uzbekistan</option>
  	<option>Vanuatu</option>
  	<option>Vatican City</option>
  	<option>Venezuela</option>
  	<option>Vietnam</option>
  	<option>Yemen</option>
  	<option>Zambia</option>
  	<option>Zimbabwe</option>


             </select>
                      <i class="arrow double"></i>
                              </label>
                          </div>
                          <div class="col-md-6 ph10">
                              <label for="url" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Url</label>
                              <label for="url" class="field prepend-icon">
                                  <input type="text" name="url" id="url"
                                         class="event-name gui-input br-light light"
                                          value="@if($editVendor != Null) {{$editVendor->url}} @endif" placeholder="Url">
                                  <label for="url" class="field-icon">
                                      <i class="fa fa-tag"></i>
                                  </label>
                              </label>
                          </div>
                        </div>

                        <div class="section row">
                          <div class="col-md-6 ph10">
                              <label for="cac" class="form-control-label" style="margin-bottom:05px;font-size:15px;">CAC No</label>
                              <label for="cac" class="field prepend-icon">
                                  <input type="text" name="cac" id="cac"
                                         class="event-name gui-input br-light light"
                                          value="@if($editVendor != Null) {{$editVendor->cac}} @endif" placeholder="CAC No">
                                  <label for="cac" class="field-icon">
                                      <i class="fa fa-edit"></i>
                                  </label>
                              </label>
                          </div>
                          <div class="col-md-6 ph10">
                              <label for="workforce" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Workforce</label>
                              <label for="workforce" class="field prepend-icon">
                                  <input type="text" name="workforce" id="workforce"
                                         class="event-name gui-input br-light light"
                                          value="@if($editVendor != Null) {{$editVendor->workforce}} @endif" placeholder="Workforce">
                                  <label for="workforce" class="field-icon">
                                      <i class="fa fa-edit"></i>
                                  </label>
                              </label>
                          </div>
                        </div>

                        <div class="section row">
                          <div class="col-md-6 ph10">
                              <label for="yearsofexp" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Years of Experience</label>
                              <label for="yearsofexp" class="field prepend-icon">
                                  <input type="text" name="yearsofexp" id="yearsofexp"
                                         class="event-name gui-input br-light light"
                                          value="@if($editVendor != Null) {{$editVendor->yearsofexp}} @endif" placeholder="Years of Experience">
                                  <label for="yearsofexp" class="field-icon">
                                      <i class="fa fa-edit"></i>
                                  </label>
                              </label>
                          </div>
                          <div class="col-md-6 ph10">
                              <label for="ratings" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Ratings</label>
                              <label for="ratings" class="field select">
                                  <select id="ratings" name="ratings">
                                    <option value="@if($editVendor != Null){{$editVendor->ratings}} @endif" selected="selected">
                                      <?php
                                        if ($editVendor->ratings == 1) {
                                          echo "Experts";
                                        }elseif ($editVendor->ratings == 2) {
                                          echo "Peofessional";
                                        }elseif ($editVendor->ratings == 3){
                                          echo "Technicians";
                                        }else {
                                          echo "Ratings...";
                                        }
                                       ?>
                                    </option>
                                    <option value="1">Experts</option>
                                    <option value="2">Peofessional</option>
                                    <option value="3">Technicians</option>

                                  </select>
                                  <i class="arrow double"></i>
                              </label>
                          </div>
                        </div>




                      </div>
                  </div>

              </div>
              <div style="margin-top:-5px" class="panel">
                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> Contact Person</span>
                </div>
                <div class="panel-body pn">
                    <div class="tab-content pn br-n allcp-form theme-primary">
                          <div class="section row">
                            <div class="col-md-12 ph10">
                                <label for="contactname" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Name</label>
                                <label for="contactname" class="field prepend-icon">
                                    <input type="text" name="contactname" id="contactname"
                                           class="event-name gui-input br-light light"
                                            value="@if($editVendor != Null) {{$editVendor->contactname}} @endif" placeholder="Contact Name">
                                    <label for="contactname" class="field-icon">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>
                            </div>
                          </div>

                          <div class="section row">
                            <div class="col-md-12 ph10">
                                <label for="contactemail" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Email</label>
                                <label for="contactemail" class="field prepend-icon">
                                    <input type="text" name="contactemail" id="contactemail"
                                           class="event-name gui-input br-light light"
                                            value="@if($editVendor != Null) {{$editVendor->contactemail}} @endif" placeholder="Contact Email">
                                    <label for="contactemail" class="field-icon">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>
                            </div>
                          </div>

                        </div>


                    </div>



                </div>
                <div style="margin-top:-5px" class="panel">
                  <div class="panel-heading">
                      <span class="panel-title hidden-xs"> MD/Chairman</span>
                  </div>
                  <div class="panel-body pn">
                      <div class="tab-content pn br-n allcp-form theme-primary">



                            <div class="section row">
                              <div class="col-md-12 ph10">
                                  <label for="chairmanname" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Name</label>
                                  <label for="chairmanname" class="field prepend-icon">
                                      <input type="text" name="chairmanname" id="chairmanname"
                                             class="event-name gui-input br-light light"
                                              value="@if($editVendor != Null) {{$editVendor->chairmanname}} @endif" placeholder="Chairman Name">
                                      <label for="chairmanname" class="field-icon">
                                          <i class="fa fa-tag"></i>
                                      </label>
                                  </label>
                              </div>
                            </div>
                            <div class="section row">
                              <div class="col-md-12 ph10">
                                  <label for="chairmanphone" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Phone</label>
                                  <label for="chairmanphone" class="field prepend-icon">
                                      <input type="text" name="chairmanphone" id="chairmanphone"
                                             class="event-name gui-input br-light light"
                                              value="@if($editVendor != Null) {{$editVendor->chairmanphone}} @endif" placeholder="Phone">
                                      <label for="chairmanphone" class="field-icon">
                                          <i class="fa fa-tag"></i>
                                      </label>
                                  </label>
                              </div>
                            </div>
                            <div class="section row">
                              <div class="col-md-12 ph10">
                                  <label for="chairmanemail" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Email</label>
                                  <label for="chairmanemail" class="field prepend-icon">
                                      <input type="text" name="chairmanemail" id="chairmanemail"
                                             class="event-name gui-input br-light light"
                                              value="@if($editVendor != Null) {{$editVendor->chairmanemail}} @endif" placeholder="Email">
                                      <label for="chairmanemail" class="field-icon">
                                          <i class="fa fa-tag"></i>
                                      </label>
                                  </label>
                              </div>
                            </div>





                          </div>
                      </div>

                  </div>

                  <div style="margin-top:-5px" class="panel">
                    <div class="panel-heading">
                        <span class="panel-title hidden-xs"> For Profile</span>
                    </div>
                    <div class="panel-body pn">
                        <div class="tab-content pn br-n allcp-form theme-primary">


                              <div class="section row">
                                      <div class="col-md-12 ph10">
                                       <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail mb20">
                                            <img src="{{asset($editVendor->company_banner)}}">
                                       </div>
                                        <div class="row">
                                            <div class="col-xs-12 ph10">
                                                <span class="button btn-primary btn-file btn-block">
                                                  <span class="fileupload-new">Select Banner Image</span>
                                                  <span class="fileupload-exists">Change Banner Image</span>
                                                  <input value="{{$editVendor->company_banner}}" type="file" name="company_banner">
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                              </div>
                              <div class="section row">


                                    <div class="col-md-4 ph10">
                                        <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail mb20">
                                                <img src="{{asset($editVendor->company_img_1)}}">
                                           </div>
                                            <div class="row">
                                                <div class="col-xs-12 ph10">
                                                    <span class="button btn-primary btn-file btn-block">
                                                      <span class="fileupload-new">Select Photo 1</span>
                                                      <span class="fileupload-exists">Change</span>
                                                      <input value="{{$editVendor->company_img_1}}" type="file" name="company_img_1">
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ph10">
                                        <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail mb20">
                                                <img src="{{asset($editVendor->company_img_2)}}">
                                           </div>
                                            <div class="row">
                                                <div class="col-xs-12 ph10">
                                                    <span class="button btn-primary btn-file btn-block">
                                                      <span class="fileupload-new">Select Photo 2</span>
                                                      <span class="fileupload-exists">Change</span>
                                                      <input value="{{$editVendor->company_img_2}}" type="file" name="company_img_2">
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ph10">
                                        <div class="fileupload fileupload-new allcp-form" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail mb20">
                                                <img src="{{asset($editVendor->company_img_3)}}">
                                           </div>
                                            <div class="row">
                                                <div class="col-xs-12 ph10">
                                                    <span class="button btn-primary btn-file btn-block">
                                                      <span class="fileupload-new">Select Photo 3</span>
                                                      <span class="fileupload-exists">Change</span>
                                                      <input value="{{$editVendor->company_img_3}}" type="file" name="company_img_3">
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                              <div class="section row">
                                <div class="col-md-6 ph10">
                                    <label for="established_year" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Established Year</label>
                                    <label for="established_year" class="field prepend-icon">
                                        <input type="text" name="established_year" id="established_year"
                                               class="event-name gui-input br-light light"
                                                value="@if($editVendor != Null) {{$editVendor->established_year}} @endif" placeholder="Established Year">
                                        <label for="established_year" class="field-icon">
                                            <i class="fa fa-tag"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="col-md-6 ph10">
                                    <label for="annual_revenue" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Annual Revenue</label>
                                    <label for="annual_revenue" class="field prepend-icon">
                                        <input type="text" name="annual_revenue" id="annual_revenue"
                                               class="event-name gui-input br-light light"
                                                value="@if($editVendor != Null) {{$editVendor->annual_revenue}} @endif" placeholder="Annual Revenue">
                                        <label for="annual_revenue" class="field-icon">
                                            <i class="fa fa-tag"></i>
                                        </label>
                                    </label>
                                </div>
                              </div>
                              <div class="section row">
                                <div class="col-md-6 ph10">
                                    <label for="main_products" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Main Products</label>
                                    <label for="main_products" class="field prepend-icon">
                                        <input type="text" name="main_products" id="main_products"
                                               class="event-name gui-input br-light light"
                                                value="@if($editVendor != Null) {{$editVendor->main_products}} @endif" placeholder="Main Products">
                                        <label for="main_products" class="field-icon">
                                            <i class="fa fa-tag"></i>
                                        </label>
                                    </label>
                                </div>

                                <div class="col-md-6 ph10">
                                    <label for="main_market" class="form-control-label" style="margin-bottom:05px;font-size:15px;">Main Markets</label>
                                    <label for="main_market" class="field prepend-icon">
                                        <input type="text" name="main_market" id="main_market"
                                               class="event-name gui-input br-light light"
                                                value="@if($editVendor != Null) {{$editVendor->main_market}} @endif" placeholder="Main Market">
                                        <label for="main_market" class="field-icon">
                                            <i class="fa fa-tag"></i>
                                        </label>
                                    </label>
                                </div>
                              </div>
                              <div class="section row">
                                <button type="submit" class="btn btn-info btn-block" name="button"><i class="fa fa-edit"></i>  Update</button>
                              </div>





                            </div>
                        </div>

                    </div>


                    </div>
                  </div>


                  </div>
                </div>




                </div>
              </div>



              </div>
            </div>




        </div>

         </form>



    </div>



</section>


</section>

@endsection
