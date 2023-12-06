@extends('adminlte::page')

@section('title', __('materials.title'))

@section('content_header')
    <h1 class="m-0 text-dark">{{ __('materials.header') }}</h1>
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
      <table>
        <tr>
            <td><x-adminlte-card title="{{ __('materials.material') }}" theme="info" icon="fas fa-lg">
                {{ $material->material }}
            </x-adminlte></td>
            <td><x-adminlte-card title="{{ __('materials.model') }}" theme="info" icon="fas fa-lg">
                {{ $material->model->model }}
            </x-adminlte></td>
            <td><x-adminlte-card title="{{ __('materials.supplier') }}" theme="info" icon="fas fa-lg">
                {{ $material->supplier->company }}
            </x-adminlte></td>
            <td><x-adminlte-card title="{{ __('materials.creator') }}" theme="warning" icon="fas fa-lg">
                {{ $material->creator->name }}
            </x-adminlte-card></td>
        </tr>
        <tr>
            <td colspan="4"><x-adminlte-card title="{{ __('materials.memo') }}" theme="info" icon="fas fa-lg">
                <pre>{{ $material->memo }}</pre>
            </x-adminlte></td>
        </tr>
      </table>
      </div>
   </div>
@endsection
