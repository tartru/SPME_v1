@extends('layouts.clean_app')

@push('styles')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('dx/src/assets/css/light/authentication/auth-cover.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
@endpush


@section('content')

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
        
            <div class="row">

                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                        
                    <div class="auth-cover">

                        <div class="position-relative">

                            <img src="{{ asset('images/logo_cnf_fr.png'); }}" alt="Logo CONAFOR">

                            <h2 class="mt-5 text-white font-weight-bolder px-2">Sistema de Planeación Monitoreo y Evaluación</h2>
                            <p class="text-white px-2 mt-4">Gerencia de Planeación y Evaluación</p>
                        </div>
                        
                    </div>

                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        
                                        <h2>Ingresar</h2>
                                        <p>Proporciona tus datos para ingresar al sistema</p>

                                        @if (session('status') == 'error')
                                            <div class="alert alert-light-danger fade show border-1 mb-4 mt-4" role="alert">
                                                @if ( !empty(session('s_msg')) )
                                                    <p>{{ session('s_msg') }}</p>
                                                @endif

                                                @if ( !empty(session('s_response')) )
                                                    @foreach ( session('s_response') as $err_key => $err_msg )
                                                    <p>{{ $err_msg }}</p>
                                                    @endforeach
                                                @endif
                                            </div> 
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Usuario</label>
                                            <input type="text" name="user" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Por favor escribe correctamente tu nombre de usuario.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">Contraseña</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>

                                    {{--
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="form-check form-check-primary form-check-inline">
                                                    <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                                    <label class="form-check-label" for="form-check-default">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    --}}
                                    
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button class="btn btn-primary-cnf w-100">Ingresar</button>
                                        </div>
                                    </div>
                                    
                                    
                                    {{--
                                        <div class="col-12">
                                            <div class="text-center">
                                                <p class="mb-0">Dont't have an account ? <a href="javascript:void(0);" class="text-warning">Sign Up</a></p>
                                            </div>
                                        </div>
                                    --}}
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>

@endsection


@push('scripts')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dx/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
@endpush