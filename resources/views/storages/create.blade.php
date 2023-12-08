@extends('adminlte::page')

@section('title', __('storages.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('storages.header') }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>{{ __('tables.new') }}</h1>
        </div>
        @include('layouts.back')
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
   .error {
      color       : red;
      margin-left : 5px;
      font-size   : 12px;
   }
   label.error {
      display     : inline;
   }
   span.must {
      color     : red;
      font-size : 12px;
   }
</style>
<form id="storage-form" action="{{ route('storages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>{{ __('storages.tag') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="tag" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.name') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.contactor') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="contactor" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.phone') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.address') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.memo') }} :</strong>
                <textarea name="memo" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('storages.type') }} :</strong>
                <select name="type" class="form-control">
                    <option value="1">{{ trans_choice('storages.types', 1) }}</option>
                    <option value="2">{{ trans_choice('storages.types', 2) }}</option>
                    <option value="3">{{ trans_choice('storages.types', 3) }}</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ __('tables.submit') }}</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#storage-form').validate({
           onkeyup: function(element, event) {
               var value = this.elementValue(element).replace(/^\s+/g, "");
               $(element).val(value);
           },
           rules: {
               tag: {
                  required: true
               },
               name: {
                  required: true
               },
               contactor: {
                  required: true
               },
               phone: {
                  required: true
               },
               address: {
                  required: true
               },
           },
           messages: {
               tag: {
                  required: '代碼必填'
               },
               name: {
                  required: '倉儲名稱必填'
               },
               contactor: {
                  required: '聯絡人姓名必填'
               },
               phone: {
                  required: '電話必填'
               },
               address: {
                  required: '地址必填'
               },
           },
           submitHandler: function(form) {
                form.submit();
           }
        });
    });
</script>
@section('plugins.jqueryValidation', true)

@endsection
