@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.academy_contents.edit.01'))

@section('PageVendorCSS')

@endsection

@section('PageCustomCSS')

@endsection

@section('Breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 ">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('Dashboard.Index') }}" class="text-muted text-hover-primary">{{ Settings::get('app_alias') }}</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('AcademyContents.Index') }}" class="text-muted text-hover-primary">{{ __('messages.academy_contents.index.01') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="alert alert-info d-flex align-items-center p-5">
                <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1">@ {{ __('messages.academy_contents.alert.01') }}</h4>
                    <span>- {{ __('messages.academy_contents.alert.02') }}</span>
                </div>
            </div>

            @if (session('result'))
                <div class="mb-4">
                    @include('components.alert', $data = ['alert_type' => session('result'), 'alert_title' => session('title'), 'alert_content' => session('content')])
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-warning fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.academy_contents.edit.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <form action="{{ route('AcademyContents.Update', $academyContent->id) }}" id="editForm" enctype="multipart/form-data" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <label for="input-academy_content_name" class="required form-label">{{ __('messages.academy_contents.form.01') }}</label>
                                <input type="text" name="input-academy_content_name" id="input-academy_content_name" class="form-control @error('input-academy_content_name') is-invalid error-input @enderror" placeholder="{{ __('messages.academy_contents.form.01') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-academy_content_name', $academyContent->academy_content_name) }}"/>
                                @if ($errors->has('input-academy_content_name'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-academy_content_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-academy_content_description" class="required form-label">{{ __('messages.academy_contents.form.02') }}</label>
                                <input type="text" name="input-academy_content_description" id="input-academy_content_description" class="form-control @error('input-academy_content_description') is-invalid error-input @enderror" placeholder="{{ __('messages.academy_contents.form.02') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-academy_content_description', $academyContent->academy_content_description) }}"/>
                                @if ($errors->has('input-academy_content_description'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-academy_content_description') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-6">
                                <label for="input-academy_content_type" class="required form-label">{{ __('messages.academy_contents.form.04') }}</label>
                                <select class="form-select @error('input-academy_content_type') is-invalid error-input @enderror" name="input-academy_content_type" id="input-academy_content_type" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-academy_content_type', $academyContent->academy_content_type) == '1' ? 'selected' : '' }}>{{ __('messages.academy_contents.form.04.01') }}</option>
                                    <option value="2" {{ old('input-academy_content_type', $academyContent->academy_content_type) == '2' ? 'selected' : '' }}>{{ __('messages.academy_contents.form.04.02') }}</option>
                                    <option value="3" {{ old('input-academy_content_type', $academyContent->academy_content_type) == '3' ? 'selected' : '' }}>{{ __('messages.academy_contents.form.04.03') }}</option>
                                </select>
                                @if ($errors->has('input-academy_content_type'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-academy_content_type') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-is_active" class="required form-label">{{ __('messages.academy_contents.form.05') }}</label>
                                <select class="form-select @error('input-is_active') is-invalid error-input @enderror" name="input-is_active" id="input-is_active" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-is_active', $academyContent->is_active) == '1' ? 'selected' : '' }}>{{ __('messages.academy_contents.form.05.01') }}</option>
                                    <option value="0" {{ old('input-is_active', $academyContent->is_active) == '0' ? 'selected' : '' }}>{{ __('messages.academy_contents.form.05.02') }}</option>
                                </select>
                                @if ($errors->has('input-is_active'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-is_active') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6" id="container-document_url">
                            <div class="col-12">
                                <label for="input-document_url" class="required form-label">{{ __('messages.academy_contents.form.03') }}</label>
                                <input type="text" name="input-document_url" id="input-document_url" class="form-control @error('input-document_url') is-invalid error-input @enderror" placeholder="{{ __('messages.academy_contents.form.03') }} {{ __('messages.forms.01') }}" maxlength="550" value="{{ old('input-document_url', $academyContent->document_url) }}"/>
                                @if ($errors->has('input-document_url'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-document_url') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6" id="container-document_file">
                            <div class="col-12">
                                <label for="input-document_file" class="required form-label">{{ __('messages.academy_contents.form.07') }}</label>
                                <input class="form-control @error('input-document_file') is-invalid error-input @enderror" id="input-document_file" name="input-document_file" type="file">
                                <div class="invalid-feedback" id="error-document_file"></div>
                                @if ($errors->has('input-document_file'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-document_file') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <!--begin::Name-->
                                        <span class="text-gray-800 text-hover-primary d-flex flex-column">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="{{ asset('assets/media/svg/files/doc.svg') }}" class="theme-light-show" alt="">
                                                <img src="{{ asset('assets/media/svg/files/doc-dark.svg') }}" class="theme-dark-show" alt="">
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bold mb-2">
                                                <a href="{{ route('AcademyContents.DownloadAcademyContent', $academyContent->id) }}" type="button" class="btn btn-sm btn-danger">
                                                    {{ __('messages.academy_contents.form.07.01') }}
                                                </a>
                                            </div>
                                            <!--end::Title-->
                                        </span>
                                        <!--end::Name-->

                                        <!--begin::Description-->
                                        <div class="fs-7 fw-semibold text-gray-500">
                                            {{ __('messages.academy_contents.form.07.02') }}: {{ date('d/m/Y', strtotime($academyContent->created_at)) }}
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="separator border-2 my-10"></div>
                    <button type="submit" class="btn btn-warning btn-sm" form="editForm">
                        <span class="indicator-label">{{ __('messages.forms.05') }}</span>
                        <span class="indicator-progress">{{ __('messages.forms.03') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="{{ route('AcademyContents.Index') }}" class="btn btn-light-danger btn-sm ms-2">{{ __('messages.forms.04') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('PageVendorJS')

@endsection

@section('PageCustomJS')
    <script type="text/javascript">
        if("{{ old('input-academy_content_type', $academyContent->academy_content_type) }}" != "" && $("#input-academy_content_type").val() == "3") {
            $("#container-document_url").show();
            $("#container-document_file").hide();
        } else {
            $("#container-document_url").hide();
            $("#container-document_file").show();
        }

        $('#input-academy_content_type').on('select2:select', function (e) {
            if($("#input-academy_content_type").val() == "3"){
                $("#container-document_url").show();
                $("#container-document_file").hide();
            } else {
                $("#container-document_url").hide();
                $("#container-document_file").show();
            }
        });
    </script>
@endsection

@section('PageModals')

@endsection
