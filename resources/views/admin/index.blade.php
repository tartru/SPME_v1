@extends('layouts.app')

@push('styles')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('dx/src/assets/css/dark/widgets/modules-widgets.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dx/src/assets/css/light/widgets/modules-widgets.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{ asset('dx/src/assets/css/dark/components/accordions.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dx/src/assets/css/light/components/accordions.css') }}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
@endpush


@section('content')

    <div class="row layout-top-spacing justify-content-md-center">
        <div class="col-xl-8 col-lg-8 layout-spacing">
            <div class="statbox widget box box-shadow">

            
            <div id="" class="no-outer-spacing accordion">
                <div class="card">
                    <div class="card-header" id="catalogos-estaticos-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#catalogos-estaticos-accordion" aria-expanded="false" aria-controls="catalogos-estaticos-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Catálogos estáticos</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>

                    <div id="catalogos-estaticos-accordion" class="collapse" aria-labelledby="catalogos-estaticos-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="{{ route('admin_estatus') }}">Estatus</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_acciones') }}">Acciones</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_tipo_capturas') }}">Tipos de captura</a>
                                {{--<!-- <a class="btn btn-primary mb-4" href="">Tipos de comentarios</a> -->--}}
                                <a class="btn btn-primary mb-4" href="{{ route('admin_frecuencias_mediciones') }}">Frecuencias de medición</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_origenes_presupuestales') }}">Orígenes presupuestales</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_regiones') }}">Regiones</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_entidades_federativas') }}">Entidades federativas</a>
                                <a class="btn btn-primary mb-4" href="{{ route('admin_municipios') }}">Municipios</a>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="configuraciones-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#configuraciones-accordion" aria-expanded="false" aria-controls="configuraciones-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Configuraciones</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="configuraciones-accordion" class="collapse" aria-labelledby="configuraciones-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Configuración del sistema</a>
                                <a class="btn btn-primary mb-4" href="">Usuarios</a>
                                <a class="btn btn-primary mb-4" href="">Bitácora</a>
                                <a class="btn btn-primary mb-4" href="">Plantillas de correos</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="grupos-captura-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#grupos-captura-accordion" aria-expanded="false" aria-controls="grupos-captura-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Grupos de captura</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="grupos-captura-accordion" class="collapse" aria-labelledby="grupos-captura-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">
                                
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Claves</a>
                                <a class="btn btn-primary mb-4" href="">Grupos de captura</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="catalogos-pat-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#catalogos-pat-accordion" aria-expanded="false" aria-controls="catalogos-pat-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Catálogos PAT</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="catalogos-pat-accordion" class="collapse" aria-labelledby="catalogos-pat-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">
                                
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Programas institucionales</a>
                                <a class="btn btn-primary mb-4" href="">Objetivos de PAT</a>
                                <a class="btn btn-primary mb-4" href="">Estrategias de PAT</a>
                                <a class="btn btn-primary mb-4" href="">Acciones puntuales de PAT</a>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="catalogos-mir-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="" data-bs-toggle="collapse" data-bs-target="#catalogos-mir-accordion" aria-expanded="false" aria-controls="catalogos-mir-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Catálogos MIR</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>

                    <div id="catalogos-mir-accordion" class="collapse" aria-labelledby="catalogos-mir-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Programas presupuestales</a>
                                <a class="btn btn-primary mb-4" href="">Niveles de MIR</a>
                                <a class="btn btn-primary mb-4" href="">Objetivos de MIR</a>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="documentos-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#documentos-accordion" aria-expanded="false" aria-controls="documentos-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Documentos</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="documentos-accordion" class="collapse" aria-labelledby="documentos-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">

                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Categorías de documentos</a>
                                <a class="btn btn-primary mb-4" href="">Documentos</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="articulos-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#articulos-accordion" aria-expanded="false" aria-controls="articulos-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Artículos</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="articulos-accordion" class="collapse" aria-labelledby="articulos-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">
                                
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Categorías de artículos</a>
                                <a class="btn btn-primary mb-4" href="">Artículos</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="calendario-heading">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse" data-bs-target="#calendario-accordion" aria-expanded="false" aria-controls="calendario-accordion">
                                <h4 class="mb-4 mt-5 text-center toggle-cnf-color-primary-white">Calendario</h4> <div class="icons"><svg> ... </svg></div>
                            </div>
                        </section>
                    </div>
                    <div id="calendario-accordion" class="collapse" aria-labelledby="calendario-heading" data-bs-parent="#withoutSpacing">
                        <div class="card-body">
                                
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary mb-4" href="">Control calendario</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            </div>
        </div>
    </div>

@endsection


@push('scripts')
@endpush