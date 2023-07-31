<div>
       
    <div class="col-lg-12 col-12 layout-spacing p-1">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">                                
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>BUSQUEDA DE RECOMENDACIONES {{(!empty($ficha))? count(array ($ficha)) : ''}} </h4>
                    </div>     
                </div>
            </div>
    
            <div class="widget-content widget-content-area p-3">
    
                <div class="row m-2">
                    {{-- <Form wire:submit.prevent= "submitForm" action="/contact" method="POST"> --}}
                    <div class="col-xl-4 mb-xl-0 mb-2">
                        <span class='text-dark' >FMyE Activa:<span><br>
                        <div class="input-group mb-3">
                            <select class="form-control" id="fmye" wire:model="ficha">
                                <option value="seleccione" >Seleccione</option>
                                @if(isset($fichas))
                                    @foreach ($fichas as $_h => $_v)
                                        <option value="{{$_v['id']}}">{{$_v['nombre']}}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- <button action="submit" class="btn btn-primary" type="button" id="btn-fmye">Buscar</button> --}}
                        </div>
                    </div>
                    {{-- </form> --}}
                    <div class="col-xl-2 mb-xl-0 mb-2">
                        <span class='text-dark'>Año de Inicio:<span><br>
                        <div class="input-group mb-3">
                            <select class="form-control" id="anio" wire:model="anio">
                                <option value="seleccione" >Seleccione</option>
                                @if(isset($anios))
                                    @foreach ($anios as $val)
                                    <option value="{{$val}}">{{$val}}</option>
                                    @endforeach
                                @endif
                            </select>
                            {{-- <button class="btn btn-primary" type="button" id="btn-anio">Buscar</button> --}}
                        </div>
                    </div>
                   
                    <div class="col-xl-4 mb-xl-0 mb-2">
                        <span class='text-dark' >Clave de Recomendación<span><br>
                            <Form wire:submit.prevent="submitForm" action="/contact" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control col-2" placeholder="Clave de Recomendación a buscar" aria-label="Clave de Recomendación" >
                            <button class="btn btn-primary" type="submit" id="btn-reco">Button</button>
                        </div>
                        </form>
                    </div>
                    

                    <div class="col-xl-4 mb-xl-0 mb-2">
                        <span class='text-dark' >otro<span><br>
                        <div class="input-group mb-3">
                            
                        </div>
                    </div>

                </div>

                @if(empty($rows))
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>SIN INFORMACIÓN </h4>
                                </div>     
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row m-2">
                                <div class="col-xl-6 mb-xl-0 mb-2">Utilice los filtros para buscar registros </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                @else

                <div class="col-lg-12 col-12 layout-spacing p-1">
                    <div class="statbox widget box box-shadow">
                        
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>RECOMENDACIONES</h4>
                                </div>     
                            </div>
                        </div>
                
                        <div class="widget-content widget-content-area p-3">
                            @foreach ($rows as $row)
                            <div class="row m-2">
                                
                                <div class="col-xl-6 mb-xl-0 mb-2">
                                    <span class='text-dark' >{{$row->id}} : {{$row->clave}} <span><br>
                                    <div class="input-group mb-3">{{$row->name}} </div>
                                </div>

                                <div class="col-xl-2 mb-xl-0 mb-2">
                                    <span class='text-dark'>Acciones<span><br>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-primary" type="button" id="btn-anio">Editar</button>
                                        <button class="btn btn-primary" type="button" id="btn-anio">Eliminar</button>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                @endif
            </div>
        </div>
    </div>

</div>
