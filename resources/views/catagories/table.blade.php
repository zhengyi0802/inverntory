@php
$heads = [
    ['label' =>__('catagories.id'), 'width' => 10],
    __('catagories.name'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp

<x-adminlte-datatable id="catagory-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($catagories as $catagory)
    <tr class="{{ $catagory->status ? null : "bg-gray"}}">
      <td>{{ $catagory->id }}</td>
      <td>{{ $catagory->name }}</td>
      <td><nobr>
        <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
            onClick="window.location='{{ route('catagories.show', $catagory->id); }}'" >
        </x-adminlte-button>
      </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

