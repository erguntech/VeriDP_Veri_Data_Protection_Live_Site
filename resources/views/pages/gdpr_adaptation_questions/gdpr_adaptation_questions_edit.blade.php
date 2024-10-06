@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.gdpr_adaptation_questions.edit.01'))

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
            <a href="{{ route('GDPRAdaptationQuestions.Index') }}" class="text-muted text-hover-primary">{{ __('messages.gdpr_adaptation_questions.index.01') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            <div class="alert alert-info d-flex align-items-center p-5">
                <i class="ki-duotone ki-shield-tick fs-2hx text-info me-4"><span class="path1"></span><span class="path2"></span></i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1">@ {{ __('messages.gdpr_adaptation_questions.alert.01') }}</h4>
                    <span>- {{ __('messages.gdpr_adaptation_questions.alert.02') }}</span>
                </div>
            </div>

            @if (session('result'))
                <div class="mb-4">
                    @include('components.alert', $data = ['alert_type' => session('result'), 'alert_title' => session('title'), 'alert_content' => session('content')])
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-warning fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.gdpr_adaptation_questions.edit.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <form action="{{ route('GDPRAdaptationQuestions.Update', $gdprAdaptationQuestion->id) }}" id="editForm" enctype="multipart/form-data" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="input-question_content" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.01') }}</label>
                                <input type="text" name="input-question_content" id="input-question_content" class="form-control @error('input-question_content') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.01') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-question_content', $gdprAdaptationQuestion->question_content) }}"/>
                                @if ($errors->has('input-question_content'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-question_content') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-question_answer" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.02') }}</label>
                                <input type="text" name="input-question_answer" id="input-question_answer" class="form-control @error('input-question_answer') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.02') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-question_answer', $gdprAdaptationQuestion->question_answer) }}"/>
                                @if ($errors->has('input-question_answer'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-question_answer') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-6">
                            <div class="col-6">
                                <label for="input-question_vulnerabilities" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.03') }}</label>
                                <input type="text" name="input-question_vulnerabilities" id="input-question_vulnerabilities" class="form-control @error('input-question_vulnerabilities') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.03') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-question_vulnerabilities', $gdprAdaptationQuestion->question_vulnerabilities) }}"/>
                                @if ($errors->has('input-question_vulnerabilities'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-question_vulnerabilities') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-question_suggestions" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.04') }}</label>
                                <input type="text" name="input-question_suggestions" id="input-question_suggestions" class="form-control @error('input-question_suggestions') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.04') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-question_suggestions', $gdprAdaptationQuestion->question_suggestions) }}"/>
                                @if ($errors->has('input-question_suggestions'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-question_suggestions') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-4">
                                <label for="input-question_score" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.05') }}</label>
                                <input type="text" name="input-question_score" id="input-question_score" class="form-control @error('input-question_score') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.05') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-question_score', $gdprAdaptationQuestion->question_score) }}"/>
                                @if ($errors->has('input-question_score'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-question_score') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-order" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.06') }}</label>
                                <input type="text" name="input-order" id="input-order" class="form-control @error('input-order') is-invalid error-input @enderror" placeholder="{{ __('messages.gdpr_adaptation_questions.form.06') }} {{ __('messages.forms.01') }}" maxlength="50" value="{{ old('input-order', $gdprAdaptationQuestion->order) }}"/>
                                @if ($errors->has('input-order'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-order') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-is_active" class="required form-label">{{ __('messages.gdpr_adaptation_questions.form.07') }}</label>
                                <select class="form-select @error('input-is_active') is-invalid error-input @enderror" name="input-is_active" id="input-is_active" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-is_active', $gdprAdaptationQuestion->is_active) == '1' ? 'selected' : '' }}>{{ __('messages.gdpr_adaptation_questions.form.07.01') }}</option>
                                    <option value="0" {{ old('input-is_active', $gdprAdaptationQuestion->is_active) == '0' ? 'selected' : '' }}>{{ __('messages.gdpr_adaptation_questions.form.07.02') }}</option>
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
                    <a href="{{ route('GDPRAdaptationQuestions.Index') }}" class="btn btn-light-danger btn-sm ms-2">{{ __('messages.forms.04') }}</a>
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
