@php
$heads = [
    ['label' =>__('vendors.id'), 'width' => 10],
    __('vendors.company'),
    __('vendors.country'),
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp

<x-adminlte-datatable id="vendor-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($vendors as $vendor)
    <tr class="{{ $vendor->status ? null : "bg-gray"}}">
      <td>{{ $vendor->id }}</td>
      <td>{{ $vendor->company }}</td>
      <td>{{ $vendor->country }}</td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

