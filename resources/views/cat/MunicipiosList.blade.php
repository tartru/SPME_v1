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
        $regiones_options = [];
        foreach ($catalogos['regiones'] as $value) {
            $regiones_options[$value->nombre] = $value->nombre;
        }
        //var_dump($regiones_options);
        
        $entidades_options = [];
        foreach ($catalogos['entidades'] as $value) {
        $entidades_options[$value->nombre] = $value->nombre;
        }
        //var_dump($entidades_options);
        @endphp   

        @include('layouts.tableA', ['table_data' => $rows, 'table_config' => [
            'headers'  => [
                'CVE_ENT_MUN' => 'CVE_ENT_MUN',
                'CVE_MUN'     => 'CVE_MUN',
                'nombre'      => 'Municipio',
                'entidad'     => 'Entidad federativa',
                'region'      => 'Región',
            ],
            'with_pos' => true,
            'actions'  => [
                'pagination' => [
                    'options' => [20,50,100],
                    'rows' => 50
                ],
                'extras_accordion' => false,
                'export_data'      => true,
                'search_columns'   => [
                    'CVE_ENT_MUN' => [
                        'type'        => 'text',
                        'placeholder' => 'filtrar',
                        'name' => 'Clave de Entidad Municipal',
                    ],
                    'CVE_MUN' => [
                        'type'        => 'text',
                        'placeholder' => 'filtrar',
                        'name' => 'Clave de Municipio',
                    ],
                    'nombre' => [
                        'type'        => 'text',
                        'placeholder' => 'filtrar',
                        'name' => 'Municipio',
                    ],
                    'region' => [
                        'type'       => 'select',
                        'options'    => $regiones_options,
                        'dependents' => ['entidad'],
                        'name' => 'Región',
                    ],
                    'entidad' => [
                        'type'    => 'select',
                        'options' => $entidades_options,
                        'name' => 'Entidad federativa',
                    ],
                ],
            ],
            'col_templates' => [
                'entidad' => 'admin.municipios.link_to_entidades',
                'region'  => 'admin.municipios.link_to_regiones'
            ]
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

    
    <script>
        $(document).ready(function () {
        var table = $('#zero-config').DataTable();
    
            $('#zero-config tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
    
            $('#button').click(function () {
                alert(table.rows('.selected').data().length + ' row(s) selected');
            });

            buttons: ['copy', 'excel', 'pdf']

        });
    </script>
    
    <script>
        var regiones  = @php echo json_encode($catalogos['regiones']) @endphp;
        var entidades = @php echo json_encode($catalogos['entidades']) @endphp;

        window.addEventListener("load", function() {
            $('.dataTables-filter-wrapper [data-filter-column-name="region"]').on('change',function() {
                let ef_filter = $('.dataTables-filter-wrapper [data-filter-column-name="entidad"]');
                ef_filter.empty();

                let _region = 0;
                for ( let _temp in regiones ) {
                    if ( regiones[_temp]['nombre'] == this.value ) {
                        _region = regiones[_temp]['id'];
                        break;
                    }
                }


                if ( typeof _region != 0 ) {
                    ef_filter.append('<option value=""></option>');
                    for ( let entF in entidades) {
                        if (entidades[entF]['cat_regione_id'] == _region){
                          ef_filter.append(`<option value="${entidades[entF]['nombre']}">${entidades[entF]['nombre']}</option>`);
                        }
                    }
                }
                if ( _region == 0 ) {
                    ef_filter.empty();
                    ef_filter.append('<option value=""></option>');
                    for ( let entF in entidades ) {
                        ef_filter.append(`<option value="${entidades[entF]['nombre']}">${entidades[entF]['nombre']}</option>`);
                    }
                    console.log(ef_filter);
                }
            });

            
        });
    </script>
@endpush