<!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb">

                @if ( !empty($breadcrumb) && is_array($breadcrumb) )

                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Inicio
                        </a>
                    </li>

                    @php
                        $last_breadcrumb = end($breadcrumb);
                    @endphp

                    @foreach ( $breadcrumb as $t_breadcrumb_title => $t_breadcrumb_url )
                        @if ( $t_breadcrumb_url != $last_breadcrumb )
                            <li class="breadcrumb-item"><a href="{{ $t_breadcrumb_url }}">{{ $t_breadcrumb_title }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $t_breadcrumb_title }}</li>
                        @endif
                    @endforeach

                @else

                    <li class="breadcrumb-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        INICIO
                    </li>

                @endif

            </ol>
        </nav>
    </div>

<!-- END BREADCRUMB -->