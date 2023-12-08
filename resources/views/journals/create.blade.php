<form name="journals-form" action="{{ route('journalss.store') }}" method="POST" enctype="multipart/form-data" >
  @csrf
    <div class="card-group">
      <x-adminlte-input type="date" name="record_date" label="{{ __('journalss.record_date') }}" fgroup-class="col-md-6" />
      <x-adminlte-input type="number" name="record_amount" label="{{ __('journalss.record_amount') }}" fgroup-class="col-md-6" />
    </div>
    <div class="card-group">
      <x-adminlte-button class="mr-auto" theme="success" label="{{ __('tables.accept') }}" type="submit"/>
    </div>
</form>

