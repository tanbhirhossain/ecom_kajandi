<footer class="main-footer">
    <div class="container">


        <div class="row" id="app">
            <?php
            $download_link = DB::table('android_iphones')->where('id',1)->first();
            ?>
            <div class="col-md-6 col-sm-6">
                <div class="app-txt">
                    <span class="donload-text">Download:</span>
                    <span class="app-image"><a href="@if($download_link !=Null){{$download_link->iphone}} @endif" data-target="_blank"><img src="{{asset('public/frontend/img/')}}/app-store.png" alt="apple store"></a></span>
                    <span class="app-image"><a href="@if($download_link !=Null){{$download_link->android}} @endif" data-target="_blank"><img src="{{asset('public/frontend/img/')}}/play-store.png" alt="apple store"></a></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="app-txt">
                    <span class="donload-text">Download TradeManager:</span>
                    <span class="app-image"><a href="@if($download_link !=Null){{$download_link->trade_manager}} @endif" data-target="_blank"><img src="{{asset('public/frontend/img/')}}/trend.png" alt="apple store"></a></span>

                </div>
            </div>

        </div>

        <div class="row" >
            <div class="col-md-4 col-sm-4">
                <h4 class="widget-title-sm">Kajandi Shop</h4>
                <p>Our Social Platform, Join our social network team........</p>
                <ul class="main-footer-social-list">
                    <?php
                    $social_link = DB::table('socials')->where('id',1)->first();
                    ?>
                    <li>
                        <a class="fa fa-facebook" href="@if($download_link !=Null){{$social_link->facebook}} @endif"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter" href="@if($download_link !=Null){{$social_link->twitter}} @endif"></a>
                    </li>
                    <li>
                        <a class="fa fa-pinterest" href="@if($download_link !=Null){{$social_link->pinterest}} @endif"></a>
                    </li>
                    <li>
                        <a class="fa fa-instagram" href="@if($download_link !=Null){{$social_link->instagram}} @endif"></a>
                    </li>
                    <li>
                        <a class="fa fa-google-plus" href="@if($download_link !=Null){{$social_link->google_plus}} @endif"></a>
                    </li>
                </ul>
            </div>
            <!--   <div class="col-md-4 col-sm-4">
                   <h4 class="widget-title-sm">Popular Tags</h4>
                   <ul class="main-footer-tag-list">
                       <li><a href="#">New Season</a>
                       </li>
                       <li><a href="#">Watches</a>
                       </li>
                       <li><a href="#">woman</a>
                       </li>
                       <li><a href="#">classic</a>
                       </li>
                       <li><a href="#">modern</a>
                       </li>
                       <li><a href="#">blue</a>
                       </li>
                       <li><a href="#">shoes</a>
                       </li>
                       <li><a href="#">running</a>
                       </li>
                       <li><a href="#">jeans</a>
                       </li>
                       <li><a href="#">sports</a>
                       </li>
                       <li><a href="#">laptops</a>
                       </li>
                   </ul>
               </div> -->
            <div class="col-md-4"></div>
            <div class="col-md-4 col-sm-4">
                <h4 class="widget-title-sm">Contact us</h4>
                <div class="footer-contact">
                    <p><i class="fa fa-map-marker"></i>London C/45, Eastern Housing, Mirpur-1200</p>
                    <p><i class="fa fa-phone"></i>012-3456789</p>
                    <p><i class="fa fa-envelope-open"></i>info@kajdia.com</p>
                </div>

            </div>
        </div>
        <ul class="main-footer-links-list">
            <li><a href="#">About Us</a>
            </li>
            <li><a href="#">Blog</a>
            </li>
            <?php
            $pages = DB::table('page_models')->get();
            ?>
            @foreach($pages as $page)

                <li><a href="{{route('page-view',$page->id)}}">{{$page->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-text">Copyright &copy; <a href="http://r25n.com">R25N Technology</a> 2018.  All rights reserved</p>
            </div>


            <div class="col-md-6">
                <ul class="payment-icons-list">
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/visa-straight-32px.png" alt="Image Alternative text" title="Pay with Visa" />
                    </li>
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/mastercard-straight-32px.png" alt="Image Alternative text" title="Pay with Mastercard" />
                    </li>
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/paypal-straight-32px.png" alt="Image Alternative text" title="Pay with Paypal" />
                    </li>
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/visa-electron-straight-32px.png" alt="Image Alternative text" title="Pay with Visa-electron" />
                    </li>
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/maestro-straight-32px.png" alt="Image Alternative text" title="Pay with Maestro" />
                    </li>
                    <li>
                        <img src="{{asset('public/frontend/img/')}}/payment/discover-straight-32px.png" alt="Image Alternative text" title="Pay with Discover" />
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
{{--Datable Script Start--}}
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/datatables.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/jszip.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/pdfmake.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/vfs_fonts.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.html5.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.print.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="{{asset('public/backend/assets/')}}/js/lib/data-table/datatables-init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>
<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/frontend/js/selectize.js')}}"></script>
<script src="{{asset('public/frontend/js/icheck.js')}}"></script>
<script src="{{asset('public/frontend/js/ionrangeslider.js')}}"></script>
<script src="{{asset('public/frontend/js/jqzoom.js')}}"></script>
<script src="{{asset('public/frontend/js/card-payment.js')}}"></script>
<script src="{{asset('public/frontend/js/owl-carousel.js')}}"></script>
<script src="{{asset('public/frontend/js/magnific.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
<script src="{{asset('public/frontend/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/')}}/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/')}}/dataTables.bootstrap.min.js"></script>
<script src="{{asset('public/frontend/js/')}}/star-rating.min.js" type="text/javascript"></script>
<script src="{{asset('public/frontend/js/')}}/locales/de.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-region-dropdown-menu/1.2.1/geodatasource-cr.min.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function(){
        $('.input-3').rating({displayOnly: true, step: 0.1});
    });
</script>
{{--Ck Editor Script--}}
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<link rel="stylesheet" href="{{asset('public/frontend/css/new-css.css')}}">

<script src="{{asset('public/frontend/js/new-script.js')}}" charset="utf-8"></script>
<script>
    // $('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>

{{--Ck Editor Script--}}
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
    // $('textarea').ckeditor();
    $('.textarea').ckeditor(); // if class is prefered.
</script>



</body>



</html>
