<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Commerce @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
</head>
<body>
<header id="header">
    <div class="container-fluid">
        <div class="logo float-left">
            <h1 class="text-dark"><a href="/"><i class="bx text-dark bx-cart"></i><span class="text-dark">ECP</span></a></h1>
        </div>
        <span class="nav-toggle drop-down">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="bx bx-user"> {{ Auth::user()->name }}</i> </a>
            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
            <a class="dropdown-item bg-dark " href="{{route('show_cart')}}" style="padding: 10px"> <i class="bx bxs-cart"> My Cart</i> </a>
            <a class="dropdown-item bg-dark " href="{{route('logout')}}" style="padding: 10px"> <i class="bx bx-power-off"> Logout</i> </a>
            </div>
        </span>
    </div>
</header>
<section id="base">
    <div class="base-container">
        <h1>E-Commerce</h1>
        <h2> Scroll And Shopping <i class="bx bx-shopping-bag"></i></h2>
        @yield('screen')
    </div>
</section>
<a id="topbutton"> ➤ </a>
    <div id="container">
        <div class="row">
            @if(Request::is('home'))
            <div class="col-md-8"style="padding:50px">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield('pathbar')
                    </ol>
                </nav>
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('message')}}
                </div>
            @endif
            @yield('content')
            </div>
            <div class="col-md-4" style="padding:50px">
                @include('inc.sidebar')
            </div>
                @else
                <div style="padding:50px;width: 100%">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('pathbar')
                        </ol>
                    </nav>
                    @yield('content')
                </div>
            @endif
        </div>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Ecommerce Section 2</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Supervisor <b>Prof Islam Tag El-din</b> <br>
                Supervisor <b>Prof Mina Nagy</b>
            </div>
        </div>
    </footer>

</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    var btn = $('#topbutton');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
</script>
