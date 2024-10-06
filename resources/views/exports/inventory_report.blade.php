@php $count=1; @endphp
<table>
    <thead>
    <tr>
        <th style="width: 75px; background-color: #0a171e; color: white; text-align: center;">{{ __('messages.inventory_data_sets.excel.00') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.01') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.02') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.03') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.04') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.05') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.06') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.07') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.08') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.09') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.10') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.11') }}</th>
        <th style="width: 200px; background-color: #0a171e; color: white; text-align: left;">{{ __('messages.inventory_data_sets.excel.12') }}</th>
    </tr>
    </thead>
    <tbody>


    {{ __('messages.inventory_data_sets.form.06.02') }}
    {{ __('messages.inventory_data_sets.form.06.03') }}

    @foreach($inventoryDataSets as $inventoryDataSet)
        <tr>
            <td style="text-align: center;">{{ $count }}</td>
            <td>{{ $inventoryDataSet->linkedDepartment->department_name }}</td>
            <td>{{ $inventoryDataSet->data_title }}</td>
            <td>{{ $inventoryDataSet->linkedInventoryCategory->name }}</td>
            <td>{{ $inventoryDataSet->linkedInventoryDataType->name }}</td>
            <td>
                @foreach(json_decode($inventoryDataSet->data_hold_reason_ids) as $key => $dataHoldReason)
                    {{ \App\Models\DataHoldReason::find($dataHoldReason)->content }}
                    @if($key != array_key_last(json_decode($inventoryDataSet->data_hold_reason_ids)))
                        |
                    @endif
                @endforeach
            </td>
            @switch($inventoryDataSet->related_to_id)
                @case('1')
                    <td>{{ __('messages.inventory_data_sets.form.06.01') }}</td>
                    @break
                @case('2')
                    <td>{{ __('messages.inventory_data_sets.form.06.01') }}</td>
                    @break
                @case('3')
                    <td>{{ __('messages.inventory_data_sets.form.06.01') }}</td>
                    @break
                @default
                    <td>{{ __('messages.inventory_data_sets.form.14') }}</td>
            @endswitch
            <td>{{ $inventoryDataSet->legal_reason }}</td>
            <td>{{ $inventoryDataSet->data_hold_place }}</td>
            <td>{{ $inventoryDataSet->data_hold_time }}</td>
            @switch($inventoryDataSet->data_transfer_to_id)
                @case('1')
                    <td>{{ __('messages.inventory_data_sets.form.10.01') }}</td>
                    @break
                @case('2')
                    <td>{{ __('messages.inventory_data_sets.form.10.01') }}</td>
                    @break
                @case('3')
                    <td>{{ __('messages.inventory_data_sets.form.10.01') }}</td>
                    @break
                @default
                    <td>{{ __('messages.inventory_data_sets.form.14') }}</td>
            @endswitch
            @switch($inventoryDataSet->data_to_abroad)
                @case('1')
                    <td>{{ __('messages.inventory_data_sets.form.11.01') }}</td>
                    @break
                @case('0')
                    <td>{{ __('messages.inventory_data_sets.form.11.02') }}</td>
                    @break
                @default
                    <td>{{ __('messages.inventory_data_sets.form.14') }}</td>
            @endswitch
            <td>
                @foreach(json_decode($inventoryDataSet->kvkk_precaution_ids) as $key => $kvkkPrecautions)
                    {{ \App\Models\KVKKPrecaution::find($kvkkPrecautions)->title."(".\App\Models\KVKKPrecaution::find($kvkkPrecautions)->content.")" }}
                    @if($key != array_key_last(json_decode($inventoryDataSet->kvkk_precaution_ids)))
                        |
                    @endif
                @endforeach
            </td>
            <td>{{ $inventoryDataSet->linkedInventoryDataType->kvkk_precaution_ids }}</td>
        </tr>
        @php $count+=1; @endphp
    @endforeach
    </tbody>
</table>
