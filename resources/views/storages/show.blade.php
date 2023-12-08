@extends('adminlte::page')

@section('title', __('storages.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('storages.header') }}</h1>
@stop
<style>
    div.upgrade {
        margin-bottom : 20px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>{{ __('tables.details') }}</h1>
            </div>
            @include('layouts.back')
        </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <x-adminlte-card title="{{ __('storages.tag') }}" theme="info" icon="fas fa-lg">
                {{ $storage->tag }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.name') }}" theme="info" icon="fas fa-lg">
                {{ $storage->name }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.contactor') }}" theme="info" icon="fas fa-lg">
                {{ $storage->contactor }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.phone') }}" theme="info" icon="fas fa-lg">
                {{ $storage->phone }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.address') }}" theme="info" icon="fas fa-lg">
                {{ $storage->address }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.memo') }}" theme="info" icon="fas fa-lg">
                <pre>{{ $storage->memo }}</pre>
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.type') }}" theme="info" icon="fas fa-lg">
                {{ trans_choice('storages.types', $storage->type) }}
        </x-adminlte>
        <x-adminlte-card title="{{ __('storages.creator') }}" theme="warning" icon="fas fa-lg">
                {{ $storage->creator->name }}
        </x-adminlte-card>
     </div>
   </div>
@endsection
