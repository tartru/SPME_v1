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
    @endphp               
    @can('spme.admin.grupos_capturas.update')
        @php $permisos['update']='admin.grupos_capturas.update';@endphp   
    @endcan
    @can('spme.admin.grupos_capturas.delete')
        @php $permisos['delete']='admin.grupos_capturas.delete'; @endphp 
    @endcan
    @can('spme.admin.grupos_capturas.create')
        @php $permisos['create']='admin.grupos_capturas.create'; @endphp 
    @endcan
        @include('layouts.tableA', [
            'table_data' => $rows,
            'table_config' => [
                'headers' => [
                    'id'      => 'ID',
                    'nombre'      => 'Nombre',
                    'active' => 'Activo',
                    'deleted' => 'Eliminado',
                ],
                'with_pos' => false,
                'actions'  => [
                    'pagination' => [
                        'options' => [15,30,50],
                        'rows'    => 20
                    ],
                    'export_data' => true,

                ],
             ],
            'permissions' => $permisos,
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