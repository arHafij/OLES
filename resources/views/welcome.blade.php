<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OLE</title>
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background: url('/img/bg.jpg');

                /*background: url('/img/bg.jpg') center center no-repeat;*/
                /*background-size: cover;*/
            }

            .logo span{
                font-size: 20px;
                color:#000;
            }
            .title-element{
              -webkit-animation-duration: 3s;
              -webkit-animation-delay: 1s;
              /*-webkit-animation-iteration-count: infinite;*/
            }

            .overlay{
                /*background-color: rgba(0,0,0,0.5);*/
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }


            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
                color:#d35400;
            }

            .links > a {
                color: #000;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 900;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links > a:hover,.logo span:hover {
                color: #d35400;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height overlay">
            <!-- <div class="links top-left">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="h#">Blog</a>
                <a href="#">Contact Us</a>
            </div> -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md animated fadeIn">
                    <div class="logo">
                        <span class="glyphicon glyphicon-grain" aria-hidden="true">OLE</span>
                    <div>
                    <div class="title-element animated fadeIn">Online Learning and Examination</div>
                </div>
            </div>
        </div>
    </body>
</html>
