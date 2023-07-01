@php
//var_dump($table_config[headers]); // muestra datos recibidos
$_data_table_id = (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config';

@endphp

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">                                
            <div class="row">
                <div class="col mb-xl-0 mb-2"><h4>{{isset($update) ? $update : $nuevo }} / ({{($row['id']) ? $row['id'] : 'Nuevo' }})</h4></div>
                <div class="col-1 mb-xl-0 mb-2">
                    @if(isset($update) && array_key_exists('active',$headers)&&$row['deleted']!=1)
                        {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row))->open() }}
                        <input type="hidden" name="{{$row['id']}}" value="{{$row['id']}}">
                        @if ($row['active']==0)
                            <h4><input type="submit" class="btn btn-success" value="Activar" id="1" name="Activar"></h4>
                            <input type="hidden" name="active" value="1"> 
                        @else
                            <h4><input type="submit" class="btn btn-danger" value="Desactivar" id="0" name="Activar"></h4>
                            <input type="hidden" name="active" value="0"> 
                        @endif
                    @endif
                    {{ html()->form()->close() }}
                </div>

                <div class="col-1 mb-xl-0 mb-2 mx-3">
                @if(!empty($update)&&!empty($permissions['delete'])&&$row['deleted']!=1)
                    {{ html()->modelForm($row,'delete',route($permissions['delete'],$row['id']))->id('delete')->open() }}
                        <input type="hidden" name="deleted" value="1">
                        <h4><button type="submit" form="delete" class="btn btn-danger">Eliminar</button></h4>
                    {{ html()->form()->close() }}
                @elseif(!empty($update)&&!empty($permissions['delete'])&&$row['deleted']==1)
                    {{ html()->modelForm($row,'delete',route($permissions['delete'],$row['id']))->id('delete')->open() }}
                    <h4><button type="submit" form="delete" class="btn btn-warning">Restaurar</button></h4>
                    <input type="hidden" name="deleted" value="0">
                    {{ html()->form()->close() }}
                @endif
                </div>
            </div>
        </div>
       
        @if(isset($update)&&$row['deleted']!=1)
        {{ html()->modelForm($row,'PUT',route($permissions['update'],$row))->id('update')->open() }}
            <input type="hidden" name="update" value="1"> 
        @elseif (isset($nuevo))
        {{ html()->modelForm($row,'post',route(str_replace("create","store",$permissions['create']),$row))->id('nuevo')->open() }}
        @else
            <form action="">
        @endif
        
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                {{-- dump ($row); --}}
                @foreach ($headers as $_h_key => $_h_val)
                    {{-- @php dump ($_h_key); @endphp --}}
                        @php
                            // type = [0]=tipo de campo| [1]=tamaño | [2]=requerido | [3]=valor default | [4]=editable
                            $conf = explode("-", $_h_val['type']);
                            $lar=ceil($conf[1]/6);
                            $req = ($conf[2]=="si") ? true : false;
                            $dis = (($_h_key=='id')||($conf[0]=='timestamp'||($_h_key=='active')||($_h_key=='deleted'))) ? true : false;
                            if((array_key_exists('active',$headers)&&(!is_null($row['active'])&&($row['active']==0)))){
                                $dis = true;
                            }
                            if(($row['deleted'])==1){
                                $dis = true;
                            }
                        @endphp
                        @if($conf[0] == 'int')
                            <div class="col-xl-2 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : '#')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif
                        @if($conf[0] == 'tint')
                            <div class="col-xl-2 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : '#')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif

                        @if($conf[0] == 'varchar')
                            <div class="col-xl-6 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->text($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : '-')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif

                        @if($conf[0] == 'timestamp')
                            <div class="col-xl-3 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->text($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : 'yyyy-mm-dd hh:mm:ss')->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif

                        @if($conf[0] == 'select')
                            <div class="col-xl-3 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->select($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : 'yyyy-mm-dd hh:mm:ss')->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif

                @endforeach
                <div class="row justify-content-center m-3">
                    <span>* Registros obligatorios </span>
                </div>
                
                <div class="row justify-content-center m-3">
                    <div class="col-2 mb-xl-0 mb-2">
                        <div><a class="btn btn-info h4" href={{(isset($atras) ? $atras : '../')}}>Regresar</a></div>
                    </div>
                    @if(!empty($update)&&!empty($row['active']))
                        @if (!empty($permissions['update']))
                            <div class="col-2 mb-xl-0 mb-2">
                                    <button type="submit" form="update" class="btn btn-primary">Actualizar</button>
                            </div>
                        @endif
                    @elseif(!empty($nuevo))
                        @if (!empty($permissions['create']))
                            <div class="col-2 mb-xl-0 mb-2">
                                    <button type="submit" form="nuevo" class="btn btn-primary">Guardar</button>
                            </div>
                        @endif
                    @endif
                </div>
            
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>

    <br>
    <br>
    <div class="statbox widget box box-shadow">
      
        <div class="widget-header mt-3">
            <div class="row">
                <div class="col-10 mb-xl-0 mb-2"><h4>NOTAS</h4></div>
                <div class="col-2 mb-xl-0 mb-2">

                </div>
            </div>
        </div>
      
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                <div class="card col-4 mb-xl-0 m-2"><h4 class="h6 m-2">ATENCION</h4>
                    <div class="card-body mb-xl-0 m-2">
                       <span> Los datos el catálogo, solo eliminar o desactivar cuando este seguro de que los cambios no afectarán a los registros del sistema</span>
                    </div>
                </div>

                @if(env('APP_DEBUG'))
                <div class="card col-4 mb-xl-0 m-2"><h4 class="h6 m-2">Errores</h4>
                    <div class="card-body mb-xl-0 m-2">
                       <span> @php var_dump($errors) @endphp</span>
                    </div>
                </div>
                @endif

            </div> 
        </div>


    </div>
</div>