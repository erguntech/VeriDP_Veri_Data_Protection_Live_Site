@extends('layouts.frontend.layout_frontend')
@section('PageTitle', __('messages.frontend.menu.02'))

@section('PageVendorCSS')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('PageCustomCSS')
<style>
    .radio-inputs {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        border-radius: 0.5rem;
        background-color: #EEE;
        box-sizing: border-box;
        box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
        padding: 0.25rem;
        width: 100%;
        font-size: 14px;
    }

    .radio-inputs .radio {
        flex: 1 1 auto;
        text-align: center;
    }

    .radio-inputs .radio input {
        display: none;
    }

    .radio-inputs .radio .name {
        display: flex;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        border: none;
        padding: .5rem 0;
        color: rgba(51, 65, 85, 1);
        transition: all .15s ease-in-out;
    }

    .radio-inputs .radio input:checked + .name {
        background-color: #fff;
        font-weight: 600;
    }
</style>
@endsection

@section('PageContent')
    <!-- start page title -->
    <section class="ipad-top-space-margin md-pt-0" style="padding-bottom: 20px;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center position-relative page-title-double-large">
                    <div class="d-flex flex-column justify-content-center extra-very-small-screen">
                        <h1 class="text-dark-gray alt-font ls-minus-1px fw-700 mb-20px">KVKK Uyum Testi</h1>
                        <h2 class="text-dark-gray d-inline-block fw-400 ls-0px mb-0">Aşağıdaki form üzerinde yer alan soruları eksiksiz bir biçimde cevaplayarak testi tamamlayınız.</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->


    <!-- start section -->
    <section class="background-position-center-top bg-gradient-top-very-light-gray position-relative pb-15 sm-pb-20" style="padding-top: 20px;">
        <div class="container position-relative z-index-1">
            <div class="row justify-content-center">
                <div id="smartwizard">
                    <ul class="nav">
                        @foreach($adaptationQuestions as $adaptationQuestion)
                            <li class="nav-item">
                                <a class="nav-link" href="#step-{{ $adaptationQuestion->id }}">
                                    <div class="num">{{ $adaptationQuestion->id }}</div>
                                    {{ __('messages.frontend.menu.02') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($adaptationQuestions as $adaptationQuestion)
                            <div id="step-{{ $adaptationQuestion->id }}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{ $adaptationQuestion->id }}">
                                {{ $adaptationQuestion->question_content }}
                                <div class="radio-inputs">
                                    <label class="radio">
                                        <input type="radio" name="radio_{{ $adaptationQuestion->id }}" checked="" value="E">
                                        <span class="name">Evet</span>
                                    </label>

                                    <label class="radio">
                                        <input type="radio" name="radio_{{ $adaptationQuestion->id }}" value="H">
                                        <span class="name">Hayır</span>
                                    </label>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <!-- Include optional progressbar HTML -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end section -->
@endsection

@section('PageVendorJS')
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('PageCustomJS')
<script>
    function generateUniqueId() {
        return Math.random().toString(36).substr(2, 9);
    }

    function onFinish() {
        const examResults = [];
        @foreach($adaptationQuestions as $adaptationQuestion)
            examResults.push(["{{ $adaptationQuestion->id }}", $("input[name='radio_{{ $adaptationQuestion->id }}']:checked").val()]);
        @endforeach

        Swal.fire({
            title: 'Test Sonucu',
            text: 'Verdiğiniz yanıtlar neticesinde ölçümlediğimiz KVKK Uyumunu görüntülemek ister misiniz?',
            icon: 'success',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonText: '{{ __('messages.sweetalert.03') }}!',
            cancelButtonText: '{{ __('messages.sweetalert.04') }}',
            customClass: {
                confirmButton: 'btn sw-btn',
                cancelButton: 'btn sw-btn ml-1',
                title: 'text-dark'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '/ajax/testresult',
                    type: 'POST',
                    data: {
                        "uID": generateUniqueId(),
                        "examResults": examResults,
                        "_token": $("meta[name='csrf-token']").attr("content"),
                    },
                    success: function (data){
                        window.location.replace(data.url);
                        console.log(data);
                    }, error: function (data) {
                        console.log(data);
                    },
                });
            }
        });
    }

    // SmartWizard initialize
    $('#smartwizard').smartWizard({
        lang: { // Language variables for button
            next: 'Sonraki',
            previous: 'Önceki'
        },
        autoAdjustHeight: false,
        toolbar: {
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            position: 'bottom', // none|top|bottom|both
            extraHtml: `<button class="btn sw-btn" onclick="onFinish(this)" id="btnFinish" style="background-color: green;">Tamamla</button>`
        },
        anchor: {
            enableNavigation: true, // Enable/Disable anchor navigation
            enableNavigationAlways: false, // Activates all anchors clickable always
            enableDoneState: true, // Add done state on visited steps
            markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
            enableDoneStateNavigation: true // Enable/Disable the done state navigation
        },
    });

    $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
        if (stepPosition == 'last') {
            $("#btnFinish").prop('disabled', false);
        } else {
            $("#btnFinish").prop('disabled', true);
        }
    });
</script>
@endsection
