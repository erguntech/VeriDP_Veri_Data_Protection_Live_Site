@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.inventory_generates.index.01'))

@section('PageVendorCSS')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('PageCustomCSS')
    <style>
        thead th { white-space: nowrap; }
    </style>
@endsection

@section('Breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 ">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('InventoryGenerates.Index') }}" class="text-muted text-hover-primary">{{ Settings::get('app_alias') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8 mb-6">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Lists Widget 19-->
            <div class="card card-flush h-xl-100">
                <!--begin::Heading-->
                <div class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-100px" style="background-image:url({{ asset('assets/media/svg/shapes/abstract-2-dark.svg') }})" data-bs-theme="light">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column text-white pt-5">
                        <span class="card-label fw-bold text-primary mb-2">{{ Auth::user()->linkedClient->company_name }}</span>
                        <div class="fs-6">
                            <span class="position-relative d-inline-block">
							    <span class="fw-bold d-block mb-1 text-warning">{{ Settings::get('app_title') }}</span>
                            </span>
                        </div>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Stats-->
                    <div class="position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $departmentCount }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-success fw-semibold fs-6">{{ __('messages.inventory_generates.index.03') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1" id="totalPassiveDataCount">{{ $dataSetCount }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-danger fw-semibold fs-6">{{ __('messages.inventory_generates.index.04') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Lists Widget 19-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Engage widget 4-->
            <div class="card h-xl-100 shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-success fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.inventory_generates.index.01') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar">

                    </div>
                </div>
                <!--begin::Body-->
                <div class="card-body d-flex ps-xl-10">
                    <!--begin::Wrapper-->
                    <div class="m-0" style="width: 50%">
                        <!--begin::Title-->
                        <div class="position-relative z-index-2 card-label fw-bold text-primary mb-7">
                            <h4 class="mb-4"></h4>
                            <h6 class="mb-1">- {{ __('messages.inventory_generates.index.06') }}</h6>
                            <h6 class="mb-1">- {{ __('messages.inventory_generates.index.07') }}</h6>
                        </div>
                        <!--end::Title-->
                        <div class="mb-3">
                            <div class="separator border-2 my-10"></div>
                            <button type="button" class="btn btn-success" onclick="createInventoryReport(this)">
                                <span class="indicator-label">{{ __('messages.inventory_generates.index.08') }}</span>
                                <span class="indicator-progress">{{ __('messages.forms.03') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </div>
                    <!--begin::Wrapper-->
                    <!--begin::Illustration-->
                    <img src="{{ asset('assets/media/illustrations/sigma-1/17-dark.png') }}" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="" />
                    <!--end::Illustration-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 4-->
        </div>
        <!--end::Col-->
    </div>
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            @if (session('result'))
                @include('components.alert', $data = ['alert_type' => session('result'), 'alert_title' => session('title'), 'alert_content' => session('content')])
            @endif
            <div class="card">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-primary-active fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.inventory_generates.index.05') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar">
                        <a href="{{ route('InventoryDataSets.Create') }}" class="btn btn-light-success btn-icon btn-sm">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a onclick="dtReset()" class="btn btn-icon btn-light-warning btn-sm ms-2">
                            <i class="fas fa-redo-alt fs-5"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="input-group mb-5">
                        <span class="input-group-text">{{ __('messages.datatables.01') }}</span>
                        <input type="text" id="table-search" class="form-control" placeholder="..."/>
                    </div>

                    <table id="datatable" class="table table-hover table-rounded table-row-bordered table-row-gray-200 gy-1 gs-10" style="min-height: 100%; width: 100% !important;">
                        <thead>
                        <tr class="fw-bolder fs-7 text-uppercase gy-5">
                            <th>{{ __('messages.datatables.03') }}</th>
                            <th>{{ __('messages.inventory_generates.index.datatables.01') }}</th>
                            <th>{{ __('messages.inventory_generates.index.datatables.02') }}</th>
                            <th class="text-center">{{ __('messages.datatables.04') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-700 fw-bold" style="vertical-align: middle;"></tbody>
                    </table>
                    <div class="d-none d-sm-block alert alert-dismissible bg-light-warning d-flex flex-column flex-sm-row p-2" style="padding-left: 15px !important;">
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <span id="dt_info"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('PageVendorJS')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('PageCustomJS')
    <script>
        var table, dt;

        var initDatatable = function () {
            dt = $("#datatable").DataTable({
                searchDelay: 10000,
                processing: true,
                serverSide: false,
                order: [[1, 'asc']],
                autoWidth: false,
                responsive: false,
                pageLength: 10,
                aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "{{ __('messages.datatables.05') }}"]],
                fnCreatedRow: function( nRow, aData, iDataIndex ) {
                    $(nRow).children("td").css("white-space", "nowrap");
                },
                stateSave: false,
                pagingType: "simple_numbers",
                info: false,
                ajax: {
                    url : "{{ route('InventoryGenerates.Index') }}",
                },
                language: {
                    @if(App::getLocale() == 'tr')
                    url: '{{ asset('assets/plugins/custom/datatables/lang/tr_TR.json') }}'
                    @elseif(App::getLocale() == 'en')
                    url: '{{ asset('assets/plugins/custom/datatables/lang/en_GB.json') }}'
                    @endif
                },
                columns: [
                    { data: 'id' },
                    { data: 'createdAT' },
                    { data: 'report_no' },
                    { data: null },
                ],
                columnDefs: [
                        @if(App::getLocale() == 'tr')
                    { type: 'turkish', targets: [0,1] },
                        @endif
                    { targets : 0,
                        render : function (data, type, row) {
                            return '<span class="badge badge-square badge-light-warning"><strong>'+ data +'</strong></span>';
                        }
                    },
                    { targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-center',
                        render: function (data, type, row) {
                            return `
                            <a class="btn btn-icon btn-light-success" onclick="downloadData(this)" report-id="`+ row.report_no +`" style="height: calc(2.05em);"><i class="fas fa-arrow-down fs-5" style="margin-top: 2px;"></i></a>
                            `;
                        },
                    },
                    { className: "dt-settings", "targets": [ -1 ] },
                ],
                drawCallback : function() {
                    processInfo(this.api().page.info());
                },
            });

            table = dt.$;

            dt.on('draw', function () {
                KTMenu.createInstances();
            });

            $('#table-search').keyup(function(){
                dt.search($(this).val()).draw();
            });
        };

        function processInfo(info) {
            @if(App::getLocale() == 'tr')
            $("#dt_info").html(
                'Toplam ' + info.recordsTotal + ' Kayıttan ' + (info.start+1) + ' - ' + info.end + ' Arası Gösteriliyor.'
            );
            @else
            $("#dt_info").html(
                'Showing ' + (info.start+1) + ' - ' + info.end + ' of ' + info.recordsTotal + ' Total Records.'
            );
            @endif
        };

        KTUtil.onDOMContentLoaded(function () {
            initDatatable();
        });

        function dtReset() {
            $("#datatable").DataTable().page.len(10).draw();
            $("#datatable").DataTable().state.clear();
            $("#datatable").DataTable().ajax.reload();
        }
    </script>

    <script type="text/javascript">
        function createInventoryReport(btn) {
            if('{{ $dataSetCount > 0 }}') {
                Swal.fire({
                    title: '{{ __('messages.inventory_generates.sweetalert.03') }}',
                    html: '{!! __('messages.inventory_generates.sweetalert.04') !!}',
                    icon: 'info',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    confirmButtonText: '{{ __('messages.sweetalert.03') }}!',
                    cancelButtonText: '{{ __('messages.sweetalert.04') }}',
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger ml-1',
                        title: 'text-white'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: '/ajax/inventorygenerates',
                            type: 'POST',
                            data: {
                                "clientID": '{{ $company->id }}',
                                "_token": $("meta[name='csrf-token']").attr("content"),
                            },
                            success: function (data){
                                Swal.fire({
                                    icon: 'success',
                                    title: '{{ __('messages.inventory_generates.sweetalert.05') }}',
                                    html: '{!! __('messages.inventory_generates.sweetalert.06') !!}',
                                    confirmButtonText: '{{ __('messages.sweetalert.05') }}',
                                    allowOutsideClick: false,
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                        title: 'text-white'
                                    }
                                }).then(function (result) {
                                    dtReset();
                                })
                            },
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: '{{ __('messages.inventory_generates.sweetalert.01') }}',
                    html: '{!! __('messages.inventory_generates.sweetalert.02') !!}',
                    icon: 'error',
                    showCancelButton: true,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    cancelButtonText: '{{ __('messages.sweetalert.04') }}',
                    customClass: {
                        cancelButton: 'btn btn-danger ml-1',
                        title: 'text-white'
                    },
                    buttonsStyling: false
                });
            }
        }
    </script>

    <script type="text/javascript">
        function downloadData(btn) {
            Swal.fire({
                title: '{{ __('messages.inventory_generates.sweetalert.07') }}',
                html: '{!! __('messages.inventory_generates.sweetalert.08') !!}',
                icon: 'error',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: '{{ __('messages.sweetalert.03') }}!',
                cancelButtonText: '{{ __('messages.sweetalert.04') }}',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-warning ml-1',
                    title: 'text-white'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: "downloadreport/"+btn.getAttribute('report-id'),
                        type: 'POST',
                        data: {
                            "id": btn.getAttribute('report-id'),
                            "_token": $("meta[name='csrf-token']").attr("content"),
                        },
                        xhrFields: {
                            responseType: 'blob',
                        },
                        success: function (result, status, xhr){
                            var disposition = xhr.getResponseHeader('content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] : btn.getAttribute('report-id')+'.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        }
                    });
                }
            });
        }
    </script>

@endsection

@section('PageModals')

@endsection
