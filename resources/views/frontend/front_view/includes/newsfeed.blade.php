<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
              <form action="{{route('saveEmail')}}" method="post">@csrf
                <div class="single">
                    <p>Trade Alert - Delivering the latest product trends and industry news straight to your inbox</p>
                    <small>
                        <h3 class="text-center  alert-success">{{Session::get('message_success')}}</h3>
                        <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                    </small>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong style="color:red">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">

                        <span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Subscribe</button>
						</span>
                    </div>
                    <p class="subs-info">We’ll never share your email address with a third-party.</p>
                </div>
              </form>
            </div>
        </div>

        <div class="row" data-gutter="10">
          <?php
              $sec_1 = App\FooterPage::where('id', 1)->first();
              $sec_2 = App\FooterPage::where('id', 2)->first();
              $sec_3 = App\FooterPage::where('id', 3)->first();
              $sec_4 = App\FooterPage::where('id', 4)->first();
              $sec_5 = App\FooterPage::where('id', 5)->first();

              $link_1 = App\PageLink::where('section_id', 1)->get();
              $link_2 = App\PageLink::where('section_id', 2)->get();
              $link_3 = App\PageLink::where('section_id', 3)->get();
              $link_4 = App\PageLink::where('section_id', 4)->get();
              $link_5 = App\PageLink::where('section_id', 5)->get();
           ?>
           @if($sec_1 != Null)
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">{{$sec_1->section_name}}</h4>
                <ul class="footer-sub-menu">
                    @foreach($link_1 as $li)
                    <li><a href="{{$li->link_url}}">{{$li->link_title}}</a>
                    @endforeach

                </ul>

            </div>
            @endif


          @if($sec_2 != Null)
            <div class="col-md-3 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">{{$sec_2->section_name}}</h4>

                <ul class="footer-sub-menu">
                    @foreach($link_2 as $li)
                    <li><a href="{{$li->link_url}}">{{$li->link_title}}</a>
                    @endforeach

                </ul>

            </div>
          @endif

           @if($sec_3 != Null)
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">{{$sec_3->section_name}}</h4>

                <ul class="footer-sub-menu">
                    @foreach($link_3 as $li)
                    <li><a href="{{$li->link_url}}">{{$li->link_title}}</a>
                    @endforeach

                </ul>

            </div>
           @endif

           @if($sec_4 != Null)
            <div class="col-md-3 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">{{$sec_4->section_name}}</h4>

                <ul class="footer-sub-menu">
                    @foreach($link_4 as $li)
                    <li><a href="{{$li->link_url}}">{{$li->link_title}}</a>
                    @endforeach

                </ul>

            </div>
           @endif

           @if($sec_5 != Null)
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">{{$sec_5->section_name}}</h4>

                <ul class="footer-sub-menu">
                    @foreach($link_5 as $li)
                    <li><a href="{{$li->link_url}}">{{$li->link_title}}</a>
                    @endforeach
                </ul>
            </div>
           @endif





          <!--  <div class="col-md-3 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">Buy on Alibaba.com</h4>
                <ul class="footer-sub-menu">
                    <li><a href="#">Help Center</a>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">About Us</h4>
                <ul class="footer-sub-menu">
                    <li><a href="#">Help Center</a>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">Sell on Alibaba.com</h4>
                <ul class="footer-sub-menu">
                    <li><a href="#">Help Center</a>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="footer-title">Trade Services</h4>
                <ul class="footer-sub-menu">
                    <li><a href="#">Help Center</a>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                </ul>
            </div> -->
        </div>

    </div>
</section>
