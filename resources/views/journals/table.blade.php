@php
$heads = [
    ['label' =>__('journals.index'), 'width' => 10],
    __('journals.record_date'),
    __('journals.inbound'),
    __('journals.outbound'),
    __('journals.defective'),
    __('journals.chargeback'),
    __('journals.amount'),
    ['label' => __('tables.action'), 'no-export' => true, 'width' => 10],
];
$config = [
    'columns' => [null, null, null, null, null, null, null, ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Chinese.json' ],
];
@endphp
<x-adminlte-datatable id="product-type-table" :heads="$heads" :config="$config" theme="info" striped hoverable>
  @foreach($journals as $journal)
    <tr>
      <td>{!! $journal->id !!}</td>
      <td>{!! $journal->record_date !!}</td>
      <td>{!! $journal->inbound !!}</td>
      <td>{!! $journal->outbound !!}</td>
      <td>{!! $journal->defective !!}</td>
      <td>{!! $journal->chargeback !!}</td>
      <td>{!! $journal->amount !!}</td>
       <td><nobr>
         <form name="journal-delete-form" action="{{ route('journals.destroy', $journal->id); }}" method="POST">
           @csrf
           @method('DELETE')
           @if ($journal->created_by != 1)
             <x-adminlte-button theme="primary" title="{{ __('tables.edit') }}" icon="fa fa-lg fa-fw fa-pen"
               onClick="window.location='{{ route('journals.edit', $journal->id); }}'" >
             </x-adminlte-button>
             <x-adminlte-button theme="danger" title="{{ __('tables.delete') }}" icon="fa fa-lg fa-fw fa-trash"
               type="submit" >
             </x-adminlte-button>
           @endif
           <x-adminlte-button theme="info" title="{{ __('tables.detail') }}" icon="fa fa-lg fa-fw fa-eye"
             onClick="window.location='{{ route('journals.show', $journal->id); }}'" >
           </x-adminlte-button>
         </form>
       </nobr></td>
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

