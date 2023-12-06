@extends('adminlte::page')

@section('title', __('materials.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('materials.header') }}</h1>
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
<form id="material-form" action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-4">
                <strong>{{ __('materials.material') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <input type="text" name="material" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <strong>{{ __('materials.model') }} :<span class="must">{{ __('tables.must') }}</span></strong>
                <select id="model_id" name="model_id" >
                      @foreach ($models as $model)
                         <option value="{{ $model->id }}" >{{ $model->model }}</option>
                      @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <strong>{{ __('materials.memo') }} :</strong>
                <textarea name="memo" class="form-control" rows="10"></textarea>
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
        $('#material-form').validate({
           onkeyup: function(element, event) {
               var value = this.elementValue(element).replace(/^\s+/g, "");
               $(element).val(value);
           },
           rules: {
               material: {
                  required: true
               },
               model_id: {
                  required: true
               },
           },
           messages: {
               material: {
                  required: '姓名必填'
               },
               model_id: {
                  required: '產品型號必填'
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
