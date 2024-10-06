@extends('layouts.application.layout_application')
@section('PageTitle', __('messages.inventory_data_sets.edit.01'))

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
            <a href="{{ route('InventoryDataSets.Index') }}" class="text-muted text-hover-primary">{{ __('messages.inventory_data_sets.index.01') }}</a>
        </li>
    </ul>
@endsection

@section('PageContent')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-12">
            @if (session('result'))
                <div class="mb-4">
                    @include('components.alert', $data = ['alert_type' => session('result'), 'alert_title' => session('title'), 'alert_content' => session('content')])
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header ribbon ribbon-start ribbon-clip">
                    <div class="ribbon-label bg-warning fs-6" style="padding: 10px 15px;"><span class="d-flex text-white fw-bolder fs-6">{{ __('messages.inventory_data_sets.edit.02') }}</span></div>
                    <h3 class="card-title"></h3>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <form action="{{ route('InventoryDataSets.Update', $inventoryDataSet->id) }}" id="editForm" enctype="multipart/form-data" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="input-data_title" class="required form-label">{{ __('messages.inventory_data_sets.form.02') }}</label>
                                <input type="text" name="input-data_title" id="input-data_title" class="form-control @error('input-data_title') is-invalid error-input @enderror" placeholder="{{ __('messages.inventory_data_sets.form.02') }} {{ __('messages.forms.01') }}" maxlength="1000" value="{{ old('input-data_title', $inventoryDataSet->data_title) }}"/>
                                @if ($errors->has('input-data_title'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_title') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-4">
                                <label for="input-department_id" class="required form-label">{{ __('messages.inventory_data_sets.form.01') }}</label>
                                <select class="form-select @error('input-department_id') is-invalid error-input @enderror" name="input-department_id" id="input-department_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if (old('input-department_id', $inventoryDataSet->department_id) == $department->id) selected="selected" @endif>{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('input-department_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-department_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-inventory_category_id" class="required form-label">{{ __('messages.inventory_data_sets.form.03') }}</label>
                                <select class="form-select @error('input-inventory_category_id') is-invalid error-input @enderror" name="input-inventory_category_id" id="input-inventory_category_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    @foreach($inventoryCategories as $inventoryCategory)
                                        <option value="{{ $inventoryCategory->id }}" @if (old('input-inventory_category_id', $inventoryDataSet->inventory_category_id) == $inventoryCategory->id) selected="selected" @endif>{{ $inventoryCategory->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('input-inventory_category_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-inventory_category_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-inventory_data_type_id" class="required form-label">{{ __('messages.inventory_data_sets.form.04') }}</label>
                                <select class="form-select @error('input-inventory_data_type_id') is-invalid error-input @enderror" name="input-inventory_data_type_id" id="input-inventory_data_type_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    @foreach($inventoryDataTypes as $inventoryDataType)
                                        <option value="{{ $inventoryDataType->id }}" @if (old('input-inventory_data_type_id', $inventoryDataSet->inventory_data_type_id) == $inventoryDataType->id) selected="selected" @endif>{{ $inventoryDataType->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('input-inventory_data_type_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-inventory_data_type_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-data_hold_reason_ids" class="required form-label">{{ __('messages.inventory_data_sets.form.05') }}</label>
                                <select class="form-select @error('input-data_hold_reason_ids') is-invalid error-input @enderror" name="input-data_hold_reason_ids[]" id="input-data_hold_reason_ids" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="false" multiple="multiple">
                                    <option></option>
                                    @foreach($dataHoldReasons as $dataHoldReason)
                                        <option value="{{ $dataHoldReason->id }}" {{ in_array($dataHoldReason->id, old('input-data_hold_reason_ids', json_decode(@$inventoryDataSet->data_hold_reason_ids))) ? 'selected' : '' }}>{{ $dataHoldReason->content }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('input-data_hold_reason_ids'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_hold_reason_ids') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-related_to_id" class="required form-label">{{ __('messages.inventory_data_sets.form.06') }}</label>
                                <select class="form-select @error('input-related_to_id') is-invalid error-input @enderror" name="input-related_to_id" id="input-related_to_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-related_to_id', $inventoryDataSet->related_to_id) == '1' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.06.01') }}</option>
                                    <option value="2" {{ old('input-related_to_id', $inventoryDataSet->related_to_id) == '2' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.06.02') }}</option>
                                    <option value="3" {{ old('input-related_to_id', $inventoryDataSet->related_to_id) == '3' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.06.03') }}</option>
                                </select>
                                @if ($errors->has('input-related_to_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-related_to_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-4">
                                <label for="input-legal_reason" class="required form-label">{{ __('messages.inventory_data_sets.form.07') }}</label>
                                <input type="text" name="input-legal_reason" id="input-legal_reason" class="form-control @error('input-legal_reason') is-invalid error-input @enderror" placeholder="{{ __('messages.inventory_data_sets.form.02') }} {{ __('messages.forms.01') }}" maxlength="1000" value="{{ old('input-legal_reason', $inventoryDataSet->legal_reason) }}"/>
                                @if ($errors->has('input-legal_reason'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-legal_reason') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-data_hold_place" class="required form-label">{{ __('messages.inventory_data_sets.form.08') }}</label>
                                <input type="text" name="input-data_hold_place" id="input-data_hold_place" class="form-control @error('input-data_hold_place') is-invalid error-input @enderror" placeholder="{{ __('messages.inventory_data_sets.form.02') }} {{ __('messages.forms.01') }}" maxlength="1000" value="{{ old('input-data_hold_place', $inventoryDataSet->data_hold_place) }}"/>
                                @if ($errors->has('input-data_hold_place'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_hold_place') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-4">
                                <label for="input-data_hold_time" class="required form-label">{{ __('messages.inventory_data_sets.form.09') }}</label>
                                <input type="text" name="input-data_hold_time" id="input-data_hold_time" class="form-control @error('input-data_hold_time') is-invalid error-input @enderror" placeholder="{{ __('messages.inventory_data_sets.form.02') }} {{ __('messages.forms.01') }}" maxlength="1000" value="{{ old('input-data_hold_time', $inventoryDataSet->data_hold_time) }}"/>
                                @if ($errors->has('input-data_hold_time'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_hold_time') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-6">
                                <label for="input-data_transfer_to_id" class="required form-label">{{ __('messages.inventory_data_sets.form.10') }}</label>
                                <select class="form-select @error('input-data_transfer_to_id') is-invalid error-input @enderror" name="input-data_transfer_to_id" id="input-data_transfer_to_id" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-data_transfer_to_id', $inventoryDataSet->data_transfer_to_id) == '1' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.10.01') }}</option>
                                    <option value="2" {{ old('input-data_transfer_to_id', $inventoryDataSet->data_transfer_to_id) == '2' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.10.02') }}</option>
                                </select>
                                @if ($errors->has('input-data_transfer_to_id'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_transfer_to_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <label for="input-data_to_abroad" class="required form-label">{{ __('messages.inventory_data_sets.form.11') }}</label>
                                <select class="form-select @error('input-data_to_abroad') is-invalid error-input @enderror" name="input-data_to_abroad" id="input-data_to_abroad" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-data_to_abroad', $inventoryDataSet->data_to_abroad) == '1' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.11.01') }}</option>
                                    <option value="0" {{ old('input-data_to_abroad', $inventoryDataSet->data_to_abroad) == '0' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.11.02') }}</option>
                                </select>
                                @if ($errors->has('input-data_to_abroad'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-data_to_abroad') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-kvkk_precaution_ids" class="required form-label">{{ __('messages.inventory_data_sets.form.12') }}</label>
                                <select class="form-select @error('input-kvkk_precaution_ids') is-invalid error-input @enderror" name="input-kvkk_precaution_ids[]" id="input-kvkk_precaution_ids" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="false" multiple="multiple">
                                    <option></option>
                                    @foreach($kvkkPrecautions as $kvkkPrecaution)
                                        <option value="{{ $kvkkPrecaution->id }}" {{ in_array($kvkkPrecaution->id, old('input-kvkk_precaution_ids', json_decode(@$inventoryDataSet->kvkk_precaution_ids))) ? 'selected' : '' }}>{{ $kvkkPrecaution->content }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('input-kvkk_precaution_ids'))
                                    <div class="invalid-feedback">
                                        @ {{ $errors->first('input-kvkk_precaution_ids') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mt-6">
                            <div class="col-12">
                                <label for="input-is_active" class="required form-label">{{ __('messages.inventory_data_sets.form.13') }}</label>
                                <select class="form-select @error('input-is_active') is-invalid error-input @enderror" name="input-is_active" id="input-is_active" data-control="select2" data-placeholder="{{ __('messages.forms.06') }}" data-hide-search="true">
                                    <option></option>
                                    <option value="1" {{ old('input-is_active', $inventoryDataSet->is_active) == '1' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.13.01') }}</option>
                                    <option value="0" {{ old('input-is_active', $inventoryDataSet->is_active) == '0' ? 'selected' : '' }}>{{ __('messages.inventory_data_sets.form.13.02') }}</option>
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
                    <a href="{{ route('InventoryDataSets.Index') }}" class="btn btn-light-danger btn-sm ms-2">{{ __('messages.forms.04') }}</a>
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
