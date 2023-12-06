@php
$heads = [
    ['label' =>__('materials.id'), 'width' => 10],
    __('materials.material'),
    __('materials.model'),
    __('materials.supplier'),
    __('materials.creator'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'order' => [[0, 'desc']],
    'columns' => [null, null, null, null, null, ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp

<x-adminlte-datatable id="material-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($materials as $material)
    <tr class="{{ $material->status ? null : "bg-gray"}}">
      <td>{{ $material->id }}</td>
      <td>{{ $material->material }}</td>
      <td>{{ $material->model->model }}</td>
      <td>{{ ($material->supplier_id > 0) ? $material->supplier->company : null }}</td>
      <td>{{ $material->creator->name }}</td>
      <td><nobr>
          <form name="material-delete-form" action="{{ route('materials.destroy', $material->id); }}" method="POST">
            @csrf
            @method('DELETE')
            @if (auth()->user()->role <= App\Enums\UserRole::Manager)
              <x-adminlte-button theme="primary" title="{{ __('tables.edit') }}" icon="fa fa-lg fa-fw fa-pen"
                onClick="window.location='{{ route('materials.edit', $material->id); }}'" >
              </x-adminlte-button>
            @endif
            @if (auth()->user()->role <= App\Enums\UserRole::Manager && $material->status)
              <x-adminlte-button theme="danger" title="{{ __('tables.delete') }}" icon="fa fa-lg fa-fw fa-trash"
                type="submit" onclick="return confirm('{{ __('tables.confirm_delete') }}');">
              </x-adminlte-button>
            @endif
              <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
                onClick="window.location='{{ route('materials.show', $material->id); }}'" >
              </x-adminlte-button>
            </form>
      </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

