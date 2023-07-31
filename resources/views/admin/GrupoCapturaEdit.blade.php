@extends('layouts.app')

@push('styles')
    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->

    <link href="{{ asset('dx/src/plugins/css/light/autocomplete/css/custom-autoComplete.css') }}" rel="stylesheet" type="text/css" />
@endpush


@section('content')
     
@php
//var_dump($table_config[headers]); // muestra datos recibidos
$_data_table_id = (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config';
$permissions=[];
@endphp
    @can('spme.admin.grupos_capturas.update')
        @php $permissions['update']='admin.grupos_capturas.update';@endphp   
    @endcan
    @can('spme.admin.grupos_capturas.delete')
        @php $permissions['delete']='admin.grupos_capturas.delete'; @endphp 
    @endcan
    @can('spme.admin.grupos_capturas.create')
        @php $permissions['create']='admin.grupos_capturas.create'; @endphp 
    @endcan

<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">                                
            <div class="row">
                    <div class="col-9 mb-xl-0 mb-2"><h4>{{isset($update) ? 'ACTUALIZAR '.$update : 'CREAR '.$nuevo }} / ({{($row['id']) ? $row['id'] : 'Nuevo' }})</h4></div>
                    <div class="col mb-xl-0 mb-2">
                        @if(isset($update) && array_key_exists('active',$headers)&&$row['deleted']!=1)
                            {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row))->open() }}
                            @if ($row['active']==0)
                                <h4><input type="submit" class="btn btn-success h4" value="Activar" id="activar"></h4>
                                <input type="hidden" name="active" value="1"> 
                            @else
                                <h4><input type="submit" class="btn btn-danger h4" value="Desactivar" id="desactivar"></h4>
                                <input type="hidden" name="active" value="0"> 
                            @endif
                            {{ html()->form()->close() }}
                        @endif
                    </div>

                    <div class="col mb-xl-0 mb-2 mx-3">
                        @if(!empty($update)&&!empty($permissions['delete'])&&empty($row['deleted']))
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

    {{-- Formulario de grupos --}}
        <div class="widget-content widget-content-area p-3">
            @if(isset($update))
            {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row['id']))->id('update')->open() }}
            <input type="hidden" name="update" value="{{$row['id']}}">
            @elseif (isset($nuevo))
            {{ html()->modelForm($row,'post',route($permissions['create']),$row)->id('nuevo')->open() }}
            <input type="hidden" name="nuevo" value="1"> 
            @else
            <form action="">
            @endif
            <div class="row m-2">
                
                @foreach ($headers as $_h_key => $_h_val)
                    @php
                    $tam=1;
                    // type = [0]=tipo de campo| [1]=tamaño | [2]=requerido | [3]=valor default | [4]=editable 
                    $conf = explode("-", $_h_val['type']);
                    $lar=ceil($conf[1]/6);
                    $req = ($conf[2]=="si") ? true : false;
                    $dis = ($conf[4]=='no') ? true : false;
                    if((array_key_exists('active',$headers)&&(!is_null($row['active'])&&($row['active']==0)))){
                        $dis = true;
                    }
                    if(($row['deleted'])==1){
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
                                {{ html()->number($_h_key)->class('form-control')->placeholder(!is_null($row[$_h_key]) ? $row[$_h_key] : '#   ')->attribute('title','Max: '.$conf[1])->required($req)->disabled($dis) }}
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
                    <div class="col-2 mb-xl-0 mb-2">
                        <div><a href={{(isset($atras) ? route($atras) : '../')}}><h4><button type="button" class="btn btn-info" id="regresar">Regresar</button></h4></a></div>
                    </div>
                    <div class="col-2 mb-xl-0 mb-2">
                        @if(!empty($update)&&empty($row['deleted']))
                            @if (array_key_exists('active',$headers)&&!empty($row['active'])||!array_key_exists('active',$headers))
                                @if (!empty($permissions['update']))
                                    <div class="col-2 mb-xl-0 mb-2">
                                            <button type="submit" form="update" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Actualizar</button>
                                    </div>
                                @endif
                            @endif
                        @elseif(!empty($nuevo))
                            @if (!empty($permissions['create']))
                                <div class="col-2 mb-xl-0 mb-2">
                                        <button type="submit" form="nuevo" class="btn btn-primary" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Guardar</button>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            
            {{ html()->form()->close() }}
        </div>
    
    </div>

    <br>
    {{-- Formulario de Sistemas --}}
    @if(!empty($update)&&($row['active']==1))   
        
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-9 mb-xl-0 mb-2"><h4>OPCIONES SELECCIONABLES</h4></div>
                <div class="col-3 mb-xl-0 mb-2">
                    @if ($row['active']!=0)
                    <h4></h4>
                    @endif   
                </div>
            </div>
        </div>  

       
        <div class="widget-content widget-content-area p-3">&nbsp; &nbsp; Marque las casillas deseadas
           
            <div class="row m-2">
                <div class="card col-5 mb-xl-0 m-2">
                    {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row['id']))->id('group')->attribute('name','group')->open() }}
                    <input type="hidden" name="rows_a" value="1">    
                    <div class="row">
                        <div class="col-7 mb-xl-0 m-2">
                            <h4 class="h6 m-2">ENTIDADES FEDERATIVAS</h4>
                        </div>
                        <div class="col-3 mb-xl-0 m-2">
                            @if ($row['active']!=0)
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

                        @foreach ($rows as $_hr => $_vr)
                        @php
                        $bol=false;
                        foreach ($rows_s as $_hrs => $_vrs) {
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
                                 <h4><button type="submit" form="group" class="btn btn-primary h4" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Guardar Entidades</button></h4>
                            </div>
                        </div>
                        -
                    </div>
                {{ html()->form()->close() }}  
                </div>

                <div class="card col-5 mb-xl-0 m-2">
                    <div class="row">
                        <div class="col-7 mb-xl-0 m-2">
                            <h4 class="h6 m-2">USUARIOS</h4>
                        </div>
                        <div class="col-4 mb-xl-0 m-2">
                            @if ($row['active']!=0)
                            <h4><a type="button" href="{{route('admin.users.index')}}" class="btn btn-info btn-sm" title="Ir al modulo de Usuarios">Ir a Usuarios</a></h4>
                            @endif
                        </div>
                    </div>

                    <div class="card-body mb-xl-0 m-0">  

                        <div class="input-group">
                            <div class="mx-2">
                                Seleccione Usuario a Incluir en grupo<br><br>
                            </div>
                        </div>
                        {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row['id']))->id('users')->attribute('name','users')->open() }}
                        <input type="hidden" name="user" value="1" id="user">
                        
                        {{-- <div class="autocomplete-btn">
                            <input id="autoComplete" class="form-control" value="">
                            <button class="btn btn-success"  type="submit" form="users"  onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Agregar</button>
                        </div> --}}
                        <br>
                        <div class="input-group mb-3">
                            {{ html()->Select('usuarios')->class('form-control')->placeholder('Seleccione Usuario')->required(true)->options($rows2)}}
                            <button class="btn btn-primary" type="submit" form="users"  id="button-addon2" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Agregar</button>
                        </div>
                        @error('usuarios')  
                        <div class="input-group mb-3">
                            <span class="text-danger"><b>* {{$message}}</b></span>
                        </div>
                    @enderror
                        {{ html()->form()->close() }}  
                        <br>

                        <div class="input-group">
                            <div class="mx-2">
                                Usuarios agregados<br><br>
                            </div>
                        </div>

                        @foreach ($rows2_s as $_hr => $_vr)
                        {{ html()->modelForm($row, 'PUT',route($permissions['update'],$row['id']))->id("us".$_vr->id)->attribute('name','us'.$_vr->id)->open() }}
                        <input type="hidden" name="del_us" value="{{$_vr->id}}">  
                            <div class="input-group mb-3">
                                @if($_vr->active==0||$_vr->deleted==1)
                                <div class="form-control text-danger" disabled aria-label="{{ $_vr->nombre}}" aria-describedby="button-addon2" title="Usuario {{$_vr->active==0 ? 'Desactivado' : 'Activo'}} y {{$_vr->deleted==1 ? 'Eliminado' : 'No eliminado'}}"><del> {{ $_vr->nombre}} ({{$_vr->id}}) </del></div>
                                @else
                                <input type="text" class="form-control" disabled placeholder="{{ $_vr->nombre}} ({{$_vr->id}})" aria-label="{{ $_vr->nombre}}" aria-describedby="button-addon2">
                                @endif
                                <button class="btn btn-danger" type="submit" form="us{{$_vr->id}}" id="button-addon2" onclick="this.disabled=true;this.value='Enviando...';this.form.submit();">Eliminar</button>
                            </div>
                        {{ html()->form()->close() }} 
                        @endforeach

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

