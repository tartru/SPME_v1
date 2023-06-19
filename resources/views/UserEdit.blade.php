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
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>EDITAR USUARIO</h4>
                </div>     
            </div>
        </div>

        <div class="widget-content widget-content-area p-3">

            <div class="row m-2">
                
                <div class="col-xl-4 mb-xl-0 mb-2">
                    {!! Form::model($user, ['route'=>['admin.user.update',$user],'method'=>'put']) !!}
                    <span class='text-dark' >FMyE Activa:<span><br>
                    <div class="input-group mb-3">
                        

                       
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
                    {{!! Form::close() !!}}
                </div>
            </div>
                
                


        </div>
    </div>
</div>

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

@endpush