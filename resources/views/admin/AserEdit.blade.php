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
$permisos=[];
@endphp
    @can('spme.admin.users.update')
        @php $permisos['update']='admin.user.update';@endphp   
    @endcan
    @can('spme.admin.users.delete')
        @php $permisos['delete']='admin.user.delete'; @endphp 
    @endcan
    @can('spme.admin.users.create')
        @php $permisos['create']='admin.user.create'; @endphp 
    @endcan

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">                                
            <div class="row">
                    <div class="col-10 mb-xl-0 mb-2"><h4>EDITAR USUARIO ({{$user['id']}})</h4></div>
                    <div class="col-2 mb-xl-0 mb-2">
                        {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user))->open() }}
                        <input type="hidden" name="id" value="{{$user['id']}}">
                        @if ($user['active']==0)
                        <h4><input type="submit" class="btn btn-success h4" value="Activar" id="activar"></h4>
                        <input type="hidden" name="active" value="1"> 
                        @else
                        <h4><input type="submit" class="btn btn-danger h4" value="Desactivar" id="desactivar"></h4>
                        <input type="hidden" name="active" value="0"> 
                        @endif
                        {{ html()->form()->close() }}
                    </div>

                    <div class="col-1 mb-xl-0 mb-2 mx-3">
                        @if(!empty($permissions['delete'])&&$user['deleted']!=1)
                            {{ html()->modelForm($user,'delete',route($permissions['delete'],$user['id']))->id('delete')->open() }}
                                <input type="hidden" name="deleted" value="1">
                                <h4><button type="submit" form="delete" class="btn btn-danger">Eliminar</button></h4>
                            {{ html()->form()->close() }}
                        @elseif(!empty($permissions['delete'])&&$row['deleted']==1)
                            {{ html()->modelForm($user,'delete',route($permissions['delete'],$user['id']))->id('delete')->open() }}
                            <h4><button type="submit" form="delete" class="btn btn-warning">Restaurar</button></h4>
                            <input type="hidden" name="deleted" value="0">
                            {{ html()->form()->close() }}
                        @endif
                        </div>
            </div>
        </div>

        {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user))->open() }}
        <input type="hidden" name="id" value="{{$user['id']}}">
        <input type="hidden" name="data_us" value="{{$user['id']}}">
        
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                
                @foreach ($headers as $_h_key => $_h_val)
                        @php
                            // type = [0]=tipo de campo| [1]=tamaño | [2]=requerido | [3]=valor default | [4]=editable
                            $conf = explode("-", $_h_val['type']);
                            $lar=ceil($conf[1]/6);
                            $req = ($conf[2]=="si") ? true : false;
                            $dis = ($conf[4]=='no') ? true : false;
                            if((array_key_exists('active',$headers)&&(!is_null($user['active'])&&($user['active']==0)))){
                                $dis = true;
                            }
                            if(($user['deleted'])==1){
                                $dis = true;
                            }
                        @endphp
                        @if($conf[0] == 'int')
                            <div class="col-xl-2 mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : '#')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
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
                                    {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : '#')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
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
                                    {{ html()->text($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : '-')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
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
                                    {{ html()->text($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : 'yyyy-mm-dd hh:mm:ss')->required($req)->disabled($dis) }}
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
                                    {{ html()->select($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : 'yyyy-mm-dd hh:mm:ss')->required($req)->disabled($dis) }}
                                </div>
                                @error($_h_key)  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                @enderror
                            </div>
                        @endif

                @endforeach

        @if ($user['active']==1)
           
            <div class="row justify-content-center m-3">
                <div class="col-2 mb-xl-0 mb-2">
                    <div><a class="btn btn-info h4" href="../">Cancelar</a></div>
                </div>
                <div class="col-2 mb-xl-0 mb-2">
                     <h4><input type="submit" class="btn btn-primary h4" name="guardar" value="Guardar" id="guardar"></h4>
                </div>
            </div>
        @endif

       
        </div>
        {{ html()->form()->close() }}

        
        <div class="widget-header mt-3">
            <div class="row">
                <div class="col-10 mb-xl-0 mb-2"><h4>ROLES DE USUARIO</h4></div>
                <div class="col-2 mb-xl-0 mb-2">
                    @if ($user['active']!=0)
                    <h4><input type="submit" class="btn btn-danger h4" name="quit" value="Quitar Todos" id="quit"></h4>
                    @endif   
                </div>
            </div>
        </div>

        {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user))->open() }}
        <input type="hidden" name="id" value="{{$user['id']}}">
        <input type="hidden" name="roles" value="{{$user['id']}}">
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                <div class="card col-4 mb-xl-0 m-2"><h4 class="h6 m-2">ROLES DE SPME</h4>
                    <div class="card-body mb-xl-0 m-2">
                        @foreach ($roles as $role=>$val)
                            @if((stripos($val['name'],'spme')!==false))
                                <div class="input-group">
                                    <div class="m-2">{{ html()->checkbox($val['name'],$checked =$user->hasRole($val['name']),$value = $val['name'])->class('form-check-input') }}</div>
                                    <div class="m-2 text-dark">{{$val['descripcion']}}:</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="card col-4 mb-xl-0 m-2"><h4 class="h6 m-2">ROLES DE MIR</h4>
                    <div class="card-body mb-xl-0 m-2">
                        @foreach ($roles as $role=>$val)
                            @if((stripos($val['name'],'mir')!==false))
                                <div class="input-group">
                                    <div class="m-2">{{ html()->checkbox($val['name'],$checked =$user->hasRole($val['name']),$value = $val['name'])->class('form-check-input') }}</div>
                                    <div class="m-2 text-dark">{{$val['descripcion']}}:</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            
                <div class="card col-4 mb-xl-0 m-2"><h4 class="h6 m-2">ROLES DE ASM</h4>
                    <div class="card-body mb-xl-0 m-2">
                        @foreach ($roles as $role=>$val)
                            @if((stripos($val['name'],'asm')!==false))
                                <div class="input-group">
                                    <div class="m-2">{{ html()->checkbox($val['name'],$checked =$user->hasRole($val['name']),$value = $val['name'])->class('form-check-input') }}</div>
                                    <div class="m-2 text-dark">{{$val['descripcion']}}:</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div> 
            <div class="row justify-content-center align-items-center m-3">
                <div class="col-2 mb-xl-0 p-2">
                    <div class="h4"><a class="btn btn-info" href="../">Cancelar</a></div>
                </div>
                <div class="col-2 mb-xl-0 p-2">
                     <h4><input type="submit" class="btn btn-primary h4" name="guardar" value="Guardar" id="guardar"></h4>
                </div>
            </div>
        </div>
        {{ html()->form()->close() }}     

        


    </div>
</div>
    

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

@endpush