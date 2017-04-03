<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OLE</title>
        {{--Links--}}
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css">
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
                background: url('img/bg.jpg') center center no-repeat;
                background-size: cover;
            }

            .logo{
                height: 50px;
                width: 50px;
            }

            .overlay{
                background-color: rgba(0,0,0,0.5);
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
            }

            .links > a {
                color: #eee;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 900;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links > a:hover {
                color: #fff;
                border-bottom: 1px solid #f36557;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height overlay">
            <div class="links top-left">
                <a href="https://laravel.com/docs">Home</a>
                <a href="https://laracasts.com">About</a>
                <a href="https://github.com/laravel/laravel">Blog</a>
                <a href="https://laravel-news.com">Contact Us</a>
            </div>
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
                <div class="title m-b-md">
                    <div><img src="{{asset('img/logo.png')}}" alt="logo" class="logo animated bounce"><div>
                    Online Learning and Examination
                </div>
            </div>
        </div>
    </body>
</html>
