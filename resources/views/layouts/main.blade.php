<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{ URL::to('/') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Font Kit-->
    <script src="https://use.typekit.net/fbm5cel.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {{--<link href="/css/source/main.css" rel="stylesheet">--}}
    {{--<link href="/css/cpe.custom.css" rel="stylesheet">--}}



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
    @if(App::environment('production'))
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MKJ4BZ');</script>
    <!-- End Google Tag Manager -->
    @endif
    
</head>
<body id="background">
	
@if(App::environment('production'))
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKJ4BZ"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@endif
	
<div class="gray-bar"></div>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">



        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="http://www.centerpointenergyretail.com">
                {{--{{ config('app.name', 'Laravel') }}--}}
                <img src="images/logo.jpg">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest() && App::environment('staging'))
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @elseif (Auth::guest() && App::environment('production'))
                    <li><a href="http://www.centerpointenergyretail.com">HOME</a></li>
                    <li><a href="http://www.centerpointenergyretail.com/about">ABOUT US</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            AREAS WE SERVE <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="http://www.centerpointenergyretail.com/signup">
                                    California
                                </a>
                                <a href="http://www.centerpointenergyretail.com/signup">
                                    Michigan
                                </a>
                                <a href="http://www.centerpointenergyretail.com/nebraska">
                                    Nebraska
                                </a>
                                <a href="http://www.centerpointenergyretail.com/signup">
                                    Ohio
                                </a>
                                <a href="http://www.centerpointenergyretail.com/wyoming">
                                    Wyoming
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://www.centerpointenergyretail.com/contact">CONTACT US</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

<!--Frameworks-->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.js"></script>--}}

<!--Helpers-->
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>--}}



<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 pull-left">
                <p><small>Copyright © 2017 CenterPoint Energy</small></p>
            </div>
            <div class="col-lg-3 pull-right">
                <a target="_blank" href="http://www.centerpointenergy.com/en-us/corporate/legal/privacy-policy">Privacy</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a target="_blank" href="http://www.centerpointenergy.com/en-us/corporate/legal/terms-of-use">Terms &amp; Conditions</a>
            </div>
        </div><!--end of row-->
    </div><!--end of container-->
</footer>


<script src="/js/app.js"></script>







</body>
</html>
