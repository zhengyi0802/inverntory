@php
$heads = [
    ['label' =>__('inventories.id'), 'width' => 10],
    __('inventories.model'),
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
    'columns' => [null, null, null, null, null, null, null, null,  ['orderable' => false]],
    'language' => [ 'url' => '//cdn.datatables.net/plug-ins/1.13.4/i18n/zh-HANT.json' ],
];
@endphp
@include('inventories.create')
<x-adminlte-datatable id="productModel-table" :heads="$heads" :config="$config" theme="info" head-theme="dark" striped hoverable bordered>
  @foreach($productModels as $productModel)
    <tr class="{{ $productModel->status ? null : "bg-gray"}}">
      <td>{{ $productModel->id }}</td>
      <td>{{ $productModel->model }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->monthly : null }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->inbound : null }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->outbound : null }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->defective : null }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->chargeback : null }}</td>
      <td>{{ ($productModel->inventory()) ? $productModel->inventory()->stock : null }}</td>
      <td><nobr>
        <x-adminlte-button label="{{ __('tables.inbound') }}" data-toggle="modal" data-target="#inboundM"
          data-id="{{ $productModel->id }}" data-model="{{ $productModel->model }}" data-ptype="1"
          data-title1="{{ __('tables.inbound') }}" class="bg-primary" />
        <x-adminlte-button label="{{ __('tables.outbound') }}" data-toggle="modal" data-target="#inboundM"
          data-id="{{ $productModel->id }}" data-model="{{ $productModel->model }}" data-ptype="2"
          data-title1="{{ __('tables.outbound') }}" class="bg-secondary" />
        <x-adminlte-button label="{{ __('tables.defective') }}" data-toggle="modal" data-target="#inboundM"
          data-id="{{ $productModel->id }}" data-model="{{ $productModel->model }}" data-ptype="3"
          data-title1="{{ __('tables.defective') }}" class="bg-danger" />
        <x-adminlte-button label="{{ __('tables.chargeback') }}" data-toggle="modal" data-target="#inboundM"
          data-id="{{ $productModel->id }}" data-model="{{ $productModel->model }}" data-ptype="4"
          data-title1="{{ __('tables.chargeback') }}" class="bg-teal" />
      </nobr></td?
    </tr>
  @endforeach
</x-adminlte-datatable>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('#inboundM').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var model = button.data('model');
        var rtype = button.data('ptype');
        var title1 = button.data('title1');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //var modal = $(this);
        //modal.find('.modal-title').text(title +'('+ recipient) + ')';
        $('#product_id').val(id);
        $('#model').val(model);
        $('record_type').val(rtype);
})
</script>

