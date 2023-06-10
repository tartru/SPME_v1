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

    <!-- Accordions -->
    <link href="{{ asset('dx/src/assets/css/dark/components/accordions.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dx/src/assets/css/light/components/accordions.css') }}" rel="stylesheet" type="text/css">
    <!-- Accordions -->
@endpush


@section('content')

    <div class="row layout-top-spacing">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                @php
                    $regiones_options = [];
                    foreach ( $catalogos['regiones'] as $t_region_key => $t_region_value ) {
                        $regiones_options[$t_region_value] = $t_region_value;
                    }
                @endphp

                @include('layouts.table1', ['table_data' => $rows, 'table_config' => [
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
                            'options' => [10,20,50],
                            'rows'    => 50
                        ],
                        'ordering'         => true,
                        'searching'        => true,
                        'extras_accordion' => false,
                        'export_data'      => true,
                        'search_columns'   => [
                            'CVE_ENTIDAD' => [
                                'type'        => 'text',
                                'placeholder' => 'filtrar',
                            ],
                            'nombre' => [
                                'type'        => 'text',
                                'placeholder' => 'filtrar',
                            ],
                            'region' => [
                                'type'    => 'select',
                                'options' => $regiones_options,
                            ],
                            'cant_municipios' => [
                                'type' => 'range',
                                'min'  => 0,
                                'max'  => 800,
                                'step' => 1,
                            ],
                        ],
                    ],
                ]])
            </div>
        </div>

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