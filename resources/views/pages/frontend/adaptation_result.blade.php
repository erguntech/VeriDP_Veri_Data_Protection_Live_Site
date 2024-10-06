@extends('layouts.frontend.layout_frontend')
@section('PageTitle', __('messages.frontend.menu.02'))

@section('PageVendorCSS')

@endsection

@section('PageCustomCSS')

@endsection

@section('PageContent')
    <!-- start page title -->
    <section class="ipad-top-space-margin md-pt-0" style="padding-bottom: 20px;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center position-relative page-title-double-large">
                    <div class="d-flex flex-column justify-content-center extra-very-small-screen">
                        <h1 class="text-dark-gray alt-font ls-minus-1px fw-700 mb-20px">KVKK Uyum Testi Sonucu</h1>
                        <h2 class="text-dark-gray d-inline-block fw-400 ls-0px mb-0">Vermiş olduğunuz cevaplar analiz edilerek KVKK konusunda işletmenizin uyumluluğu tespit edilşmiştir.</h2>
                        <h2 class="text-dark-gray d-inline-block fw-400 ls-0px mb-0">Aşağıda yer alan forma bilgilerinizi girerek detaylı raporu oluşturabilirsiniz.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->

    <section class="position-relative overflow-hidden" style="padding-top: 20px;">
        <img src="" alt="" class="position-absolute left-100px top-50px z-index-minus-1" data-bottom-top="transform: translate3d(80px, 0px, 0px);" data-top-bottom="transform: translate3d(-180px, 0px, 0px);" />
        <img src="" alt="" class="position-absolute right-100px top-100px z-index-minus-1" data-bottom-top="transform:scale(1.4, 1.4) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-400px, 0px, 0px);" />
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-end md-mb-50px" data-anime='{ "effect": "slide", "color": "#262b35", "direction":"lr", "easing": "easeOutQuad", "delay":50}'>
                    <figure class="position-relative m-0">
                        <img src="{{ asset('assets/media/misc/result.jpg') }}" class="w-90 border-radius-6px" alt="">
                        <figcaption class="position-absolute bg-dark-gray border-radius-10px box-shadow-quadruple-large bottom-100px xs-bottom-minus-20px left-minus-30px md-left-0px w-230px xs-w-210px text-center last-paragraph-no-margin animation-float">
                            <div class="bg-white pt-35px pb-35px border-radius-8px mb-15px position-relative top-minus-1px">
                                <h1 class="fw-700 ls-minus-3px text-dark-gray mb-0">{{ $result->result_points }}</h1>
                                <div class="text-golden-yellow fs-18 ls-1px">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                </div>
                                <span class="text-dark-gray d-block alt-font fw-600">{{ $result->result_points }}/100</span>
                            </div>
                            <img src="" class="h-30px mb-20px" alt="" />
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-10 text-center text-lg-start" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <span class="text-uppercase fw-600 d-inline-block mb-15px text-base-color">Test Sonuçları</span>
                    <h2 class="alt-font fw-500 text-dark-gray ls-minus-1px">İşletmenizi <span class="fw-700 d-inline-block">KVKK'ya uyumlu</span> hale getiriyoruz!</h2>
                    <div class="swiper position-relative">
                        <form id="company_form" method="POST" enctype="multipart/form-data">
                            <div class="position-relative form-group mb-20px">
                                <input type="text" name="name" class="form-control required" placeholder="Adınız Soyadınız">
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <input type="email" name="email" class="form-control required" placeholder="E-Posta Adresiniz">
                            </div>
                            <div class="position-relative form-group form-textarea">
                                <button id="company_form_btn" class="btn btn-small btn-round-edge btn-dark-gray btn-box-shadow mt-20px m-auto submit" type="submit">Raporu Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('PageVendorJS')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('PageCustomJS')
<script>
    $("#company_form_btn").click(function(e){
        e.preventDefault();
        let name = $('input[name = name]').val();
        let email = $('input[name = email]').val();

        $.ajax({
            url: "{{ route('Frontend.SendAdaptationResult') }}",
            type: "POST",
            data: {
                "name": name,
                "email": email
            },
            dataType:"JSON",
            processData : false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    title: 'Rapor Gönderildi',
                    text: 'Verdiğiniz yanıtlar neticesinde ölçümlediğimiz KVKK Uyumluluk Raporu e-posta adresinize gönderilmiştir.',
                    icon: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonText: '{{ __('messages.sweetalert.03') }}!',
                    cancelButtonText: '{{ __('messages.sweetalert.04') }}',
                    customClass: {
                        confirmButton: 'btn sw-btn',
                        title: 'text-dark'
                    },
                    buttonsStyling: false
                });
                $('input[name = name]').val('');
                $('input[name = email]').val('');
            },
        });

    })
</script>
@endsection
