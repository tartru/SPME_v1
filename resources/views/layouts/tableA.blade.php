@php
//var_dump($table_config[headers]); // muestra datos recibidos
$_data_table_id = (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config';

@endphp
<div class="widget-content widget-content-area br-8">
    {{-- Bloques previos --}}
        @if ( !empty($table_config) && !empty($table_config['previous']) )
            @foreach ( $table_config['previous'] as $_t_prev_key => $_t_prev )
                @if ( is_int($_t_prev_key) )
                    @include($_t_prev)
                @else
                    @include($_t_prev_key,$_t_prev)
                @endif
            @endforeach
        @endif
    {{-- Bloques previos --}}
    {{-- Filtrado por columna --}}
        @if ( !empty($table_config) && !empty($table_config['actions']) && !empty($table_config['actions']['search_columns']) )
            @if (!empty($table_config) && !empty($table_config['actions']) && !empty($table_config['actions']['extras_accordion']) )
                <div id="{{ $_data_table_id }}-filter-accordion-wrapper" class="dataTables-filter-wrapper no-outer-spacing accordion">
                    <div class="card">
                        
                        <div class="card-header" id="{{ $_data_table_id }}-filter-accordion-heading">
                            <section class="mb-0 mt-0">
                                <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#{{ $_data_table_id }}-filter-accordion" aria-expanded="false" aria-controls="{{ $_data_table_id }}-filter-accordion">
                                    <span class="size-120">Filtrar: </span>  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                </div>
                            </section>
                        </div>

                        <div id="{{ $_data_table_id }}-filter-accordion" class="collapse" aria-labelledby="{{ $_data_table_id }}-filter-accordion-heading" data-bs-parent="#{{ $_data_table_id }}-filter-accordion-wrapper">
                            <div class="card-body">
            @else
                <div class="dataTables-filter-wrapper card">
                    <div class="card-body">
                        <h5 class="card-title accordion-header-like">Filtrar Resultados</h5>
            @endif
            
            {{-- opciones de filtros --}}
            @php //num de columnas para filtros
                $_t_f_cont = 0;
                $_sc_cant  = count($table_config['actions']['search_columns']); 
            @endphp
            @foreach ( $table_config['actions']['search_columns'] as $_h_key => $_s_c_val) {{--para cada accion imprime su campo/selec correspondiente--}}
                @if ( $_t_f_cont == 0 || $_t_f_cont % 4 == 0 )
                <div class="row" data-filter-wrapper="true">
                @endif
                @php //PRUEBAS - IMPRESION DE VARIABLES
                //echo gettype($_h_key), "-";
                //echo ($_h_key), "</br>"; //header id
                //var_dump($_h_key); //contiene el nombre las acciones[search columns]
                //var_dump($_s_c_val);  //array de configuraciones de las acciones y array de selects
                //var_dump($_sc_cant); //numero de acciones
                @endphp
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-3">
                        <label class="simple-label">
                            {{ $_s_c_val['name'] }}:{{--nombre de campo-accion a mostrar--}}
                            @if ( $_s_c_val['type'] == 'text' )
                                <input type="text" class="form-control" data-filter-column="text" data-filter-column-name="{{ $_h_key }}" {{ (!empty($_s_c_val['placeholder'])) ? 'placeholder='.$_s_c_val['placeholder'] : '' }}>

                            @elseif ( $_s_c_val['type'] == 'select' )
                                <select class="form-control simple-select" data-filter-column="select" data-filter-column-name="{{ $_h_key }}">
                                    <option value=""></option>
                                    @foreach ( $_s_c_val['options'] as $_t_f_opt_key => $_t_f_opt_val )
                                        <option value="{{ $_t_f_opt_key }}">{{ $_t_f_opt_val }}</option>
                                    @endforeach
                                </select>

                            @elseif ( $_s_c_val['type'] == 'range' )
                                <input type="number" data-filter-column="range" data-filter-column-range-type="min" data-filter-column-name="{{ $_h_key }}"
                                    {{ (isset($_s_c_val['min'])) ? 'min='.$_s_c_val['min'] : '' }}
                                    {{ (isset($_s_c_val['max'])) ? 'max='.$_s_c_val['max'] : '' }}
                                    {{ (isset($_s_c_val['step'])) ? 'step='.$_s_c_val['step'] : '' }}>
                                <span class="size-80">hasta:</span>
                                <input type="number" data-filter-column="range" data-filter-column-range-type="max" data-filter-column-name="{{ $_h_key }}"
                                    {{ (isset($_s_c_val['min'])) ? 'min='.$_s_c_val['min'] : '' }}
                                    {{ (isset($_s_c_val['max'])) ? 'max='.$_s_c_val['max'] : '' }}
                                    {{ (isset($_s_c_val['step'])) ? 'step='.$_s_c_val['step'] : '' }}>
                            @endif
                        </label>
                    </div>
                @if ( ($_t_f_cont + 1) % 4 == 0 || ($_t_f_cont + 1) == $_sc_cant )
                    </div>
                @endif
                @php
                    $_t_f_cont++;
                @endphp
            @endforeach
            {{-- FIN opciones de filtros --}}

            @if (!empty($table_config) && !empty($table_config['actions']) && !empty($table_config['actions']['extras_accordion']) )
                            </div>
                        </div>
                    </div>
                </div>
            @else
                    </div>
                </div>
            @endif
        @endif
    {{-- Filtrado por columna --}}
    
    {{-- Tabla de datos --}}
        <table id="{{ $_data_table_id }}" class="table table-striped dt-table-hover text-wrap" style="width:auto;">
            {{-- Encabezados de tabla --}}
            <thead>
                    @if ( !empty($table_config['with_pos']) )
                        <th>#</th>
                    @endif

                    @foreach ( $table_config['headers'] as $_h_key => $_h_val )
                        <th data-datatable-column="{{ $_h_key }}">{{ $_h_val }}</th>
                    @endforeach
                    {{-- celda de titulo de botones de permisos --}}
                    @if (!empty($permissions))
                        <th><div class="row">
                                <div class="col">Acciónes<div>
                                @if ( !empty($permissions['create']))
                                    <a type="button" class="btn btn-success btn-sm m-1 p-1 rounded" href="{{route($permissions['create'])}}">Agregar</a>
                                @endif
                            </div>
                        </th>
                    @endif
            </thead>
            {{-- cuerpo de tabla --}}
            <tbody> 
                @if ( !empty($table_config['row_template']) )
                    
                    @foreach ( $table_data as $r_pos => $row )
                        @include($table_config['row_template'], ['row' => $row, 'r_pos' => $r_pos])
                    @endforeach

                @elseif ( !empty($table_config['with_pos']) )
                    @php
                        $t_pos = 1;
                    @endphp
                    
                    @foreach ($table_data as $r_pos => $row )
                        <tr>
                            <td>{{ $t_pos }}</td>

                            @foreach ( $table_config['headers'] as $_h_key => $_h_val )
                                <td>
                                    @if ( !empty($table_config['col_templates']) && isset($table_config['col_templates'][$_h_key]) )
                                        @include($table_config['col_templates'][$_h_key], ['row' => $row, 'c_key' => $_h_key, 'r_pos' => $r_pos])
                                    @else
                                        {{$row->$_h_key}}
                                    @endif
                                </td>
                            @endforeach
                            
                            {{-- celda de titulo de botones de permisos --}}
                            @if ( !empty($permissions))
                                <td>
                                    <div class="btn-group float-right">
                                        @if ( !empty($permissions['update']))
                                            <a type="button" class="btn-primary btn-sm m-1 p-1 rounded" href="{{route($permissions['update'],$row['id'])}}">Editar</a>
                                        @endif
                                        @if ( !empty($permissions['delete']))
                                        {{ html()->modelForm($row,'delete',route($permissions['delete'],$row['id']))->id($row['id'])->open() }}
                                            @if(($row['deleted'])==0)
                                                <input type="hidden" name="deleted" value="1">
                                                <button type="submit" form="{{$row['id']}}" class="btn btn-danger btn-sm m-1 p-1">Eliminar</button>
                                            @else
                                                <input type="hidden" name="deleted" value="0">
                                                <button type="submit" form="{{$row['id']}}" class="btn btn-warning btn-sm m-1 p-1">Restaurar</button>
                                            @endif    
                                        {{ html()->form()->close() }}
                                        @endif
                                    </div>
                                </td>
                            @endif
                            
                        </tr>
                        
                        @php
                            $t_pos++;
                        @endphp
                    @endforeach

                @else

                    @foreach ( $table_data as $r_pos => $row )
                        <tr>
                            @foreach ($table_config['headers'] as $_h_key => $_h_val )
                                <td>
                                    @if ( !empty($table_config['col_templates']) && isset($table_config['col_templates'][$_h_key]) )
                                        @include($table_config['col_templates'][$_h_key], ['row' => $row, 'c_key' => $_h_key, 'r_pos' => $r_pos])
                                    @else
                                        {{$row->$_h_key}}
                                    @endif
                                </td>
                            @endforeach

                            @if ( !empty($permissions))
                                <td>
                                    <div class="btn-group float-right">
                                        @if ( !empty($permissions['update']))
                                            <div class="col">
                                                <a type="button" class="btn btn-primary btn-sm m-1 p-1 rounded" href="{{route($permissions['update'],$row->id)}}">Editar</a>
                                            </div>
                                        @endif
                                        @if ( !empty($permissions['delete']))
                                        {{ html()->modelForm($row,'delete',route($permissions['delete'],$row->id))->id($row->id)->open() }}
                                            <button  type="submit" form="{{$row->id}}" class="btn btn-danger btn-sm m-1 p-1">Eliminar</button>
                                        {{ html()->form()->close() }}
                                        @endif
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                @endif
            </tbody>
        </table>
    {{-- Tabla de datos --}}

    {{-- Inicialización de la tabla --}}
        <script>
            @if ( !empty($table_config['actions']) )
                if ( typeof $ != "undefined" && typeof $.DataTable != "undefined" ) {
                    initializeDataTable(@php echo json_encode($table_config) @endphp);
                }
                else {
                    window.addEventListener("load", function() {
                        initializeDataTable(@php echo json_encode($table_config) @endphp);
                    });
                }
            @endif
        </script> 
    {{-- FIN Inicialización de la tabla --}}
</div>