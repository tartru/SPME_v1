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
        
        @include('layouts.tableA', ['table_data' => $rows, 'table_config' => [
            'headers' => [
                'id'     => 'id',
                'name'   => 'User',
                'email'  => 'Email',
                'full_name'  => 'Nombre',
                'puesto' => 'Puesto',
                'area' => 'Area',
                'ban_reason' => 'Baneo',
                'bloqued' => 'Block',
                'active' => 'Activo',

            ],
            'with_pos' => false,
            'actions'  => [
                'pagination' => [
                    'options' => [10,30,50,100],
                    'rows'    => 10
                ],
                'ordering'         => true,
                'searching'        => true,
                'extras_accordion' => false,
                'export_data'      => true,
            ],
        ],
        'permissions' => [
            'edit'=>'admin.users.edit',
            'delete'=>'admin.users.edit',
            'creat'=>'admin.users.edit',
        ],
        ])
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