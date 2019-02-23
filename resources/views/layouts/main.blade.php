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


<!--Navigation-->
<div class="navigation navik-header navik-mega-menu mega-menu-fullwidth header-shadow clearfix">
    <div class="container">

        <!-- Header -->
        <div class="navik-header-container">

            <!--Logo-->
            <div class="logo pl-0" data-mobile-logo="images/logo.jpg" data-sticky-logo="images/logo.jpg">
                <a href="http://www.centerpointenergyretail.com/"><img src="images/logo.jpg" alt="CenterPoint Energy Logo"/></a>
            </div>

            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>

            <!--Navigation menu-->
            <nav class="navik-menu menu-caret submenu-top-border">
                <ul>
                    <li><a href="http://www.centerpointenergyretail.com/">Home</a></li>
                    <li><a href="http://www.centerpointenergyretail.com/about">About</a></li>
                    <li class="mega-menu"><a href="http://www.centerpointenergyretail.com/service-areas">Service Areas</a>
                        <ul>
                            <li>
                                <div class="mega-menu-container">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mega-menu-box">

                                                <ul class="mega-menu-list text-right pl-0">
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/illinois">Illinois</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/michigan">Michigan</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/ohio">Ohio</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/nebraska">Nebraska</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/wyoming">Wyoming</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-areas/california">California</a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-menu"><a href="http://www.centerpointenergyretail.com/service-type">Service Type</a>
                        <ul>
                            <li>
                                <div class="mega-menu-container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mega-menu-box">

                                                <ul class="mega-menu-list text-right pl-0">
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-type/residential">Residential</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-type/small-business">Small Business</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-type/large-commercial">Large Commercial</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/service-type/agriculture">Agriculture</a>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://www.centerpointenergyretail.com/plans">Plans</a></li>
                    <li class="mega-menu"><a href="http://www.centerpointenergyretail.com/resources">Resources</a>
                        <ul>
                            <li>
                                <div class="mega-menu-container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mega-menu-box">
                                                <ul class="mega-menu-list text-right pl-0">
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/resources/faqs">FAQs</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/resources/energy-saving-tips">Energy Saving Tips</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/resources/moving-tips">Moving Tips</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/resources/natural-gas-explained">Natural Gas Explained</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://www.centerpointenergyretail.com/resources/energy-brokers">Energy Brokers</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="http://www.centerpointenergyretail.com/contact-us">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!--END-->

@yield('content')


<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>


<!--Footer-->
<footer class="bg--dark-gray pt-4 mt-5">
    <div class="container">

        <!--Top-->
        <div class="row mb-3">

            <!--Left-->
            <div class="col-12 col-lg-auto text-center mr-auto">
                <ul>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/">Home</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/about">About</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/service-areas">Service Areas</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/service-type">Service Type</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/plans">Plans</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/resources">Resources</a>
                    </li>
                    <li>
                        <a href="http://www.centerpointenergyretail.com/contact-us">Contact Us</a>
                    </li>
                </ul>
            </div>

            <!--Right-->
            <div class="col-12 col-lg-auto text-center ml-auto">
                <a href="http://www.centerpointenergy.com" target="_blank">Corporate Website</a>
            </div>

        </div>
        <!--END-->

        <!--Bottom-->
        <div class="row">

            <!--Left-->
            <div class="col-12 col-lg-auto text-center mr-auto">
                <span>Copyright &copy; 2018 CenterPoint Energy</span>
            </div>
            <!--END-->

            <!--Right-->
            <div class="col-12 col-lg-auto text-center ml-auto">
                <ul>
                    <li>
                        <a href="https:http://www.centerpointenergy.com/en-us/corporate/legal/privacy-policy" target="_blank"><small>Privacy</small></a>
                    </li>
                    <li>
                        <a href="https:http://www.centerpointenergy.com/en-us/corporate/legal/terms-of-use" target="_blank"><small>Terms &amp; Conditions</small></a>
                    </li>
                </ul>
            </div>
            <!--END-->

        </div>
        <!--END-->

    </div>
</footer>
<!--END-->





<script src="/js/app.js"></script>


<script>
    var versaTag = {};
    versaTag.id = "10131";
    versaTag.sync = 0;
    versaTag.dispType = "js";
    versaTag.ptcl = "HTTPS";
    versaTag.bsUrl = "bs.serving-sys.com/BurstingPipe";
    versaTag.activityParams = {

        "OrderID":"","Session":"","Value":"","productid":"","productinfo":"","Quantity":""

    };

    versaTag.retargetParams = {};
    versaTag.dynamicRetargetParams = {};
    versaTag.conditionalParams = {};
</script>
<script id="ebOneTagUrlId" src="https://secure-ds.serving-sys.com/SemiCachedScripts/ebOneTag.js"></script>
<noscript>
    <iframe src="https://bs.serving-sys.com/BurstingPipe?
cn=ot&amp;
onetagid=10131&amp;
ns=1&amp;
activityValues=$$Value=[Value]&amp;OrderID=[OrderID]&amp;Session=[Session]&amp;ProductID=[ProductID]&amp;ProductInfo=[ProductInfo]&amp;Quantity=[Quantity]$$&amp;
retargetingValues=$$$$&amp;
dynamicRetargetingValues=$$$$&amp;
acp=$$$$&amp;"
            style="display:none;width:0px;height:0px"></iframe>
</noscript>




</body>
</html>
