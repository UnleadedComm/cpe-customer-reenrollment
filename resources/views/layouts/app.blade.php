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

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/source/main.css" rel="stylesheet">
    <link href="/css/cpe.custom.css" rel="stylesheet">



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="background">
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
                <a class="navbar-brand" href="{{ url('/') }}">
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
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
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

    <script src="/js/vue.js"></script>
    <script src="/js/cpe.custom.js"></script>

    <!-- Scripts -->
    {{--<script src="/js/app.js"></script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>

    <script>
        $(function(){

            $('.offer-col').matchHeight();

            $('#sameas').click(function(){

                if($(this).is(':checked')){

                    $("#MailingAddress").val($("#ServiceAddress").val());
                    $("#MailingCity").val($("#ServiceCity").val());
                    $("#MailingState").val($("#ServiceState").val());
                    $("#MailingZip").val($("#ServiceZip").val());

                } else {

                    $("#MailingAddress").val("");
                    $("#MailingCity").val("");
                    $("#MailingState").val("");
                    $("#MailingZip").val("");

                }

            });


            if($('.alert').length) {
                $('html, body').animate({
                    scrollTop: $(".alert").offset().top
                }, 1000);
            }

            var contactFormWrapper = $('#contact-form-wrap');

            $('.btn-add-contact').click(function(){

                $(this).fadeOut('fast', function(){

                    contactFormWrapper.slideDown('slow');
                    $('html, body').animate({
                        scrollTop: contactFormWrapper.offset().top
                    }, 1000);

                });

            });

            $('.btn-cancel').click(function(){

                contactFormWrapper.slideUp('slow', function () {

                    $('.btn-add-contact').fadeIn('fast');

                    $("#FirstName").val("");
                    $("#LastName").val("");
                    $("#Initial").val("");
                    $("#Suffix").val("");
                    $("#Email").val("");
                    $("#Phone").val("");
                    $("#Relationship").val("");
                });




            });

            if($('.open-update-form').length){

                $('.btn-add-contact').trigger('click');


            }

            if($('.open-primary-contact-form')){

                $('html, body').animate({
                    scrollTop: contactFormWrapper.offset().top
                }, 1000);

            }



        });


    </script>


</body>
</html>
