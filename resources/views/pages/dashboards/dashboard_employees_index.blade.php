@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.dashboard.administration.01'))

@section('PageVendorCSS')
    <link href="{{ asset('assets/plugins/custom/limarquee/css/liMarquee.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('PageCustomCSS')

@endsection

@section('Breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 ">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('Dashboard.Index') }}" class="text-muted text-hover-primary">{{ Settings::get('app_alias') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8 mb-2">
        <div class="col-xl-12 mb-4">
            <div class="card h-xl-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center flex-column py-9 px-5">
                    <div class="d-flex flex-column text-center px-9">
                        <a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4"><span id="userMessages" class="text-gray-800 fw-bold fs-5"></span></a>
                        <!--begin::Photo-->
                        <div class="symbol symbol-150px mb-4">
                            <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="user" />
                        </div>
                        <!--end::Photo-->
                        <!--begin::Info-->
                        <div class="text-center">
                            <!--begin::Name-->
                            <span class="text-gray-800 fw-bold fs-4">{{ Auth::user()->getUserFullName() }}</span>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <span class="text-muted d-block fw-semibold">{{ (Auth::user()->client_id == 0) ? Settings::get('app_name') : Auth::user()->linkedClient->company_name }}</span>
                            <!--end::Position-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
                <!--begin::Card body-->
            </div>
        </div>
    </div>

    <div class="row g-5 g-xl-8">
        <div class="col-xxl-4">
            <div class="card h-xl-100">
                <div class="card-body pt-2">
                    <div class="tns" style="direction: ltr">
                        <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false" data-tns-nav="false" >
                            <div class="text-center pt-7"><img src="{{ asset('assets/custom/media/slider_01.jpg') }}" class="card-rounded shadow mw-100" alt="" /></div>
                            <div class="text-center pt-7"><img src="{{ asset('assets/custom/media/slider_02.jpg') }}" class="card-rounded shadow mw-100" alt="" /></div>
                            <div class="text-center pt-7"><img src="{{ asset('assets/custom/media/slider_03.jpg') }}" class="card-rounded shadow mw-100" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-8">
            <div class="card h-xl-100">
                @php
                    $arrContextOptions=array(
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );
                    $content = @file_get_contents('https://www.trthaber.com/sondakika_articles.rss', false, stream_context_create($arrContextOptions));
                    $count = 0;
                    $a = new SimpleXMLElement($content);
                @endphp
                    <!--begin::Header-->
                <div class="card-header align-items-center border-0">
                    <!--begin::Title-->
                    <h4 class="card-title d-flex align-items-start flex-column">
                        <span class="card-label fw-bold text-primary">En Son Haberler</span>
                        <span class="text-gray-400 mt-1 fw-bold fs-7">TRT Haber RSS Feed</span>
                    </h4>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <div class="card-body pt-2">
                    @foreach($a->channel->item as $entry)
                        @if($count <= 11)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-4">
                                <!--begin::Bullet-->
                                <span class="bullet bullet-vertical h-20px bg-success me-4"></span>
                                <!--end::Bullet-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <a href="{!! $entry->link !!}" target="_blank" class="text-gray-800 fs-6 text-hover-primary">
                                        {!! $entry->title !!}
                                    </a>
                                </div>
                                <!--end::Description-->
                                <a href="{!! $entry->link !!}" target="_blank" class="badge badge-light-warning fs-8 fw-bold">Detay...</a>
                            </div>
                            <!--end::Item-->
                        @endif
                        @php
                            $count += 1;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('PageVendorJS')

@endsection

@section('PageCustomJS')

@endsection

@section('PageModals')

@endsection
