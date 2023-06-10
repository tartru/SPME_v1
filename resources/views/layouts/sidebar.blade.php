@php
    $_side_menu_tree = [
        'cat_estaticos' => [
            'admin_estatus'                 => 'Estatus',
            'admin_acciones'                => 'Acciones',
            'admin_tipo_capturas'           => 'Tipo de Capturas',
            'admin_frecuencias_mediciones'  => 'Frec. Medicion',
            'admin_origenes_presupuestales' => 'Org. Presupuestales',
            'admin_regiones'                => 'Regiones',
            'admin_entidades_federativas'   => 'Entidades Federativas',
            'admin_municipios'              => 'Municipios',
        ],
        'configuraciones'=> [
            'admin_config'             => 'Roles',
            'admin_usuarios'           => 'Usuarios',
            'admin_bitacora'           => 'Bitacora',
            'admin_plantillas_correos' => 'Plantillas Correos',
        ],
        'grupos_captura'=> [
            'admin_gc_claves'      =>   'Grupos Claves',
            'admin_grupos_captura' => 'Grupos Caprtura',
        ],
        'catalogos_pat'=> [
            'admin_programas_institucionales' => 'Prog. Institucionales',
            'admin_objetivos_pat'             => 'Objetivos Pat',
            'admin_estrategias_pat'           => 'Estrategias Pat',
            'admin_acciones_puntuales_pat'    => 'Acciones Puntuales',
        ],
        'catalogos_mir'=> [
            'admin_programas_presupuestales' => 'Prog. Presupuestales',
            'admin_niveles_mir'              => 'Niveles Mir',
            'admin_objetivos_mir'            => 'Objetivos Mir',
        ],
        'documentos'=> [
            'admin_categorias_documentos' => 'Cat. Documentos',
            'admin_documentos'            => 'Documentos',
        ],
        'articulos'=> [
            'admin_categorias_articulos' => 'Cat. Articulos',
            'admin_articulos'            => 'Articulos',
        ],
        'calendario'=> [
            'admin_calendario'            => 'Calendario',
        ],
    ];

 
@endphp

<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        {{-- <!-- Logo y título --> --}}
            <div class="navbar-nav theme-brand flex-row  text-center">
                <div class="nav-logo">
                    <div class="nav-item theme-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo_cnf_simple.png'); }}" class="navbar-logo" alt="logo">
                        </a>
                    </div>
                    <div class="nav-item theme-text">
                        <a href="{{ route('home') }}" class="nav-link"> SPME </a>
                    </div>
                </div>
                <div class="nav-item sidebar-toggle">
                    <div class="btn-toggle sidebarCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                    </div>
                </div>
            </div>
            <div class="shadow-bottom"></div>
        {{-- <!-- Termina Logo y título --> --}}

        {{-- <!-- Boton Home --> --}}
        <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionSidebar">
            <li class="menu {{ (!(!empty($menu_active) && $menu_active != 'home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Inicio</span>
                    </div>
                </a>
            </li>
            {{-- <!-- Termina Boton Home --> --}}


            <li class="menu {{ (isset($menu_active)&&$menu_active=="Administrar") ? 'active' : '' }}">
                <a href="#menu-administrar" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <span>Administrar</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                
                <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                    <li class="menu menu-heading">
                        <div class="heading">
                            <span>CATÁLOGOS ESTÁTICOS</span>
                        </div>
                    </li>
                    
                    @foreach ($_side_menu_tree['cat_estaticos'] as $menu => $nombre) 
                        <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                            <a href="{{route($menu)}}">{{$nombre}}</a>
                        </li>
                    @endforeach

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>CONFIGURACIONES</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['configuraciones'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>GRUPOS DE CAPTURA</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['grupos_captura'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>CATALOGOS PAT</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['catalogos_pat'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>CATALOGOS MIR</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['catalogos_mir'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>DOCUMENTOS</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['documentos'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>ARTICULOS</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['articulos'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="collapse submenu list-unstyled" id="menu-administrar" data-bs-parent="#accordionSidebar">
                        <li class="menu menu-heading">
                            <div class="heading">
                                <span>CALENDARIO</span>
                            </div>
                        </li>
                        
                        @foreach ($_side_menu_tree['calendario'] as $menu => $nombre) 
                            <li class="{{(isset($submenu_active)&&$submenu_active==$menu) ? 'active' : '' }}">
                                <a href="#">{{$nombre}}</a>
                            </li>
                        @endforeach
                    </ul>


                </ul>
            </li>

                  


            <li class="menu">
                <a href="#menu-planeacion" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Planeación</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu-planeacion" data-bs-parent="#accordionSidebar">
                    <li>
                        <a href="#"> List </a>
                    </li>
                    <li>
                        <a href="#"> Preview </a>
                    </li>
                    <li>
                        <a href="#"> Add </a>
                    </li>
                    <li>
                        <a href="#"> Edit </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#menu-monitoreo" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                        <span>Monitoreo</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu-monitoreo" data-bs-parent="#accordionSidebar">
                    <li>
                        <a href="#"> List </a>
                    </li>
                    <li>
                        <a href="#"> Preview </a>
                    </li>
                    <li>
                        <a href="#"> Add </a>
                    </li>
                    <li>
                        <a href="#"> Edit </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#menu-evaluacion" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        <span>Evaluación</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu-evaluacion" data-bs-parent="#accordionSidebar">
                    <li>
                        <a href="#"> List </a>
                    </li>
                    <li>
                        <a href="#"> Preview </a>
                    </li>
                    <li>
                        <a href="#"> Add </a>
                    </li>
                    <li>
                        <a href="#"> Edit </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#menu-cuenta" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Cuenta</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu-cuenta" data-bs-parent="#accordionSidebar">
                    <li>
                        <a href="#"> List </a>
                    </li>
                    <li>
                        <a href="#"> Preview </a>
                    </li>
                    <li>
                        <a href="#"> Add </a>
                    </li>
                    <li>
                        <a href="#"> Edit </a>
                    </li>
                </ul>
            </li>

            
        </ul>
        
    </nav>

</div>
<!--  END SIDEBAR  -->