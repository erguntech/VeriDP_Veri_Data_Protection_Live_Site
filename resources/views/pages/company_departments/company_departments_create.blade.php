@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.company_departments.create.01'))

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
            <a href="{{ route('CompanyDepartments.Index') }}" class="text-muted text-hover-primary">{{ __('messages.company_departments.index.01') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="alert alert-info d-flex align-items-center p-5">
                <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1">@ {{ __('messages.company_departments.alert.01') }}</h4>
                    <span>- {{ __('messages.company_departments.alert.02') }}</span>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-success fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.company_departments.create.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <form action="{{ route('CompanyDepartments.Store') }}" id="createForm" enctype="multipart/form-data" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="input-department_name" class="required form-label">{{ __('messages.company_departments.form.01') }}</label>
                                <input type="text" name="input-department_name" id="input-department_name" class="form-control @error('input-department_name') is-invalid error-input @enderror" placeholder="{{ __('messages.company_departments.form.01') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-department_name') }}"/>
                                @if ($errors->has('input-department_name'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-department_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-is_active" class="required form-label">{{ __('messages.company_departments.form.02') }}</label>
                                <select class="form-select @error('input-is_active') is-invalid error-input @enderror" name="input-is_active" id="input-is_active" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-is_active') == '1' ? 'selected' : '' }}>{{ __('messages.company_departments.form.02.01') }}</option>
                                    <option value="0" {{ old('input-is_active') == '0' ? 'selected' : '' }}>{{ __('messages.company_departments.form.02.02') }}</option>
                                </select>
                                @if ($errors->has('input-is_active'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-is_active') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="separator border-2 my-10"></div>
                    <button type="submit" class="btn btn-success btn-sm" form="createForm">
                        <span class="indicator-label">{{ __('messages.forms.02') }}</span>
                        <span class="indicator-progress">{{ __('messages.forms.03') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="{{ route('CompanyDepartments.Index') }}" class="btn btn-light-danger btn-sm ms-2">{{ __('messages.forms.04') }}</a>
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
