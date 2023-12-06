<form name="inbound-form" action="{{ route('productModels.store') }}" method="POST" enctype="multipart/form-data" >
 @csrf
 <x-adminlte-modal id="inboundM" title="{{ __('tables.inbound').__('') }}" theme="teal" size="lg"
   icon="fas fa-bell" v-centered static-backdrop scrollable>
   <input type="text" id="product_id" name="product_id">
   <input type="text" id="record_type" name="type">
   <div class="card-group">
     <x-adminlte-input id="model" name="model" label="{{ __('productModels.model') }}" fgroup-class="col-md-6" disabled/>
     <x-adminlte-input type="date" name="date" label="{{ __('tables.record_date') }}" fgroup-class="col-md-6" value="{{ date('Y/m/d') }}"/>
     <x-adminlte-input type="number" name="amount" label="{{ __('tables.amount') }}" fgroup-class="col-md-6" />
   </div>
   <x-slot name="footerSlot">
     <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
     <x-adminlte-button theme="danger" label="{{ __('tables.dismiss') }}" data-dismiss="modal"/>
   </x-slot>
 </x-adminlte-model>
</form>
