<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>{{ Settings::get('app_alias') }} | @yield('PageTitle')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Veri.DP">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="Veri Data Protection">
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
<!-- start page title -->
<section class="p-0">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 300px !important;">
            <div class="col-xxl-8 col-xl-9 col-lg-10 text-center">
                <span class="fw-500 fs-19 d-block text-dark-gray">{{ $client->company_name }}</span>
                <h1 class="fw-600 fs-1 text-dark-gray mb-0 ls-minus-2px">Kişisel Verileri Korunması Kanunu Politikaları</h1>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="pt-0 ps-11 pe-11 xl-ps-2 xl-pe-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="blog-grid blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                    <li class="grid-sizer"></li>
                    @foreach($clientDocuments as $clientDocument)
                        <!-- start blog item -->
                        <li class="grid-item">
                            <div class="card border-0 border-radius-4px box-shadow-extra-large box-shadow-extra-large-hover">
                                <div class="blog-image">
                                    <img src="{{ asset('assets/media/misc/play.jpg') }}" alt="" class="rounded"/>
                                </div>
                                <div class="card-body p-6 text-center">
                                    <span class="card-title fw-600 fs-4 text-dark-gray d-inline-block">{{ $clientDocument->document_name }}</span><br>
                                    <span class="fs-6 text-dark-gray d-inline-block mb-15px ">Oluşturma Tarihi: {{ date('d/m/Y', strtotime($clientDocument->created_at)) }}</span>
                                    <a href="{{ route('Frontend.Policies.DownloadPolicy', ['unique_id' => $clientDocument->linkedClient->linkedUser->unique_id, 'document_id' => $clientDocument->id]) }}" class="btn btn-small btn-gradient-fast-blue-purple d-table d-lg-inline-block xl-mb-15px md-mx-auto" style="width: 100% !important;">Görüntüle</a>
                                </div>
                            </div>
                        </li>
                        <!-- end blog item -->
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end section -->

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
