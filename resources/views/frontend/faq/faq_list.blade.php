@extends('frontend.front_view.front_master')
@section('page-title','Single Product')
@section('main_content')
<div class="container">

            <div class="row">
                <div class="col-md-12">
                    <header class="page-header">
                        <h1 class="page-title">Frequently Asked Question</h1>
                    </header>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                    <form class="product-page-qa-form" action="{{route('postQuestion')}}" method="post">@csrf
                      <small>
                          <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                          <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                      </small>
                      <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <div class="row" data-gutter="10">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input class="form-control" name="question" id="myInput" onkeyup="myFunction()" type="text" placeholder="Have a question? Feel free to ask.">
                                </div>
                                @if ($errors->has('question'))
                                    <span style="color:red" class="invalid-feedback">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input class="btn btn-primary btn-block" type="submit" value="Ask">
                            </div>
                        </div>
                    </form>
					<div id="myUL">
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">Is this the 6.6 inch screen?</p>
                            <p class="product-page-qa-meta">asked by Richard Jones on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">No, this is the 6.4 inch screen</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">for those who owns this model phone in USA, may I know if this phone has the 4G LTE in Tmobile's network? Thank you in advance.</p>
                            <p class="product-page-qa-meta">asked by Joseph Hudson on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">Yes. can use TMobile LTE 1700MHZ.</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">I'm from Puerto Rico! this phone work for me???</p>
                            <p class="product-page-qa-meta">asked by Neil Davidson on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">Yes... It will work with any gsm radio system in the world... It does not work, however on any cdma radio system...</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">so this phone works on tmobile current network ll i have to do is switch the sim card?</p>
                            <p class="product-page-qa-meta">asked by Blake Hardacre on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">the phone works fine with T-mobile's 4G LTE network, all you have to do is get a micro-sim card and insert it to start using your phone, if you already have a micro-sim sized card then just plug in.</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">does it work on the boost mobile network?</p>
                            <p class="product-page-qa-meta">asked by John Mathis on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">It only works on gms networks so you have to check I think boost mobile is cmd network like verizon towers not sure</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">Is this version waterproof?</p>
                            <p class="product-page-qa-meta">asked by Brandon Burgess on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">All Sony Xperia z lines are water proof the Sony Xperia z1,z2,z3,z ultra all of those</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">how strong is the phone..does the screen crack easily ?</p>
                            <p class="product-page-qa-meta">asked by Blake Abraham on 08/14/2015</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">Is strong enough to keep running even if it drops a few times, but I reckon if you kick it it Will smash, as any smartphone in the World. I had it for 3 months and it hasn't got a scratch.</p>
                            <p class="product-page-qa-meta">answered on 08/14/2015</p>
                        </div>
                    </article>
					</div>
                </div>
            </div>

            <div class="gap"></div>

            <div class="row">
                <div class="col-md-6">
                    <p class="category-pagination-sign">Customer Q&amp;A. Showing 1 - 12</p>
                </div>
                <div class="col-md-6">
                    <nav>
                        <ul class="pagination category-pagination pull-right">
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li class="last"><a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="gap"></div>
        </div>
<script>
function myFunction() {
    var input, filter, div, article, div, p, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myUL");
    article = div.getElementsByTagName("article");
    for (i = 0; i < article.length; i++) {
        p = article[i].getElementsByTagName("p")[0];
        if (p.innerHTML.toUpperCase().indexOf(filter) > -1) {
            article[i].style.display = "";
        } else {
            article[i].style.display = "none";

        }
    }
}
</script>
@endsection
