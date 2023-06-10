<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head_adm')

    <body class="{{ (!empty($body_class)) ? $body_class : 'layout-boxed' }}" layout="full-width">

        @include('layouts.top_nav_bar') 

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>
          
                @include('layouts.sidebar') <!--  EDITAR SIDEBAR PARA OPCIONES SOLO DE PAT  -->
            

            <!--  BEGIN CONTENT AREA  -->
                <div id="content" class="main-content">
                    <div class="layout-px-spacing">

                        <div class="middle-content container-xxl p-0">

                            @include('layouts.breadcrumbs')

                            <div class="row layout-top-spacing">

                            <div class="widget-content widget-content-area br-8">
                                                <!-- Variables -->                
                                                @php
                                                $regiones_options = [];
                                                foreach ($catalogos['regiones'] as $value) 
                                                {
                                                    //echo gettype($value), "-";
                                                    //echo ($value->nombre), "</br>";
                                                    $regiones_options[$value->nombre] = $value->nombre;
                                                }
                                                //var_dump($regiones_options); //ver contenido del array
                                                //echo "</br>",$regiones_options[1]; //ver si asigno el indice la llave id
                                                @endphp

                                                @include('layouts.tableA', ['table_data' => $rows, 'table_config' => [
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
                                                                'placeholder' => 'Filtrar',
                                                                'name'        => 'Clave de entidad',
                                                            ],
                                                            'nombre' => [
                                                                'type'        => 'text',
                                                                'placeholder' => 'Filtrar',
                                                                'name'        => 'Entidad',
                                                            ],
                                                            'region' => [
                                                                'type'    => 'select',
                                                                'options' => $regiones_options,
                                                                'name'        => 'regiones',
                                                            ],
                                                            'cant_municipios' => [
                                                                'type' => 'range',
                                                                'min'  => 0,
                                                                'max'  => 800,
                                                                'step' => 1,
                                                                'name'        => 'Numero de mun',
                                                            ],
                                                        ],
                                                    ],
                                                ]])

                                                <!-- FIN Variables -->
                                            </div>
                        </div>
                    </div>

                    
                </div>
            <!--  END CONTENT AREA  -->
            @include('layouts.footer')
        </div>
        <!-- END MAIN CONTAINER -->
        

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        @include('layouts.scripts_mandatory')
        <!-- END GLOBAL MANDATORY SCRIPTS -->

                
        <!-- Livewire Scripts -->
        @include('layouts.scripts_livewire')
        <!-- Scripts json -->

        <script>
            var regiones  = @php echo json_encode($catalogos['regiones']) @endphp
            var entidades = @php echo json_encode($catalogos['entidades']) @endphp

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
        <!-- FIN livewireScripts -->
    @livewireScripts

    @stack('scripts')
    </body>
</html>
    </body>
</html>