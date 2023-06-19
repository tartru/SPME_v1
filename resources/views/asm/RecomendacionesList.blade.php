@extends('layouts.app')

@push('styles')
    <!-- Datatable Styles -->
    <link href="{{ asset('dx/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatable Style -->

    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->
@endpush


@section('content')

<div class="widget-content widget-content-area br-8">
    @if(isset($data))
        @include('layouts.mon_asm', [
            'table_data' => $rows,
            'Anios'       => $anios,
            'Fichas'      => $fichas,
            'recomendaciones' => ['una recomendacion','dos recomendacion','tres recomendacion'],
        ])
    @else
        @include('layouts.mon_asm')
    @endif


</div>

@endsection


@push('scripts')
    <script src="{{ asset('dx/src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/datatables.js') }}"></script>
    
    <script src="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dx/src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
@endpush