</div>
   

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('dx/src/plugins/src/autocomplete/autoComplete.min.js') }}"></script>

    {{-- Seleccionar todos los checkbox --}}
    <script>
        function toggleCheckboxes() {
            // Obtener referencia al checkbox "seleccionar todo"
            const seleccionarTodo = document.getElementById('SelectAll');

            // Obtener todos los checkboxes del formulario
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Verificar el estado del checkbox "seleccionar todo"
            const isChecked = seleccionarTodo.checked;

            // Iterar sobre los checkboxes y establecer su estado
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        }

    </script>

    {{-- Para los usurios del grupo de captura --}}
    <script>
    // Obtener el elemento input por su ID
    var inputElement = document.getElementById("user");
  
        const autoCompleteJS = new autoComplete({
        selector: "#autoComplete",
        placeHolder: "Escriba el nombre del Usuario",
        data: {
            src: [
                @foreach ($rows2 as $_hv)
                    "{{$_hv}}",
                @endforeach
            ],
            cache: true,
        },
        resultsList: {
            element: (list, data) => {
                if (!data.results.length) {
                    // Create "No Results" message element
                    const message = document.createElement("div");
                    // Add class to the created element
                    message.setAttribute("class", "no_result");
                    // Add message text content
                    message.innerHTML = `<span>Sin resultados para "${data.query}"</span>`;
                    // Append message element to the results list
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: {
                render: true
            }
        },
        events: {
            input: {
                focus() {
                if (autoCompleteJS.input.value.length) autoCompleteJS.start();
                },
                selection(event) {
                const feedback = event.detail;
                // Prepare User's Selected Value
                const selection = feedback.selection.value;
                
                // Replace Input value with the selected value
                autoCompleteJS.input.value = selection;
                // Cambiar el valor del input
                inputElement.value = selection;

                },
            },
        },
    });
</script>
@endpush