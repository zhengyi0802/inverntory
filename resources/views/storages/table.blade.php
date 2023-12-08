@php
$heads = [
    ['label' =>__('storages.id'), 'width' => 10],
    __('storages.tag'),
    __('storages.name'),
    __('storages.type'),
    __('storages.contactor'),
    __('storages.phone'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null, null, null, null, ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp

<x-adminlte-datatable id="storage-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($storages as $storage)
    <tr class="{{ $storage->status ? null : "bg-gray"}}">
      <td>{{ $storage->id }}</td>
      <td>{{ $storage->tag }}</td>
      <td>{{ $storage->name }}</td>
      <td>{{ trans_choice('storages.types', $storage->type) }}</td>
      <td>{{ $storage->contactor }}</td>
      <td>{{ $storage->phone }}</td>
      <td><nobr>
          <form name="storage-delete-form" action="{{ route('storages.destroy', $storage->id); }}" method="POST">
            @csrf
            @method('DELETE')
            @if (auth()->user()->role <= App\Enums\UserRole::Manager)
              <x-adminlte-button theme="primary" title="{{ __('tables.edit') }}" icon="fa fa-lg fa-fw fa-pen"
                onClick="window.location='{{ route('storages.edit', $storage->id); }}'" >
              </x-adminlte-button>
            @endif
            @if (auth()->user()->role <= App\Enums\UserRole::Manager && $storage->status)
              <x-adminlte-button theme="danger" title="{{ __('tables.delete') }}" icon="fa fa-lg fa-fw fa-trash"
                type="submit" onclick="return confirm('{{ __('tables.confirm_delete') }}');">
              </x-adminlte-button>
            @endif
              <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
                onClick="window.location='{{ route('storages.show', $storage->id); }}'" >
              </x-adminlte-button>
            </form>
      </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

