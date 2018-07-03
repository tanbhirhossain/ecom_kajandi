
@extends('frontend.front_view.front_master')
@section('page-title','Cart Product')
@section('main_content')
    <style type="text/css">
        .error_page {
            padding:120px 0;

        }
        .error_page h1{
            font-size: 6em;
            color:#ce3f51;
        }
        .error_page p{
            font-size: 18px;
        }
        .error_page h4{
            font-size: 25px;
            animation: move 3s linear infinite;
        }

        @keyframes move{
            0%{
                transform: translateX(120px);
            }
            25%{
                transform: translateX(0);
            }
            50%{
                transform: translateX(-120px);
            }
            75%{
                transform: translateX(0);
            }
            100%{
                transform: translateX(120px);
            }
        }
        @media (max-width: 768px){
            .error_page {
                padding:80px 0;

            }
            .error_page h1{
                font-size: 4em;
            }
            .error_page p{
                font-size: 16px;
            }
            .error_page h4{
                font-size: 22px;
                animation: move 3s linear infinite;
            }

            @keyframes move{
                0%{
                    transform: translateX(40px);
                }
                25%{
                    transform: translateX(0);
                }
                50%{
                    transform: translateX(-40px);
                }
                75%{
                    transform: translateX(0);
                }
                100%{
                    transform: translateX(40px);
                }
            }
        }
    </style>
    <div class="container text-center">
        <div class="error_page">
            <h1>OPPS-404 Error</h1>
            <p>We Are Really Sorry,We cant find Anything Relavent with your Request!</p>
            <h4>Please Try Again!</h4>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function() {
            $(".list_hide_show").click(function(){
                $(".rqf_list_hover").toggle();
            });
            $(".other_rqf_toggle").click(function(){
                $(".other_rqf_hidden").toggle();
            });

        });
    </script>
    @endsection