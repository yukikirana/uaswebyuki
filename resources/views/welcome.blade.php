<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-image: url("/konoha.jpg");
                color: #ffffff;
                font-family: 'sans-serif', sans-serif;
                font-weight: 200;
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    <strong>Ju-Mik</strong>
                    <hr>
                </div>
            <div class="">

                <a href="{{ route('login')}}" class="btn btn-lg btn-success">LOG IN</a>
                <a href="{{ route('register')}}" class="btn btn-lg btn-success">REGISTER</a>
                <a href="{{ route('products.index')}}" class="btn btn-lg btn-success">PRODUCTS</a>
                    
            </div>
        </div>
    </body>
</html>
