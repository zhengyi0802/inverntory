@php
$heads = [
    ['label' =>__('inventories.id'), 'width' => 10],
    __('inventories.monthly'),
    __('inventories.inbound_amount'),
    __('inventories.outbound_amount'),
    __('inventories.defective_amount'),
    __('inventories.chargeback_amount'),
    __('tables.stock_amount'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null, null, null, null, null,  ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp

<x-adminlte-datatable id="inventory-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($inventories as $inventory)
    <tr class="{{ $productModel->status ? null : "bg-gray"}}">
      <td>{{ $inventory->id }}</td>
      <td>{{ $inventory->monthly }}</td>
      <td>{{ $inventory->inbound }}</td>
      <td>{{ $inventory->outbound }}</td>
      <td>{{ $inventory->defective }}</td>
      <td>{{ $inventory->chargeback }}</td>
      <td>{{ $inventory->stock }}</td>
      <td><nobr>
        <x-adminlte-button label="{{ __('tables.detail') }}" onclick="" class="bg-teal" />
      </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
