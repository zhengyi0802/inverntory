@extends('adminlte::page')

@section('title', __('journals.page_title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('journals.page_header') }}</h1>
@stop

@section('content')

    <div class="row col-12">
      @include('journals.treeview')
    </div>

    <div class="row col-12">
      @yield('messages')
    </div>

    <div class="row col-12">
      <div class="card-group col-12">
      <x-adminlte-card title="{{ __('journals.table_name').__('tables.lists') }}" fgroup-class="col-md-12"
        icon="fas fa-lg fa-table text-primary" theme="danger" icon-theme="white" collapsible >
        @include('journals.table')
      </x-adminlte-card>
      </div>
    </div>

@stop
