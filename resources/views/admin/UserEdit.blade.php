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
$permissions=[];
@endphp
    @can('spme.admin.users.update')
        @php $permissions['update']='admin.users.update';@endphp   
    @endcan
    @can('spme.admin.users.delete')
        @php $permissions['delete']='admin.users.delete'; @endphp 
    @endcan
    @can('spme.admin.users.create')
        @php $permissions['create']='admin.users.create'; @endphp 
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
                        @elseif(!empty($permissions['delete'])&&$user['deleted']==1)
                            {{ html()->modelForm($user,'delete',route($permissions['delete'],$user['id']))->id('delete')->open() }}
                            <h4><button type="submit" form="delete" class="btn btn-warning">Restaurar</button></h4>
                            <input type="hidden" name="deleted" value="0">
                            {{ html()->form()->close() }}
                        @endif
                        </div>
            </div>
        </div>

    {{-- Formulario de usuario --}}
        <div class="widget-content widget-content-area p-3">
            {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user['id']))->open() }}
            <input type="hidden" name="data_us" value="{{$user['id']}}">
            <div class="row m-2">
                
                @foreach ($headers as $_h_key => $_h_val)
                        @php
                             $tam=1;
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
                                <span class='text-dark'>@if(($req)&&(!$dis)) * @endif {{$_h_val['txt']}}:</span><br>
                                <div class="input-group mb-3">
                                    {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($user[$_h_key]) ? $user[$_h_key] : '#   ')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                            <div class="col-xl-{{$tam}} mb-xl-0 mb-2">
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
                    <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                </div>
                <div class="col-2 mb-xl-0 mb-2">
                     <h4><button type="submit" class="btn btn-primary h4" onclick="this.disabled=true;this.value='Enviando.. .';this.form.submit();">Guardar</button></h4>
                </div>
            </div>
            @endif
            {{ html()->form()->close() }}
        </div>
    
    </div>

    <br>

    <div class="row">
        {{-- Formulario de Sistemas --}}   
        @if(!empty($update)&&($user['active']==1))
            <div class="statbox widget box box-shadow col m-2">
                {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user['id']))->id('system')->open() }}
                <input type="hidden" name="system" value="1">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-8 mb-xl-2 m-2"><h4>PERMISOS A SISTEMAS</h4></div>
                        <div class="col mb-xl-2 mb-2">
                            @if ($user['active']!=0)
                            <h4><button type="reset" class="btn btn-danger" name="quit" title="Regresa a los valores guardados">Reset</button></h4>
                            @endif   
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area p-1">&nbsp; &nbsp; Marque los sistemas a los que puede ingresar el usuario 
                    <div class="row m-2"> 
                        @foreach ($sistemas as $_hs => $_vs)
                            @if(auth()->user()->canany([Str::lower($_vs['siglas']).'.admin.roles.asignar','spme.admin.roles.asignar'])||auth()->user()->hasrole('spme.admin'))
                            @php
                            $bol=false;
                            foreach ($user_sys as $_hus => $_vus)
                                if($_vs->id==$_vus['sys_id'])
                                    $bol=true;

                            @endphp
                            <div class="mb-xl-2 mx-2"><h4 class="h6 m-2">MODULO DE {{$_vs['siglas']}}</h4>
                                <div class="card-body mb-xl-2 p-0">
                                    <div class="input-group">
                                        <div class="mx-2">{{ html()->checkbox($_vs->siglas,$checked = $bol,$value = $_vs->siglas)->class('form-check-input') }}
                                        <input type="hidden" name="{{$_vs->siglas}}-R" value="{{$_vs->id}}">
                                        <span class="m-0 text-dark">{{$_vs->nombre}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div> 
                    <div class="row justify-content-center align-items-center m-3">
                        <div class="col-2 mb-xl-0 p-2">
                            <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                        </div>
                        <div class="col-4 mb-xl-0">
                            <h4><button type="submit" form="system" class="btn btn-primary" id="guardar">Guardar Sistemas</button></h4>
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }} 
            </div>   
        @endif

        <br>
        
        {{-- Formulario de Roles --}}
        @if(!empty($update)&&($user['active']==1)&&count($user_sys)>=1)
            <div class="statbox widget box box-shadow col-6 m-2">
                {{ html()->modelForm($user, 'PUT',route('admin.users.update',$user))->open() }}
                <input type="hidden" name="roles" value="{{$user['id']}}">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-9 mb-xl-0 mb-2"><h4>ROLES DE USUARIO</h4></div>
                            <div class="col-3 mb-xl-0 mb-2">
                                @if ($user['active']!=0)
                                <h4><button type="reset" class="btn btn-danger" name="quit" title="Regresa a los valores guardados">Reset</button></h4>
                                @endif   
                            </div>
                        </div>
                    </div>  

                    <div class="widget-content widget-content-area p-2">&nbsp; &nbsp; Marque los roles a que se asignarán al usuario
                        
                        <div class="row m-2">
                            @foreach ($sistemas as $_hs => $_vs)
                                @canany([Str::lower($_vs['siglas']).'.admin.roles.asignar','spme.admin.roles.asignar'])
                                <div class=" col-5 mb-xl-2 m-1"><h4 class="h6 m-2">ROLES DE {{$_vs['siglas']}}</h4>
                                    <div class="card-body mb-xl-0 m-2 p-0">
                                        @foreach ($roles as $role => $val)
                                            @if($_vs->id==$val['nivel'])
                                                <div class="input-group">
                                                    <div class="m-2">{{ html()->checkbox($val['name'],$checked =$user->hasRole($val['name']),$value = $val['name'])->class('form-check-input') }}</div>
                                                    <input type="hidden" name="{{$val['name']}}-R" value="{{$val['name']}}">
                                                    <div class="m-2 text-dark">{{$val['descripcion']}}:</div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endcanany
                            @endforeach

                        </div> 

                        <div class="row justify-content-center align-items-center m-3">
                            <div class="col-2 mb-xl-0 p-2">
                                <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                            </div>
                            <div class="col-4 mb-xl-0 p-2">
                                <h4><button type="submit" class="btn btn-primary h4" name="guardar" id="guardar">Guardar Roles</button></h4>
                            </div>
                        </div>

                    </div>

                {{ html()->form()->close() }}

            </div>
        @endif
        
    </div>

    {{-- entidades y grupos --}}
    @if(!empty($update)&&($user['active']==1))   
        
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-9 mb-xl-0 mb-2"><h4>OPCIONES SELECCIONABLES</h4></div>
                <div class="col-3 mb-xl-0 mb-2">
                    @if ($user['deleted']!=0)
                    <h4></h4>
                    @endif   
                </div>
            </div>
        </div>  

       
        <div class="widget-content widget-content-area p-3">&nbsp; &nbsp; Marque las casillas deseadas
           
            <div class="row m-2">
                <div class="card col-5 mb-xl-0 m-2">
                    {{ html()->modelForm($user, 'PUT',route($permissions['update'],$user['id']))->id('entidades')->attribute('name','entidades')->open() }}
                    <input type="hidden" name="entidades" value="1">    
                    <div class="row">
                        <div class="col-7 mb-xl-0 m-2">
                            <h4 class="h6 m-2">ENTIDADES FEDERATIVAS</h4>
                        </div>
                        <div class="col-3 mb-xl-0 m-2">
                            @if ($user['active']!=0)
                            <h4><button type="reset" class="btn btn-danger" name="quit" title="Regresa a los valores guardados">Reset</button></h4>
                            @endif
                        </div>
                    </div>
                
                    <div class="card-body mb-xl-0 m-0">

                        <div class="input-group">
                            <div class="mx-2">
                                <input type="checkbox" id="SelectAll" onclick="toggleCheckboxes()" /> Seleccionar / Deseleccionar todos<br><br>
                            </div>
                        </div>

                        @foreach ($rows_e as $_hr => $_vr)
                        @php
                        $bol=false;
                            foreach ($rows_es as $_hrs => $_vrs) {
                                if($_vr->id== $_vrs->id)
                                    $bol=true;
                            }
                        @endphp

                        <div class="input-group">
                            <div class="mx-2">{{ html()->checkbox($_vr->nombre,$checked = $bol,$value = $_vr->nombre)->class('form-check-input') }}</div>
                            <input type="hidden" name="{{$_vr->nombre}}-R" value="{{$_vr->id}}">
                            <div class="m-0 text-dark">{{$_vr->nombre}}</div>
                        </div>
                        @endforeach
                    
                        <div class="row justify-content-center align-items-center m-3">
                            <div class="col-5 mb-xl-0 p-2">
                                 <h4><button type="submit" form="entidades" class="btn btn-primary h4" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Guardar Entidades</button></h4>
                            </div>
                        </div>
                        
                    </div>
                {{ html()->form()->close() }}  
                </div>

                <div class="card col mb-xl-0 m-2">
                    <div class="row">
                        <div class="col-7 mb-xl-0 m-2">
                            <h4 class="h6 m-2">GRUPOS A LOS QUE PERTENECE</h4>
                        </div>
                        <div class="col-4 mb-xl-0 m-2">
                            @if ($user['deleted']!=1)
                            <h4><a type="button" href="{{route('admin.grupos_capturas.index')}}" class="btn btn-info btn-sm" title="Ir al modulo de Usuarios">Ir a Gupos de Captura</a></h4>
                            @endif
                        </div>
                    </div>

                    <div class="card-body mb-xl-0 m-0">  

                        <div class="input-group">
                            <div class="mx-2">
                                Seleccione Grupo a ligar con Usuario<br><br>
                            </div>
                        </div>
                        {{ html()->modelForm($user, 'PUT',route($permissions['update'],$user['id']))->id('grupo')->attribute('name','grupo')->open() }}
                        <input type="hidden" name="add_grupo" value="1" id="add_grupo">
                        
                        {{-- <div class="autocomplete-btn">
                            <input id="autoComplete" class="form-control" value="">
                            <button class="btn btn-success"  type="submit" form="users"  onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Agregar</button>
                        </div> --}}
                        <br>
                        <div class="input-group mb-3">
                            {{ html()->Select('grupos')->class('form-control')->placeholder('Seleccione el Grupo')->required(true)->options($rows_g)}}
                            <button class="btn btn-primary" type="submit" form="grupo"  id="button-addon2" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Agregar</button>
                        </div>
                        @error('grupos')  
                        <div class="input-group mb-3">
                            <span class="text-danger"><b>* {{$message}}</b></span>
                        </div>
                    @enderror
                        {{ html()->form()->close() }}  
                        <br>

                        <div class="input-group">
                            <div class="mx-2">
                                Grupos a los que pertenece<br><br>
                            </div>
                        </div>

                        @foreach ($rows_gs as $_hr => $_vr)
                        {{ html()->modelForm($user, 'PUT',route($permissions['update'],$user['id']))->id("gr".$_vr->id)->attribute('name','gr'.$_vr->id)->open() }}
                        <input type="hidden" name="del_gr" value="{{$_vr->id}}">  
                            <div class="input-group mb-3">
                                @if($_vr->active==0||$_vr->deleted==1)
                                <div class="form-control text-danger " disabled aria-label="{{ $_vr->nombre}}" aria-describedby="button-addon2" title="Grupo {{$_vr->active==0 ? 'Desactivado' : 'Activo'}} y {{$_vr->deleted==1 ? 'Eliminado' : 'No eliminado'}}"><del> {{ $_vr->nombre}} ({{$_vr->id}}) </del></div>
                                @else
                                <input type="text" class="form-control" disabled placeholder="{{ $_vr->nombre}} ({{$_vr->id}})" aria-label="{{ $_vr->nombre}}" aria-describedby="button-addon2" title="{{$_vr->nombre}}">
                                @endif
                                <button class="btn btn-danger" type="submit" form="gr{{$_vr->id}}" id="button-addon2" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Eliminar</button>
                            </div>
                        {{ html()->form()->close() }} 
                        @endforeach

                        <br>
                        {{ html()->modelForm($user, 'PUT',route($permissions['update'],$user['id']))->id('gr_del_all')->attribute('name','gr_del_all')->open() }}
                        <input type="hidden" name="del_gr_all" value="1">
                            <div class="input-group mb-3 justify-content-center">
                                @if(count($rows_gs))
                                <button class="btn btn-danger" type="submit" form="gr_del_all" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Quitar Todos</button>
                                @endif
                            </div>
                        {{ html()->form()->close() }} 

                    </div>
                
                </div>

            </div> 
               
        </div>

        <div class="row justify-content-center align-items-center m-3">
            <div class="col-2 mb-xl-0 p-2">
                <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
            </div>
            <div class="col mb-xl-0 p-2">
                 <h4></h4>
            </div>
        </div>
         
    </div>
    @endif
    {{-- fin entidades y grupos --}}
                
      

</div>
   

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    {{-- Seleccionar todos los checkbox --}}
    <script>
        function toggleCheckboxes() {
            // Obtener referencia al checkbox "seleccionar todo"
            const seleccionarTodo = document.getElementById('SelectAll');

            // Obtener todos los checkboxes del formulario
            // const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            // Obtener el formulario con id "entidades"
            const formularioEntidades = document.getElementById('entidades');

            // Obtener todos los checkboxes del formulario
            const checkboxes = formularioEntidades.querySelectorAll('input[type="checkbox"]');

            // Verificar el estado del checkbox "seleccionar todo"
            const isChecked = seleccionarTodo.checked;

            // Iterar sobre los checkboxes y establecer su estado
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        }

    </script>

@endpush