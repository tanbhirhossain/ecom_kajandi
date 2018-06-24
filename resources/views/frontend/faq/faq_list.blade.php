@extends('frontend.front_view.front_master')
@section('page-title','FAQ')
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

                @foreach($show_faq as $faq)
                    <article class="product-page-qa">
                        <div class="product-page-qa-question">
                            <p class="product-page-qa-text">{{$faq->question}}</p>
                            <p class="product-page-qa-meta">asked by {{$faq->name}} on {{$faq->qs_time}}</p>
                        </div>
                        <div class="product-page-qa-answer">
                            <p class="product-page-qa-text">{{$faq->answer}}</p>
                            <p class="product-page-qa-meta">answered on {{$faq->ans_time}}</p>
                        </div>
                    </article>
                @endforeach

					</div>
                </div>
            </div>

            <div class="gap"></div>

            <div class="row">
                <div class="col-md-6">
                    <p class="category-pagination-sign"></p>
                </div>
                <div class="col-md-6">
                    <nav>
                        <ul class="pagination category-pagination pull-right">
                            {{ $show_faq->links() }}
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
