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

<div class="widget-content br-8">
    <!-- Variables -->
    @php 
    $permisos=[];
    $atras= (array_slice($breadcrumb, -2, 1));
    if(isset($update)||isset($nuevo)) {
        foreach ($sistemas as $value => $val) {
        $sistemas_options[$val->id] = $val->siglas;
        }
    }
    else{
        foreach ($sistemas as $value => $val) {
        $sistemas_options[$val->siglas] = $val->siglas;
        }
    }
    @endphp               
    @can('spme.admin.permisos.update')
        @php $permisos['update']='admin.permisos.update';@endphp   
    @endcan
    @can('spme.admin.permisos.delete')
        @php $permisos['delete']='admin.permisos.delete'; @endphp 
    @endcan
    @can('spme.admin.permisos.create')
        @php $permisos['create']='admin.permisos.create'; @endphp 
    @endcan
    @if(isset($update)||isset($nuevo))
        @include('layouts.FormEdit', [
            'table_data' => $row,
            // type = 1) tipo de campo| 2) tamaño | 3) requerido | 4) valor default | 5) editable
            'headers' => [
                'id'        => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'name'      => ['txt'=>'Nombre','type'=>'varchar-45-si-no-si'],
                'descripcion'  => ['txt'=>'Descripción','type'=>'varchar-100-si-null-si'],
                'nivel'    => ['txt'=>'Sistema','type'=>'select-2-si-1-si'],
                'guard_name'   => ['txt'=>'Control','type'=>'varchar-1-si-web-no'],
                'created_at' => ['txt'=>'Creado el','type'=>'timestamp-3-no-null-no'],
                'updated_at' => ['txt'=>'Actualizado el','type'=>'timestamp-3-no-now-no'],
            ],
            'permissions' => $permisos,
            'title'=> '{{isset($update) ? $update : $nuevo}}',
            'atras'  => end($atras),
            'nivel'  => $sistemas_options,
            '{{isset($update) ? update : nuevo}}' => 'Cambios',
        ])
    @else 
        @include('layouts.tableA', [
            'table_data' => $rows, 
            'table_config' => [
                'headers' => [
                    'id'    => 'ID',
                    'name'      => 'Nombre',
                    'descripcion' => 'Descripción',
                    'siglas'      => 'Sistema',
                    'guard_name'     => 'Control',
                ],
                'with_pos' => false,
                'actions'  => [
                    'pagination' => [
                        'options' => [10,20,50],
                        'rows'    => 15
                    ],
                    'export_data' => true,
                    'search_columns'   => [
                        'name' => [
                            'type'        => 'text',
                            'placeholder' => 'Escriba Nombre',
                            'name' => 'Nombre',
                        ],
                        'descripcion' => [
                            'type'        => 'text',
                            'placeholder' => 'Escriba Descripción',
                            'name' => 'Descripción',
                        ],
                        'siglas' => [
                            'type'       => 'select',
                            'options'    => $sistemas_options,
                            'name' => 'Sistema',
                        ],
                    ],
                ],
            ],
            'permissions' => $permisos,
        ])
    @endif
        <!-- FIN Variables -->
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