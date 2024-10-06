@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.web_code_base.index.01'))

@section('PageVendorCSS')

@endsection

@section('PageCustomCSS')
    <link href="{{ asset('assets/plugins/custom/prism/prism.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('Breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 ">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('WebCodeBase.Index') }}" class="text-muted text-hover-primary">{{ Settings::get('app_alias') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
        <div class="col-12">
            <!--begin::Referral program-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-success fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.web_code_base.index.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <h4 class="text-gray-800 mb-4">{{ __('messages.web_code_base.index.03') }}</h4>
                            <p class="fs-6 fw-semibold text-gray-600 py-1 m-0">{!! __('messages.web_code_base.index.04') !!}</p>
                            <p class="fs-6 fw-semibold text-gray-600 py-1 m-0">{!! __('messages.web_code_base.index.05') !!}</p>
                        </div>
                    </div>
                    <div style="margin: 0; margin-top: 20px !important;">&lt;script src="https://cdn.jsdelivr.net/gh/manucaralmo/GlowCookies@3.1.8/src/glowCookies.min.js">&lt;/script></div>
                    <div style="margin: 0; margin-bottom: 30px !important;">&lt;script src="{{ $fileURL }}">&lt;/script></div>
                    <div class="fs-5 fw-bold mb-2 mt-2">
                        <a href="{{ route('Frontend.Policies.DownloadJS', \Illuminate\Support\Facades\Auth::user()->unique_id) }}" type="button" class="btn btn-sm btn-success">
                            {{ __('messages.web_code_base.index.06') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('PageVendorJS')
    <script src="{{ asset('assets/plugins/custom/prism/prism.js') }}"></script>
@endsection

@section('PageCustomJS')

@endsection

@section('PageModals')

@endsection
