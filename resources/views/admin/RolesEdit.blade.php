@extends('layouts.app')

@push('styles')
    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->
    <link href="dx/src/assets/css/light/users/user-profile.css" rel="stylesheet" type="text/css">
    <link href="dx/src/assets/css/dark/users/user-profile.css" rel="stylesheet" type="text/css">
@endpush


@section('content')
     
@php
//var_dump($table_config[headers]); // muestra datos recibidos
$_data_table_id = (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config';

@endphp

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">                                
            <div class="row">
                    <div class="col-10 mb-xl-0 mb-2"><h4>{{isset($update) ? 'ACTUALIZAR '.$update : 'CREAR '.$nuevo }} / ({{($row['id']) ? $row['id'] : 'Nuevo' }})</h4></div>
                    <div class="col-1 mb-xl-0 mb-2 mx-3">
                        @if(!empty($permissions[$row['nivel']]['delete'])&&!empty($update))
                            {{ html()->modelForm($row,'delete',route($permissions[$row['nivel']]['delete'],$row['id']))->id('delete')->open() }}
                                <h4><button type="submit" form="delete" class="btn btn-danger">Eliminar</button></h4>
                            {{ html()->form()->close() }}
                        @endif
                    </div>
            </div>
        </div>

        @if(isset($update))
        {{ html()->modelForm($row,'PUT',route($permissions[$row['nivel']]['update'],$row))->id('update')->open() }}
            <input type="hidden" name="update" value="1"> 
        @elseif (isset($nuevo))
        {{ html()->modelForm($row,'post',route(str_replace("create","store",$permissions['create']),$row))->id('nuevo')->open() }}
        <input type="hidden" name="nuevo" value="1"> 
        @else
            <form action="">
        @endif
        
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                @foreach ($headers as $_h_key => $_h_val)
                {{-- VARIABLES --}}
                        @php
                            $tam=1;
                            // type = [0]=tipo de campo| [1]=tamaño | [2]=requerido | [3]=valor default | [4]=editable
                            $conf = explode("-", $_h_val['type']);
                            $lar=ceil($conf[1]/6);
                            $req = ($conf[2]=="si") ? true : false;
                            $dis = ($conf[4]=='no') ? true : false;
                            if(empty($row['active'])&&isset($row['active'])||!empty($row['deleted'])&&isset($row['deleted'])){
                                $dis = true;
                            }
                            if($conf[1]<=10){
                                $tam=$conf[1];
                            }else {
                                $tam=7;
                            }
                                
                        @endphp
                        @if($conf[0] == 'int')
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->Select($_h_key)->class('form-control')->placeholder('Seleccione')->options($nivel)->required($req)->disabled($dis) }}
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
                        <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                    </div>
                    @if(!empty($update)&&empty($permission[$row['nivel']]['update']))
                            <div class="col-2 mb-xl-0 mb-2">
                                   <h4><button type="submit" form="update" class="btn btn-primary">Actualizar</button></h4>
                            </div>
                    @elseif(!empty($nuevo)&&empty($permission[$row['nivel']]['create']))
                            <div class="col-2 mb-xl-0 mb-2">
                                    <h4><button type="submit" form="nuevo" class="btn btn-primary">Guardar</button></h4>
                            </div>
                    @endif
                </div>
            
            </div>
        </div>
        {{ html()->form()->close() }}

        
        <div class="widget-header mt-3">
            <div class="row">
                <div class="col-10 mb-xl-0 mb-2"><h4>PERMISOS DE ROLES</h4></div>
                <div class="col-2 mb-xl-0 mb-2">
                    @if ($row['active']!=0)
                    <h4><input type="submit" class="btn btn-danger h4" name="quit" value="Quitar Todos" id="quit"></h4>
                    @endif   
                </div>
            </div>
        </div>

    @if(!empty($update))   
        {{ html()->modelForm($row, 'PUT',route('admin.roles.update',$row))->id('permisos')->open() }}
        <input type="hidden" name="permisos" value="1">
       
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                @foreach ($nivel as $_hn => $_vn)
                <div class="card col-3 mb-xl-0 m-2"><h4 class="h6 m-2">PERMISOS DE {{$_vn}}</h4>
                    <div class="card-body mb-xl-0 m-2">
                        @foreach ($permisos as $_hp=>$_vp)
                            @if($_vp->nivel==$_hn)
                                <div class="input-group">
                                    <div class="m-2 col-1">{{ html()->checkbox($_vp->name,$checked = $row->hasPermissionTo($_vp->name),$value = $_vp->name)->class('form-check-input') }}</div>
                                    <input type="hidden" name="{{$_vp->name}}-R" value="{{$_vp->name}}">
                                    <div class="m-2 text-dark col">{{$_vp->descripcion}}:</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div> 
            <div class="row justify-content-center align-items-center m-3">
                <div class="col-2 mb-xl-0 p-2">
                    <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                </div>
                <div class="col-2 mb-xl-0">
                     <h4><button type="submit" form="permisos" class="btn btn-primary" id="guardar">Guardar</button></h4>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}     
    @endif
        


    </div>
</div>
    

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

@endpush