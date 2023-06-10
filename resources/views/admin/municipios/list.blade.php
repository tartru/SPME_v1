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
                        $regiones_options[$t_region_value['region']] = $t_region_value['region'];
                        //echo $t_region_key; //6 vueltas una por cada region
                        //echo "</br> </br>".print_r($t_region_value); //6 vueltas una por cada region
                        //echo "</br>".$regiones_options[$t_region_value['region']];
                    }
                    var_dump($regiones_options);
                    
                    $entidades_options = [];
                    foreach ( $catalogos['entidades'] as $t_entidad_key => $t_entidad_value ) {
                        $entidades_options[$t_entidad_value] = $t_entidad_value;
                        //echo $entidades_options[$t_entidad_value] = $t_entidad_value;
                    }
                    var_dump($entidades_options);
                @endphp
                
                @include('layouts.table1', ['table_data' => $rows, 'table_config' => [
                    'headers'  => [
                        'cve_ent_mun' => 'cve_ent_mun',
                        'cve_mun'     => 'cve_mun',
                        'nombre'      => 'Municipio',
                        'entidad'     => 'Entidad federativa',
                        'region'      => 'Región',
                    ],
                    'with_pos' => true,
                    'actions'  => [
                        'server_side' => [
                            'url'  => route('admin_municipios_filtered'),
                            'type' => 'POST'
                        ],
                        'pagination' => [
                            'options' => [50,100,200],
                            'rows'    => 50
                        ],
                        'extras_accordion' => false,
                        'export_data'      => true,
                        'search_columns'   => [
                            'cve_ent_mun' => [
                                'type'        => 'text',
                                'placeholder' => 'filtrar',
                            ],
                            'cve_mun' => [
                                'type'        => 'text',
                                'placeholder' => 'filtrar',
                            ],
                            'nombre' => [
                                'type'        => 'text',
                                'placeholder' => 'filtrar',
                            ],
                            'region' => [
                                'type'       => 'select',
                                'options'    => $regiones_options,
                                'dependents' => ['entidad'],
                            ],
                            'entidad' => [
                                'type'    => 'select',
                                'options' => $entidades_options,
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
<!-- Scripts json -->

    <script>
        var regiones  = @php echo json_encode($catalogos['regiones']) @endphp;
        var entidades = @php echo json_encode($catalogos['entidades']) @endphp;

        window.addEventListener("load", function() {
            $('.dataTables-filter-wrapper [data-filter-column-name="region"]').on('change',function() {
                let ef_filter = $('.dataTables-filter-wrapper [data-filter-column-name="entidad"]');
                ef_filter.empty();

                let _region = '';
                for ( let _temp in regiones ) {
                    if ( regiones[_temp]['region'] == this.value ) {
                        _region = _temp;
                        break;
                    }
                }

                if ( typeof regiones[_region] != "undefined" ) {
                    ef_filter.append('<option value=""></option>');
                    for ( let entF in regiones[_region]['entidades'] ) {
                        ef_filter.append(`<option value="${regiones[_region]['entidades'][entF]['entidad_federativa']}">${regiones[_region]['entidades'][entF]['entidad_federativa']}</option>`);
                    }
                }
                else {
                    ef_filter.append('<option value=""></option>');
                    for ( let entF in entidades ) {
                        ef_filter.append(`<option value="${entF}">${entidades[entF]}</option>`);
                    }
                }
            });
        });
    </script>
@endpush