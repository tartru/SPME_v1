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
            </div>
        </div>

        {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user))->open() }}
        <input type="hidden" name="id" value="{{$user['id']}}">
        <input type="hidden" name="data_us" value="{{$user['id']}}">
        <div class="widget-content widget-content-area p-3">
            <div class="row m-2">
                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark'>Nombre completo:</span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('full_name')->class('form-control')->placeholder('Nombre Completo')->required() }}
                    </div>
                </div>
            
                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark' >Usuario:</span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('name')->class('form-control')->placeholder('usuario')->required() }} 
                    </div>
                </div>
                
                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark' >Email:</span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('email')->class('form-control')->placeholder('Correo Electronico')->required() }} 
                    </div>
                </div>

                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark' >Tipo de Usuario:<span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('type')->class('form-control')->placeholder('Nombre Completo')->required() }} 
                    </div>
                </div>
            </div>
        @if ($user['active']==1)
            <div class="row m-2">
                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark' >Puesto:</span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('puesto')->class('form-control')->placeholder('Cargo a desempeñar')->required() }}
                    </div>
                </div>

                <div class="col-xl-6 mb-xl-0 mb-2">
                    <span class='text-dark' >Area:</span><br>
                    <div class="input-group mb-3">
                        {{ html()->text('area')->class('form-control')->placeholder('Adcripción del usuario')->required() }}
                    </div>
                </div>
            </div>
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