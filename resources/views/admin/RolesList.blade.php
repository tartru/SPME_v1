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
    if(isset($sistemas)) {
        foreach ($sistemas as $value => $val) {
        $sistemas_options[$val->siglas] = $val->siglas;
        }
    }
    @endphp      
             
    @include('layouts.tableB', [
        'table_data' => $rows,
        'table_config' => [
            'headers' => [
                'id'       => 'ID',
                'name'      => 'Nombre',
                'descripcion' => 'Descripción',
                'siglas'      => 'Sistema',
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
        'sistemas'=>$sistemas,
        ])
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