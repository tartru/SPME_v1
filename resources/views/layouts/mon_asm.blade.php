@php
//var_dump($table_config[headers]); // muestra datos recibidos
$_data_table_id = (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config';

@endphp

<div class="col-lg-12 col-12 layout-spacing p-2">
    <div class="statbox widget box box-shadow p-3 m-3">
        <div class="widget-header">                                
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>BUSQUEDA DE RECOMENDACIONES</h4>
                </div>     
            </div>
        </div>

        <div class="widget-content widget-content-area p-3">

            <div class="row m-2">
                
                <div class="col-xl-4 mb-xl-0 mb-2">
                    <span class='text-dark' >FMyE Activa:<span><br>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect04">
                            <option>Seleccione</option>
                            @if(isset($fichas))
                                @foreach ($fichas as $val)
                                    <option>{{$val}}</option>
                                @endforeach
                            @endif
                        </select>
                        <button class="btn btn-primary" type="button" id="btn-fmye">Buscar</button>
                    </div>
                </div>
                <div class="col-xl-2 mb-xl-0 mb-2">
                    <span class='text-dark'>Año de Inicio:<span><br>
                    <div class="input-group mb-3">
                        <select class="form-control" id="inputGroupSelect04">
                            <option>Seleccione</option>
                            @if(isset($anios))
                                @foreach ($anios as $val)
                                    <option>{{$val}}</option>
                                @endforeach
                            @endif
                        </select>
                        <button class="btn btn-primary" type="button" id="btn-anio">Buscar</button>
                    </div>
                </div>

                <div class="col-xl-4 mb-xl-0 mb-2">
                    <span class='text-dark' >Clave de Recomendación<span><br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control col-2" placeholder="Escriba la clave de la Recomendación a buscar" aria-label="Clave de Recomendación" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="btn-reco">Button</button>
                    </div>
                </div>
            </div>
                
                


        </div>
    </div>
</div>