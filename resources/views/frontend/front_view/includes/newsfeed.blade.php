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
            <div class="col-md-2 col-sm-4 col-xs-6">
                <h4 class="widget-title-sm">Customer Services</h4>
                <ul class="footer-sub-menu">
                    <li><a href="#">Help Center</a>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Report Abuse</a></li>
                    <li><a href="#">Submit a Dispute</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-6">
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
            </div>
        </div>

    </div>
</section>
