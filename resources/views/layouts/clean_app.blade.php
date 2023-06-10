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

        <link href="{{ asset('dx/src/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('dx/layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />

        @stack('styles')

        @livewireStyles

        <link href="{{ asset('dx/src/assets/css/dark/custom.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dx/src/assets/css/light/custom.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="{{ (!empty($body_class)) ? $body_class : 'layout-boxed' }}">

        
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
        <!--  END LOADER -->



        @yield('content')
        
        
        @isset($slot)
            {{ $slot }}
        @endisset



        @livewireScripts

        @stack('scripts')
    </body>
</html>