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
        $regiones_options = [];
        foreach ($catalogos['regiones'] as $value) {
            $regiones_options[$value->nombre] = $value->nombre;
        }
        @endphp

        @include('layouts.tableA', [
            'table_data' => $rows, 
            'table_config' => [
            'headers'  => [
                'CVE_ENTIDAD'     => 'CVE_ENTIDAD',
                'nombre'          => 'Entidad',
                'abreviacion'     => 'Abreviación',
                'region'          => 'Región',
                'cant_municipios' => 'Cantidad de municipios',
            ],
            'with_pos' => true,
            'actions'  => [
                'pagination' => [
                    'options' => [20,50],
                    'rows'    => 50
                ],
                'ordering'         => true,
                'searching'        => true,
                'extras_accordion' => false,
                'export_data'      => true,
                'search_columns'   => [
                    'CVE_ENTIDAD' => [
                        'type'        => 'text',
                        'placeholder' => 'Filtrar por entidad',
                        'name'        => 'CVE_ENTIDAD',
                    ],
                    'nombre' => [
                        'type'        => 'text',
                        'placeholder' => 'Filtrar por Nombre',
                        'name'        => 'Nombre de entidad',
                    ],
                    'region' => [
                        'type'    => 'select',
                        'options' => $regiones_options,
                        'name'        => 'Nombre de Región',
                    ],
                    'cant_municipios' => [
                        'type' => 'range',
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                        'name'        => 'Rango de Municipios',
                    ],
                ],
            ],
        ]])
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