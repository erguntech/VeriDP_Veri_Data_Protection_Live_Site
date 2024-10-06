@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.gdpr_decrees.edit.01'))

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
            <a href="{{ route('GDPRDecrees.Index') }}" class="text-muted text-hover-primary">{{ __('messages.gdpr_decrees.index.01') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="alert alert-info d-flex align-items-center p-5">
                <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1">@ {{ __('messages.gdpr_decrees.alert.01') }}</h4>
                    <span>- {{ __('messages.gdpr_decrees.alert.02') }}</span>
                </div>
            </div>

            @if (session('result'))
                <div class="mb-4">
                    @include('components.alert', $data = ['alert_type' => session('result'), 'alert_title' => session('title'), 'alert_content' => session('content')])
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-warning fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.gdpr_decrees.edit.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <form action="{{ route('GDPRDecrees.Update', $gdprDecree->id) }}" id="editForm" enctype="multipart/form-data" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="input-title" class="required form-label">{{ __('messages.gdpr_decrees.form.01') }}</label>
                                <input type="text" name="input-title" id="input-title" class="form-control @error('input-title') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_decrees.form.01') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-title', $gdprDecree->title) }}"/>
                                @if ($errors->has('input-title'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-date" class="form-label required">{{ __('messages.gdpr_decrees.form.02') }}</label>
                                <input name="input-date" id="input-date" class="form-control @error('input-date') is-invalid error-input @enderror" placeholder="{{ __('messages.forms.06') }}" value="{{ old('input-date', $gdprDecree->date) }}"/>
                                @if ($errors->has('input-date'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-date') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-6">
                                <label for="input-decree_no" class="required form-label">{{ __('messages.gdpr_decrees.form.03') }}</label>
                                <input type="text" name="input-decree_no" id="input-decree_no" class="form-control @error('input-decree_no') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_decrees.form.03') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-decree_no', $gdprDecree->decree_no) }}"/>
                                @if ($errors->has('input-decree_no'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-decree_no') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-content" class="required form-label">{{ __('messages.gdpr_decrees.form.04') }}</label>
                                <input type="text" name="input-content" id="input-content" class="form-control @error('input-content') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_decrees.form.04') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-content', $gdprDecree->content) }}"/>
                                @if ($errors->has('input-content'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-content') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-sector_id" class="required form-label">{{ __('messages.gdpr_decrees.form.05') }}</label>
                                <select class="form-select @error('input-sector_id') is-invalid error-input @enderror" name="input-sector_id" id="input-sector_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="0" {{ old('input-sector_id', $gdprDecree->sector_id) == '0' ? 'selected' : '' }}>Sağlık Sektörü</option>
                                </select>
                                @if ($errors->has('input-sector_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-sector_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-is_active" class="required form-label">{{ __('messages.gdpr_decrees.form.06') }}</label>
                                <select class="form-select @error('input-is_active') is-invalid error-input @enderror" name="input-is_active" id="input-is_active" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-is_active', $gdprDecree->is_active) == '1' ? 'selected' : '' }}>{{ __('messages.gdpr_decrees.form.06.01') }}</option>
                                    <option value="0" {{ old('input-is_active', $gdprDecree->is_active) == '0' ? 'selected' : '' }}>{{ __('messages.gdpr_decrees.form.06.02') }}</option>
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
                    <button type="submit" class="btn btn-warning btn-sm" form="editForm">
                        <span class="indicator-label">{{ __('messages.forms.05') }}</span>
                        <span class="indicator-progress">{{ __('messages.forms.03') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="{{ route('GDPRDecrees.Index') }}" class="btn btn-light-danger btn-sm ms-2">{{ __('messages.forms.04') }}</a>
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
