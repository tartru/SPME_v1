@extends('layouts.app')

@push('styles')
    <!-- touchspin Style -->
    <link href="{{ asset('dx/src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- touchspin Style -->


@endpush


@section('content')

<div class="widget-content widget-content-area br-8">

    <div class="tab-container tap h4">
        <ul class="nav nav-tabs">
        <li class="nav-item">
          <a id="op" class="nav-link active bg-light" href="#">Aviso</a>
        </li>
        @foreach ($rows as $val => $des )
            <li class="nav-item">
            <a id="op{{$val}}" class="nav-link" href="#">{{$des['siglas']}}</a>
            </li>
        @endforeach
        {{-- <li class="nav-item">
          <a id="op3"class="nav-link" href="#">PAT</a>
        </li>
        <li class="nav-item">
          <a id="op4"class="nav-link" href="#">ASM</a>
        </li>--}}
      </ul> 
    </div>
    <div class="card h5 p-2">
        <div id="c" class="card-text">
            <br>
            <h4>Solicita permisos</h4>
            <br>
            <p>Para poder ingresar a las secciones del sistema debes solicitar permisos de usuario, para ello solicitalo con tu jefe inmediato o genera una solicitud desde el apartado de contacto</p>
            <br>
        </div>
        @foreach ($rows as $val => $des)
        <div id="c{{$val}}" class="card-text d-none">
            <br>
            <h4>{{$des['nombre']}}</h4>
            <br>
            <div>@php echo html_entity_decode($des['descripcion'])@endphp</div>
            <br>
        </div>
        @endforeach
            
        
        {{-- <div id="c2" class="card-text d-none">
            <br>
            <h4>MIR</h4>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate necessitatibus repellendus, quasi cum tenetur tempora veritatis veniam nemo aut similique modi est quidem facilis distinctio..</p>
            <br>
        </div>
        <div id="c3" class="card-text d-none">
            <br>
            <h4>PAT</h4>
            <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate necessitatibus repellendus, quasi cum tenetur tempora veritatis veniam nemo aut similique modi est quidem facilis distinctio..</p>
            <br>
        </div>
        <div id="c4" class="card-text d-none">
            <br>
            <h4>ASM</h4>
            <br>   
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate necessitatibus repellendus, quasi cum tenetur tempora veritatis veniam nemo aut similique modi est quidem facilis distinctio..</p>
            <br>
        </div> --}}

    </div>


</div>
@endsection


@push('scripts')
    <script>
        
        const op = document.getElementById('op')
        const c = document.getElementById('c')
        @foreach ($rows as $val =>$des)
        const op{{$val}} = document.getElementById('op{{$val}}')
        const c{{$val}} = document.getElementById('c{{$val}}')
        @endforeach
        let chose = 0

        const changeOption = () => {
            chose == 0 ? (
                op.classList.value = 'nav-link active bg-light',
                c.classList.value = 'card-text'
            )
            : (
                op.classList.value = 'nav-link',
                c.classList.value = 'card-text d-none'
            )
            @foreach ($rows as $val =>$des)
            chose == {{$val+1}} ? (
                op{{$val}}.classList.value = 'nav-link active bg-light',
                c{{$val}}.classList.value = 'card-text'
            )
            : (
                op{{$val}}.classList.value = 'nav-link',
                c{{$val}}.classList.value = 'card-text d-none '
            )
            @endforeach
           
        }

        op.addEventListener('click', ()=> {
            chose = 0
            changeOption()
        })
        @foreach ($rows as $val =>$des)
        op{{$val}}.addEventListener('click', ()=> {
            chose = {{$val+1}}
            changeOption()
        })
        @endforeach


    </script>
@endpush
