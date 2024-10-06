<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>{{ Settings::get('app_alias') }} | @yield('PageTitle')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Veri.DP">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="Veri Data Protection">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/images/apple-touch-icon-114x114.png') }}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendors.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icon.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/demos/seo-agency/seo-agency.css') }}" />
    @yield('PageVendorCSS')
    @yield('PageCustomCSS')
</head>
    <body data-mobile-nav-style="full-screen-menu" data-mobile-nav-bg-color="#2a2b3f" class="custom-cursor">

<!-- start cursor -->
<div class="cursor-page-inner">
    <div class="circle-cursor circle-cursor-inner"></div>
    <div class="circle-cursor circle-cursor-outer"></div>
</div>
<!-- end cursor -->

<!-- start header -->
<header>
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg bg-transparent header-light header-reverse glass-effect" data-header-hover="light">
        <div class="container-fluid">
            <div class="col-auto">
                <a class="navbar-brand" href="{{ route('Frontend.Home') }}" style="padding-top: 15px !important;">
                    <img src="{{ asset('assets/frontend/custom/images/logo.png') }}" data-at2x="{{ asset('assets/frontend/images/demo-seo-agency-logo-black@2x.png') }}" style="max-height: 120px !important; mar" alt="" class="default-logo">
                    <img src="{{ asset('assets/frontend/custom/images/logo.png') }}" data-at2x="{{ asset('assets/frontend/images/demo-seo-agency-logo-black@2x.png') }}" style="max-height: 120px !important; mar" alt="" class="alt-logo">
                    <img src="{{ asset('assets/frontend/custom/images/logo.png') }}" data-at2x="{{ asset('assets/frontend/images/demo-seo-agency-logo-black@2x.png') }}" style="max-height: 120px !important; mar" alt="" class="mobile-logo">
                </a>
            </div>
            <div class="col-auto menu-order left-nav">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menü">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav alt-font">
                        <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}"><a href="{{ route('Frontend.Home') }}" class="nav-link">Başlangıç</a></li>
                        <li class="nav-item {{ (request()->is('adaptation')) ? 'active' : '' }}"><a href="{{ route('Frontend.Adaptation') }}" class="nav-link">KVKK Uyum Testi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="header-icon">
                    <div class="d-none d-xl-inline-block me-25px"><a href="tel:+903325011701" class="alt-font widget-text fw-600"><i class="feather icon-feather-phone-outgoing me-10px"></i>+90 332 501 17 01</a></div>
                    <div class="header-button"><a href="{{ route('login') }}" class="btn btn-small btn-success btn-box-shadow btn-rounded">Veri.DP Portal Giriş</a></div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
</header>
<!-- end header -->

@yield('PageContent')

<!-- start footer -->
<footer class="footer-light half-footer">
    <div class="container">

        <div class="row justify-content-center align-items-center pt-40px sm-pt-30px">
            <!-- start footer divider -->
            <div class="col-12 mb-40px sm-mb-30px">
                <div class="divider-style-03 divider-style-03-01 border-color-transparent-dark-very-light"></div>
            </div>
            <!-- end footer divider -->
            <!-- start footer column -->
            <div class="col-lg-7 col-md-8 fs-14 lh-24 text-center text-md-start last-paragraph-no-margin sm-mb-20px"><p>Tüm hakları saklıdır. Veri.DP Data Protection - KVKK Takip ve Yönetim Yazılımı olarak, siz değerli ziyaretçilerimize en iyi deneyimi sunmayı taahhüt ediyoruz.</p></div>
            <!-- end footer column -->
            <!-- start footer column -->
            <div class="col-lg-5 col-md-4 text-end elements-social social-icon-style-08 text-center text-md-end">
                <ul class="medium-icon dark d-inline-block">
                    <li class="mb-0"><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li class="mb-0"><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="mb-0"><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="mb-0"><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i></a></li>
                </ul>
            </div>
            <!-- end footer column -->
        </div>
    </div>
</footer>
<!-- end footer -->

<!-- start scroll progress -->
<div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
        <span class="scroll-text">Sayfayı Kaydırın</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
</div>
<!-- end scroll progress -->

<!-- javascript libraries -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendors.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>

@yield('PageVendorJS')
@yield('PageCustomJS')
</body>
</html>
