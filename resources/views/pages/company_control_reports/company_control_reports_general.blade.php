@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.company_control_reports.general.01'))

@section('PageVendorCSS')

@endsection

@section('PageCustomCSS')
    <link href="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('Breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 ">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('CompanyControlReports.Index') }}" class="text-muted text-hover-primary">{{ Settings::get('app_alias') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    @if($companyControlReports->count() == 0)
        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            <div class="col-xxl-12">
                <!--begin::Engage widget 10-->
                <div class="card card-flush h-md-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('{{ asset('assets/media/stock/900x600/42.png') }}')">
                        <div class="alert alert-primary d-flex align-items-center p-5">
                            <i class="ki-duotone ki-shield-tick fs-2hx text-primary me-4"><span class="path1"></span><span class="path2"></span></i>
                            <div class="d-flex flex-column">
                                <h4 class="mb-1">@ {{ __('messages.company_control_reports.alert.04') }}</h4>
                                <span>- {{ __('messages.company_control_reports.alert.05') }}</span>
                                <span>- {{ __('messages.company_control_reports.alert.06') }}</span>
                            </div>
                        </div>
                        <!--begin::Illustration-->
                        <img class="mx-auto h-150px h-lg-250px theme-light-show" src="{{ asset('assets/media/illustrations/sigma-1/17.png') }}" alt="" />
                        <img class="mx-auto h-150px h-lg-250px theme-dark-show" src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}" alt="" />
                        <!--end::Illustration-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 10-->
            </div>
        </div>
    @else
    <div class="row g-6 g-xl-9 mb-6">
        <div class="col-12">
            <div id="reportTimeline"></div>
        </div>
    </div>
    <div class="input-group mb-6">
        <span class="input-group-text">{{ __('messages.datatables.01') }}</span>
        <input type="text" id="document-search" class="form-control" placeholder="..."/>
    </div>
    <div class="row g-6 g-xl-9 mb-6">
        @foreach($companyControlReports as $companyControlReport)
            <div class="col-md-6 col-lg-4 col-xl-3 document-container">
                <div class="card h-100">
                    <div class="position-absolute" style="right: 10px; top: 10px; z-index: 999">
                        <a class="btn btn-icon btn-light-warning" onclick="moveTimeline(this)" data-date="{{ date('Y-m-d', strtotime('01-'.$companyControlReport->date_period)) }}" style="height: calc(2.05em);"><i class="fas fa-exclamation fs-5" style="margin-top: 2px;"></i></a>
                    </div>
                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <span class="text-gray-800 d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{ asset('assets/media/svg/files/doc.svg') }}" class="theme-light-show" alt="">
                                    <img src="{{ asset('assets/media/svg/files/doc-dark.svg') }}" class="theme-dark-show" alt="">
                                </div>
                                <div class="fs-5 fw-bold mb-2 report-name">
                                    {{ $companyControlReport->report_name }}
                                </div>
                                <div class="fs-5 fw-bold mb-2 mt-2">
                                    <a href="{{ route('CompanyControlReports.DownloadControlReport', $companyControlReport->id) }}" type="button" class="btn btn-sm btn-success">
                                        {{ __('messages.company_control_reports.form.07.03') }}
                                    </a>
                                </div>
                            </span>
                        <!--end::Name-->

                        <!--begin::Description-->
                        <div class="fs-7 fw-semibold text-gray-500">
                            {{ __('messages.company_control_reports.form.07.02') }}: {{ date('d/m/Y', strtotime($companyControlReport->created_at)) }}
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        @endforeach
    </div>
    @endif
@endsection

@section('PageVendorJS')
    <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
@endsection

@section('PageCustomJS')
    <script>
        $(document).ready(function(){
            var $search = $("#document-search").on('input',function(){
                var matcher = new RegExp($(this).val(), 'gi');
                $('.document-container').show().not(function(){
                    return matcher.test($(this).find('.report-name').text())
                }).hide();
            })
        })
    </script>

    <script>
        var container = document.getElementById("reportTimeline");

        var items = new vis.DataSet([
            @foreach($companyControlReports as $companyControlReport)
                { id: {{ $companyControlReport->id }}, content: "{{ $companyControlReport->report_name }}", start: "{{ date('Y-m-d', strtotime('01-'.$companyControlReport->date_period)) }}" },
            @endforeach
        ]);

        var options = {};
        var timeline = new vis.Timeline(container, items, options);

        function moveTimeline(btn) {
            timeline.moveTo(btn.getAttribute('data-date'));
        }
    </script>
@endsection

@section('PageModals')

@endsection
