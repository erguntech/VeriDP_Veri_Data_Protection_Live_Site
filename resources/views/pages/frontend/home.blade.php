@extends('layouts.frontend.layout_frontend')
@section('PageTitle', __('messages.dashboard.administration.01'))

@section('PageVendorCSS')

@endsection

@section('PageCustomCSS')

@endsection

@section('PageContent')
    <!-- start banner slider -->
    <section class="cover-background position-relative ipad-top-space-margin" style="background-image: url('{{ asset('assets/frontend/images/demo-seo-agency-bg.jpg') }}')">
        <div class="background-position-left-top h-100 w-100 position-absolute left-0px top-0" style="background-image: url('{{ asset('assets/frontend/images/vertical-line-bg-medium-gray.svg') }}')"></div>
        <div class="background-position-center-bottom background-size-100 background-no-repeat position-absolute bottom-0 left-0px w-100 h-400px lg-h-170px z-index-1" style="background-image: url('{{ asset('assets/frontend/images/demo-seo-agency-bottom-bg.png') }}')"></div>
        <div id="particles-style-01" class="h-100 position-absolute left-0px top-0 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 1.1,"density": {"enable": true,"value_area": 900}},"shape": {"type": ["image"],"image":{"src":"images/particles-demo-4-bg.png","width":180,"height":100}},"opacity": {"value": 0.5,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 120,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":0.4,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
        <div class="container position-relative pb-2">
            <div class="row align-items-center text-center text-md-start justify-content-sm-center">
                <div class="col-md-6 col-sm-9 position-relative z-index-1 text-dark-gray md-mb-35px">
                    <div class="alt-font fs-110 md-fs-100 fw-300 lh-85 ls-minus-2px mb-15px fancy-text-style-4" data-anime='{ "el": "childs", "opacity": [0, 1], "rotateY": [-90, 0], "rotateZ": [-10, 0], "translateY": [80, 0], "translateZ": [50, 0], "staggervalue": 200, "duration": 900, "easing": "easeOutCirc" }'>
                        <span class="d-inline-block">VERİ.DP</span>
                        <span class="fw-700 fs-120 md-fs-120 ls-minus-5px d-inline-block" data-fancy-text='{ "effect": "rubber-band", "string": ["kvkk", "yönetim", "platformu"] }'></span>
                    </div>
                    <div data-anime='{ "opacity": [0, 1], "rotateY": [-90, 0], "rotateZ": [-10, 0], "translateY": [80, 0], "translateZ": [50, 0], "duration": 900, "delay": 500, "easing": "easeOutCirc" }'>
                        <span class="alt-font fs-20 fw-500 w-70 lg-w-85 sm-w-100 mb-40px md-mb-30px d-block opacity-7">KVKK Uyum Sürecindeki Tüm İhtiyaçlarınızı Bu Platformda Güvenle Karşılıyoruz.</span>
                    </div>
                    <a href="{{ route('Frontend.Adaptation') }}" class="btn btn-extra-large btn-rounded with-rounded btn-gradient-orange-sky-blue btn-box-shadow box-shadow-extra-large" data-anime='{ "opacity": [0, 1], "rotateY": [-90, 0], "rotateZ": [-10, 0], "translateY": [80, 0], "translateZ": [50, 0], "duration": 900, "delay": 800, "easing": "easeOutCirc" }'>Hemen Uyum Testi Yapın<span class="bg-white text-base-color"><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
                <div class="col-md-6 text-center" data-anime='{ "opacity": [0, 1], "translateY": [150, 0], "duration": 2000, "easing": "easeOutBack" }'>
                    <img src="{{ asset('assets/frontend/custom/images/header_01.png') }}" alt="" class="animation-float">
                </div>
            </div>
            <div class="position-absolute bottom-minus-90px md-bottom-minus-70px sm-bottom-minus-50px right-30px sm-right-10px z-index-9" data-anime='{ "opacity": [0, 1], "scale": [0, 1], "translateZ": [50, 0], "staggervalue": 200, "duration": 900, "delay": 800, "easing": "easeOutCirc" }'>
                <img src="{{ asset('assets/frontend/custom/images/header_02.png') }}" alt="" class="md-w-180px xs-w-150px">
            </div>
        </div>
    </section>
    <!-- end banner slider -->
    <!-- start section -->
    <section class="background-position-center-top pb-0 pt-4 sm-pt-40px" style="background-image: url('{{ asset('assets/frontend/images/demo-seo-agency-vertical-line-bg.svg') }}')">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-xl-7 col-lg-8 col-md-10 text-center" data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h2 class="fw-600 text-dark-gray alt-font ls-minus-1px">4 Adımda KVKK Uyumu</h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "rotateZ": [5, 0], "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 200, "easing": "easeOutQuad" }'>
                <!-- start features box item -->
                <div class="col icon-with-text-style-03 lg-mb-50px xs-mb-40px transition-inner-all">
                    <div class="feature-box ps-7 pe-7 sm-ps-4 sm-pe-4">
                        <div class="feature-box-icon mb-30px sm-mb-20px">
                            <img class="h-65px" src="{{ asset('assets/frontend/custom/icons/section_01_01.svg') }}" alt="">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-700 text-dark-gray mb-5px fs-20">KVKK Uyum Testi</span>
                            <p>İlk aşamada KVKK konusunda hangi aşamada olduğunuzu test ediyoruz.</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-03 lg-mb-50px xs-mb-40px transition-inner-all">
                    <div class="feature-box ps-7 pe-7 sm-ps-4 sm-pe-4">
                        <div class="feature-box-icon mb-30px sm-mb-20px">
                            <img class="h-65px" src="{{ asset('assets/frontend/custom/icons/section_01_02.svg') }}" alt="">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-700 text-dark-gray mb-5px fs-20">Ekip Yönetimi</span>
                            <p>Şirketiniz bünyesinde uyum Süreci için ihtiyacınız olan ekibi kuruyoruz.</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-03 xs-mb-40px transition-inner-all">
                    <div class="feature-box ps-7 pe-7 sm-ps-4 sm-pe-4">
                        <div class="feature-box-icon mb-30px sm-mb-20px">
                            <img class="h-65px" src="{{ asset('assets/frontend/custom/icons/section_01_03.svg') }}" alt="">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-700 text-dark-gray mb-5px fs-20">İş Planlaması</span>
                            <p>Size özel hazırlanış uyum planı ile ekibinizi eğitiyor ve işe başlıyoruz.</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-03">
                    <div class="feature-box ps-7 pe-7 sm-ps-4 sm-pe-4">
                        <div class="feature-box-icon mb-30px sm-mb-20px">
                            <img class="h-65px" src="{{ asset('assets/frontend/custom/icons/section_01_04.svg') }}" alt="">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-700 text-dark-gray mb-5px fs-20">Sürdürebilirlik</span>
                            <p>Uyum ekibiniz envanter girişini gerçekleştiriyor ve düzenli kontrollere devam ediyor.</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="position-relative background-position-center-top half-section xs-ps-15px xs-pe-15px overflow-hidden" style="background-image: url('{{ asset('assets/frontend/images/vertical-line-bg-medium-gray.svg') }}')">
        <div id="particles-style-02" class="h-100 position-absolute left-0px top-0 z-index-minus-1 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value":8,"density": {"enable": true,"value_area": 4000}},"shape": {"type": ["image"],"image":{"src":"images/demo-seo-agency-particles-img.png","width":220,"height":134}},"opacity": {"value": 0.5,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 120,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":0.4,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
        <div class="container bg-white border-radius-6px box-shadow-double-large" data-bottom-top="transform:scale(1, 1) translateX(20px);" data-top-bottom="transform:scale(1, 1) translateX(-20px);">
            <div class="row row-cols-1 row-cols-lg-1 row-cols-sm-2 align-items-center pt-50px pb-50px ps-30px pe-30px justify-content-center">
                <!-- start content box item -->
                <div class="col md-mb-40px alt-font text-dark-gray fw-600">
                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center g-0 text-center text-md-start">
                        <div class="flex-shrink-0 me-15px sm-me-0">
                            <h2 class="mb-0">Veri.DP<sup class="fs-30">%</sup></h2>
                        </div>
                        <div>
                            <span class="fs-18 lh-26 d-block">Kişisel Verilerileri Koruma Kanunu'na uyumluluk süreçlerinizi tek noktadan yönetin. Veri.DP, yöneticilerin şirketlerinin anlık olarak Kanun'a uyumluluk durumunu görmelerini ve düzenli yönetim imkanı sağlar.</span>
                        </div>
                    </div>
                </div>
                <!-- end content box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="background-position-center-top pt-0 pb-1" style="background-image: url('{{ asset('images/vertical-line-bg-medium-gray.svg') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 d-block d-sm-flex align-items-center text-center text-sm-start justify-content-center fs-22 alt-font mb-7">
                    <div class="me-5px xs-ms-10px d-inline-block align-middle"><i class="fa-regular fa-heart text-red"></i></div>
                    <div class="d-inline-block align-middle">Veri.DP <span class="fw-800 text-dark-gray text-decoration-line-bottom-medium">KVKK</span> İle İlgili Her Adımda Yanınızda!</div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 animation-float sm-mb-50px" data-anime='{ "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <img src="{{ asset('assets/frontend/custom/images/section_01.png') }}" alt="">
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6 text-center text-md-start" data-anime='{ "el": "childs", "willchange": "transform", "opacity": [0, 1], "rotateY": [-90, 0], "rotateZ": [-10, 0], "translateY": [80, 0], "translateZ": [50, 0], "staggervalue": 200, "duration": 600, "delay": 100, "easing": "easeOutCirc" }'>
                    <span class="ps-20px pe-20px mb-25px md-mb-20px text-uppercase text-dark-gray fs-13 lh-40 md-lh-50 ls-1px alt-font fw-700 border-radius-4px bg-gradient-chablis-red-quartz-white d-inline-block">Veri.DP Data Protection</span>
                    <h2 class="alt-font text-dark-gray fw-600 ls-minus-1px">Sürekli Gelişen <br> Akıllı Asistanınız</h2>
                    <p class="w-80 xl-w-85 lg-w-90 md-w-100 mb-20px">Yönetimi ve takibi kolaylaştırmanın yanı sıra adeta bir “masaüstü danışman” rolü üstlenen Veri.DP yazılımı ile tüm uyum süreçlerinizi verimlilik ve hız esaslarıyla yönetirken, sektör profesyonellerine de birikimimizi sunuyoruz.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="bg-gradient-top-very-light-gray overlap-height position-relative">
        <div class="container overlap-gap-section">
            <div class="row justify-content-center mb-4">
                <div class="col-xxl-8 col-lg-8 col-md-10 text-center" data-anime='{ "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h2 class="fw-600 alt-font text-dark-gray ls-minus-1px">Veri.DP<br>KVKK Takip ve Yönetim Yazılımı</h2>
                </div>
            </div>
            <div class="row justify-content-center row-cols-2 row-cols-md-4 row-cols-sm-3 clients-style-03">
                <!-- start client item -->
                <div class="col text-center mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 300, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_01.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 1000, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_02.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay":900, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_03.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 500, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_04.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center sm-mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 700, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_05.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center sm-mb-35px" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay":1200, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_06.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
                <!-- start client item -->
                <div class="col text-center" data-anime='{ "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 800, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <div class="client-box">
                        <a href="#"><img src="{{ asset('assets/frontend/custom/images/modules_07.png') }}" alt="" class="box-shadow-extra-large border-radius-100px lg-w-80 md-w-95 xs-w-auto"></a>
                    </div>
                </div>
                <!-- end client item -->
            </div>
            <div class="row justify-content-center mt-7 mb-9 sm-mt-40px sm-mb-0">
                <div class="col-12 d-block d-sm-flex align-items-center text-center text-sm-start justify-content-center fs-22 alt-font">
                    <div class="me-5px xs-ms-10px d-inline-block align-middle"><i class="fa-regular fa-heart text-red"></i></div>
                    <div class="d-inline-block align-middle">Güncel Kanun Değişikliklerini Sizin İçin Takip Ediyoruz!</div>
                </div>
            </div>
        </div>
        <div class="background-position-center-bottom background-size-100 background-no-repeat h-300px sm-h-150px position-absolute sm-position-relative left-0px bottom-0 w-100 d-none d-md-block" style="background-image: url('images/demo-seo-agency-analysis-bg.png')"></div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="p-0 sm-pt-50px">
        <div class="container overlap-section">
            <div class="row justify-content-center box-shadow-quadruple-large border-radius-6px overflow-hidden g-0">
                <!-- start contact address -->
                <div class="col-lg-6">
                    <div class="p-15 lg-p-13 md-p-10 bg-white h-100 background-position-right-bottom background-no-repeat xs-background-image-none">
                        <span class="ps-25px pe-25px mb-25px text-uppercase text-dark-gray fs-13 lh-42 ls-1px alt-font fw-700 border-radius-4px bg-gradient-chablis-red-quartz-white d-inline-block">Veri.DP Data Protection</span>
                        <h3 class="alt-font text-dark-gray fw-600">Haydi Başlayalım!</h3>
                        <div class="mt-11">
                            <div class="col icon-with-text-style-08 mb-25px">
                                <div class="feature-box feature-box-left-icon-middle border-bottom pb-25px border-color-extra-medium-gray">
                                    <div class="feature-box-icon me-25px xs-me-15px lh-0px">
                                        <i class="bi bi-telephone-outbound icon-medium text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="alt-font fs-18 fw-500">Bilgi almak ister misiniz?</span>
                                        <span class="d-block fw-600 alt-font fs-20"><a href="tel:903325011701" class="text-dark-gray">+90 332 501 17 01</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col icon-with-text-style-08 mb-25px">
                                <div class="feature-box feature-box-left-icon-middle border-bottom pb-25px border-color-extra-medium-gray">
                                    <div class="feature-box-icon me-25px xs-me-15px lh-0px">
                                        <i class="bi bi-envelope icon-medium text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="alt-font fs-18 fw-500">E-Posta için;</span>
                                        <span class="d-block fw-600 alt-font fs-20"><a href="mailto:info@veridp.com" class="text-dark-gray">info@veridp.com</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon-middle">
                                    <div class="feature-box-icon me-25px xs-me-15px lh-0px">
                                        <i class="bi bi-chat-text icon-medium text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span class="alt-font fs-18 fw-500">Kahve içmeye bekliyoruz.</span>
                                        <span class="text-dark-gray d-block alt-font fw-600 fs-20">Konya Teknokent, Akademi Mahallesi, Gürbulut Sokak, No:67, A1-304-305, 42150, Selçuklu, Konya</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end contact address -->
                <div class="col-lg-6 contact-form-style-03">
                    <div class="p-15 lg-p-13 md-p-10 bg-dark-gray h-100">
                        <h1 class="fw-600 alt-font text-white fancy-text-style-4 ls-minus-1px">
                            <span data-fancy-text='{ "effect": "rotate", "string": ["Merhaba", "Hello!", "Hallå!", "Salve!"] }'></span>
                        </h1>
                        <!-- start contact form -->
                        <form action="email-templates/contact-form.php" method="post">
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-person icon-extra-medium"></i></span>
                                <input class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control required" type="text" name="name" placeholder="Adınız Soyadınız*">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-envelope icon-extra-medium"></i></span>
                                <input class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control required" type="email" name="email" placeholder="E-Posta Adresiniz*">
                            </div>
                            <div class="position-relative form-group form-textarea mt-15px mb-25px">
                                <textarea class="ps-0 border-radius-0px fs-17 bg-transparent border-color-transparent-white-light placeholder-medium-gray form-control" name="comment" placeholder="Mesajınız" rows="4"></textarea>
                                <span class="form-icon"><i class="bi bi-chat-square-dots icon-extra-medium"></i></span>
                                <input type="hidden" name="redirect" value="">
                                <button class="btn btn-small btn-gradient-orange-sky-blue ls-1px mt-30px submit w-100 btn-round-edge-small" type="submit">Gönder</button>
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </form>
                        <!-- end contact form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection

@section('PageVendorJS')

@endsection

@section('PageCustomJS')

@endsection
