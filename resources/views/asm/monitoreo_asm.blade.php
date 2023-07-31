@extends('layouts.app')

@push('styles')

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('dx/src/plugins/src/stepper/bsStepper.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dx/src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/stepper/custom-bsStepper.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dx/src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/stepper/custom-bsStepper.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->

    <link href="{{ asset('dx/src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dx/src/assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />

    <!-- Datatable Styles -->
    <link href="{{ asset('dx/src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Datatable Style -->

    {{-- modals --}}
    <link href="{{ asset('dx/src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />

@endpush


@section('content')

<div class="widget-content widget-content-area p-1 br-8">
    
    @if($vista=="recomendaciones")
        @livewire('monitoreo.asm.recomendaciones')
    @endif
    @if($vista=="fichas")
        @livewire('monitoreo.asm.fichas-a-s-m')
    @endif
    @if($vista=="criterios")
        @livewire('monitoreo.asm.criterios')
    @endif
</div>


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

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('dx/src/plugins/src/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('dx/src/assets/js/scrollspyNav.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('dx/src/plugins/src/stepper/bsStepper.min.js') }}"></script>
<script src="{{ asset('dx/src/plugins/src/stepper/custom-bsStepper.min.js') }}"></script> 
<!-- END PAGE LEVEL SCRIPTS -->
 <script>
    livewire.on('alert',function(){
        Swal.fire(
            'ok',
            'se ha echo',
            'seccess',
        )
    })
</script>
{{--
<script>
document.querySelector('.widget-content .warning.confirm').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
    })
})

</script> --}}
@endpush
