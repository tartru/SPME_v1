<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('images/conafor_icon.jpg'); }}"/>

        <link href="{{ asset('dx/layouts/vertical-light-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('dx/layouts/vertical-light-menu/loader.js') }}"></script> 

        <link href="{{ asset('dx/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('dx/src/plugins/src/font-icons/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/src/assets/css/dark/components/font-icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dx/src/assets/css/light/components/font-icons.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('dx/src/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('dx/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('dx/layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
         <!-- BEGIN STYLES -->
        @stack('styles')
  <!-- END  estilos 1 -->
        @livewireStyles
<!-- END  estilos 2-->
        <link href="{{ asset('dx/src/assets/css/dark/custom.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/src/assets/css/light/custom.css') }}" rel="stylesheet" type="text/css" />
        <style>
    img{
      width: 100%;
    }
    body {
      background: url("{{ url('/')}}/images/back-02.jpg"); 
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      height: 100vh;
    }

  </style>
    </head>

    <body class="{{ (!empty($body_class)) ? $body_class : 'layout-boxed' }}" layout="full-width">

        
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
        <!--  END LOADER -->


        @include('layouts.top_nav_bar') 


        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

           
                @include('layouts.sidebar') 
            

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="middle-content container-xxl p-0">

                        @include('layouts.breadcrumbs')

                        <div class="row layout-top-spacing">

                            @yield('content')
                
                
                            @isset($slot)
                                {{ $slot }}
                            @endisset

                        </div>

                    </div>

                </div>

                @include('layouts.footer')
            </div>
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->
        

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script>
            <!--
                const url_assets = '{{ asset('') }}';
            -->
        </script>

        <script src="{{ asset('dx/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dx/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dx/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
        <script src="{{ asset('dx/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
        <script src="{{ asset('dx/layouts/vertical-light-menu/app.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        @livewireScripts

        @stack('scripts')
    </body>
</html>