@php
    $_side_menu_tree = [
        'admin_estatus'                 => ['admin_index'],
        'admin_acciones'                => ['admin_index'],
        'admin_tipo_capturas'           => ['admin_index'],
        'admin_tipos_comentarios'       => ['admin_index'],
        'admin_frecuencias_mediciones'    => ['admin_index'],
        'admin_origenes_presupuestales' => ['admin_index'],
        'admin_regiones'                => ['admin_index'],
        'admin_entidades_federativas'   => ['admin_index'],
        'admin_municipios'              => ['admin_index'],
        'admin_Pruebas'                 => ['admin_index'],

        'admin_config'             => ['admin_index'],
        'admin_usuarios'           => ['admin_index'],
        'admin_bitacora'           => ['admin_index'],
        'admin_plantillas_correos' => ['admin_index'],

        'admin_gc_claves'      => ['admin_index'],
        'admin_grupos_captura' => ['admin_index'],

        'admin_programas_institucionales' => ['admin_index'],
        'admin_objetivos_pat'             => ['admin_index'],
        'admin_estrategias_pat'           => ['admin_index'],
        'admin_acciones_puntuales_pat'    => ['admin_index'],

        'admin_programas_presupuestales' => ['admin_index'],
        'admin_niveles_mir'              => ['admin_index'],
        'admin_objetivos_mir'            => ['admin_index'],

        'admin_categorias_documentos' => ['admin_index'],
        'admin_documentos'            => ['admin_index'],

        'admin_categorias_articulos' => ['admin_index'],
        'admin_articulos'            => ['admin_index'],

        'admin_articulos'            => ['admin_index'],
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

        {{-- <!-- Boton Rojo --> --}}
        <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionSidebar">
            <li class="menu {{ (!(!empty($menu_active) && $menu_active != 'home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Inicio</span>
                    </div>
                </a>
            </li>
            {{-- <!-- Termina Boton Rojo --> --}}

            <li class="menu {{ (!empty($menu_active) && ($menu_active == 'admin_index' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_index',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
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
                            <span> CATÁLOGOS ESTÁTICOS </span>
                        </div>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_estatus' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_estatus',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_estatus') }}"> Estatus </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_acciones' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_acciones',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_acciones') }}"> Acciones </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_tipo_capturas' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_tipo_capturas',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_tipo_capturas') }}"> Tipos de captura </a>
                    </li>

                    {{--
                    <!-- <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_tipos_comentarios' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_tipos_comentarios',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_estatus') }}"> Tipos de comentarios </a>
                    </li> -->
                    --}}

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_frecuencias_mediciones' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_frecuencias_mediciones',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_frecuencias_mediciones') }}"> Fr. de medición </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_origenes_presupuestales' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_origenes_presupuestales',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_origenes_presupuestales') }}"> Or. presupuestales </a>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_regiones' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_regiones',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_regiones') }}"> Regiones </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_entidades_federativas' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_entidades_federativas',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_entidades_federativas') }}"> Entidades federativas </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_municipios' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_municipios',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="{{ route('admin_municipios') }}"> Municipios </a>
                    </li>
                    


                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> CONFIGURACIONES </span>
                        </div>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_config' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_config',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Cfg. del sistema </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_usuarios' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_usuarios',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Usuarios </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_bitacora' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_bitacora',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Bitácora </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_plantillas_correos' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_plantillas_correos',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Plantillas de correos </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> GRUPOS DE CAPTURA </span>
                        </div>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_gc_claves' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_gc_claves',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Claves </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_grupos_captura' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_grupos_captura',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Grupos de captura </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> CATÁLOGOS PAT </span>
                        </div>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_programas_institucionales' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_programas_institucionales',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Pgm. institucionales </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_objetivos_pat' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_objetivos_pat',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Objetivos de PAT </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_estrategias_pat' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_estrategias_pat',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Estrategias de PAT </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_acciones_puntuales_pat' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_acciones_puntuales_pat',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> A.P. de PAT </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> CATÁLOGOS MIR </span>
                        </div>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_programas_presupuestales' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_programas_presupuestales',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Pgm. presupuestales </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_niveles_mir' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_niveles_mir',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Niveles de MIR </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_objetivos_mir' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_objetivos_mir',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Objetivos de MIR </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> DOCUMENTOS </span>
                        </div>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_categorias_documentos' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_categorias_documentos',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Ctg. de documentos </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_documentos' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_documentos',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Documentos </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> ARTÍCULOS </span>
                        </div>
                    </li>


                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_categorias_articulos' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_categorias_articulos',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Ctg. de artículos </a>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_articulos' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_articulos',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Artículos </a>
                    </li>



                    <li class="menu menu-heading">
                        <div class="heading">
                            <span> CALENDARIO </span>
                        </div>
                    </li>

                    <li class="{{ (!empty($menu_active) && ($menu_active == 'admin_control_calendario' || (isset($_side_menu_tree[$menu_active]) && in_array('admin_control_calendario',$_side_menu_tree[$menu_active])))) ? 'active' : '' }}">
                        <a href="#"> Control calendario </a>
                    </li>
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