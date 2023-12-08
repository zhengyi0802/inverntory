    <div class="row col-12">
      <div class="card-group col-md-12">
        <x-adminlte-card title="{{ __('journals.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="primary" icon-theme="white" fgroup-class="col-md-6" >
          <ul id="tree1">
            @foreach($vendors as $vendor)
              <li>
                 {{ $vendor->company }}
                 @if(count($vendor->products))
                   @include('journals.manageChild', ['childs' => $vendor->products])
                 @endif
              </li>
            @endforeach
          </ul>
        </x-adminlte-card>
        <x-adminlte-card title="{{ __('tables.new').__('journals.table_name') }}" icon="fas fa-lg fa-cog text-primary"
          theme="teal" icon-theme="white" fgroup-class="col-md-6" >
            @include('journals.create')
        </x-adminlte-card>
      </div>
    </div>
<link href="/css/treeview.css" rel="stylesheet">
<script src="/js/treeview.js"></script>

