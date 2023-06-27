@extends('layouts.app')

@push('styles')
    <!-- Datatable Styles -->
    <link href="{{ asset('dx/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatable Style -->

    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->
@endpush


@section('content')
<div class="widget-content widget-content-area br-8">
     <!-- Variables -->
    @php 
    $permisos=[]; 
    @endphp               
    @can('spme.admin.roles.update')
        @php $permisos['update']='admin.roles.update'; @endphp   
    @endcan
    @can('spme.admin.roles.delete')
        @php $permisos['delete']='admin.roles.delete'; @endphp 
    @endcan
    @can('spme.admin.roles.create')
        @php $permisos['create']='admin.roles.create'; @endphp 
    @endcan
    @if(isset($update))
        @include('layouts.FormEdit', [
            'table_data' => $rows, 
            'table_config' => [
                'headers' => [
                'id'     => ['txt'=>'ID','type'=>'int-4-no-auto'],
                'name'   => ['txt'=>'Nombre','type'=>'varchar-125-no-no'],
                'descripcion'  => ['txt'=>'Descripción','type'=>'varchar-125-si-null'],
                'nivel'  => ['text'=>'Nivel','type'=>'int-4-si-0'],
                'guard_name' => ['txt'=>'Guard Name','type'=>'varchar-125-si-null'],
                'created_at' => ['txt'=>'Creado','type'=>'timestamp--si-now'],
                'updated_at' => ['txt'=>'Actualizado','type'=>'timestamp--si-now'],
                ],
            'with_pos' => false,
            'actions'  => [
                'pagination' => [
                    'options' => [10,30,50,100],
                    'rows'    => 15,
                ],
                'ordering'         => true,
                'searching'        => true,
                'extras_accordion' => false,
                'export_data'      => true,
            ],
        ],
        'permissions' => $permisos,
        ])
    
    @else 
        @include('layouts.tableA', [
            'table_data' => $rows,
            'table_config' => [
                'headers' => [
                    'id'       => 'ID',
                    'name'      => 'Nombre',
                    'descripcion' => 'Descripción',
                    'nivel'      => 'Nivel',
                    'guard_name'      => 'Nombre de Grupo',
                    'created_at'      => 'Creado el',
                    'updated_at'      => 'Actualizado el',
                ],
                'with_pos' => false,
                'actions'  => [
                    'pagination' => [
                        'options' => [10,30,50,100],
                        'rows'    => 15,
                    ],
                    'ordering'         => true,
                    'searching'        => true,
                    'extras_accordion' => false,
                    'export_data'      => true,
                ],
            ],
            'permissions' => $permisos,
            ])
    @endif
</div>

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/datatables.js') }}"></script>
    
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
@endpush