<div>
    {{var_dump($rows)}}
    <div class="mail-box-container">

        <div class="mail-overlay"></div>

        <div class="tab-title">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 text-center mail-btn-container">
                    Nuevo
                    <a id="btn-compose-mail" class="btn btn-block" href="javascript:void(0);" title="Crear un aviso"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                </div>
                <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                    <div class="mail-sidebar-scroll">
                        <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> 
                                    <span class="nav-names">Entrada</span> 
                                    <span class="mail-badge badge"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions" id="important"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <span class="nav-names">Destacado</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions" id="sentmail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> 
                                    <span class="nav-names"> Enviado</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions" id="trashed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> 
                                    <span class="nav-names">Eliminado</span>
                                </a>
                            </li>
                        </ul>

                        <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg> Categorias</p>
                        <ul class="nav nav-pills d-block group-list col-2" id="pills-tab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link list-actions active g-dot-primary" id="personal"><span>Avisos</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions g-dot-warning" id="work"><span>Trabajo</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions g-dot-success" id="social"><span>Listos</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-actions g-dot-danger" id="private"><span>Atender</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div id="mailbox-inbox" class="accordion mailbox-inbox">

            <div class="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                <input type="text" class="form-control input-search" placeholder="Buscar aquí...">
            </div>

            <div class="action-center">
                <div class="">
                    <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                        <input class="form-check-input inbox-chkbox" type="checkbox" id="inboxAll">
                    </div>
                </div>

                <div class="">
                    <div class="dropdown d-inline-block more-color">
                        <a class="nav-link dropdown-toggle" id="more-color-btns-dropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" title="Agregar Etiqueta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Label" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        </a>
                        <div class="dropdown-menu left p-2 col-1" aria-labelledby="more-color-btns-dropdown">
                            <a class="label-group-item label-personal dropdown-item position-relative g-dot-primary" href="#"> Avisos</a>
                            <a class="label-group-item label-work dropdown-item position-relative g-dot-warning" href="#"> Trabajo</a>
                            <a class="label-group-item label-social dropdown-item position-relative g-dot-success" href="#"> Listos</a>
                            <a class="label-group-item label-private dropdown-item position-relative g-dot-danger" href="#"> Urgente</a>
                        </div>
                    </div>
                    <a title="Marcar como Importante">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" data-toggle="tooltip" data-placement="top" data-original-title="Important" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star action-important"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </a>
                    &nbsp; &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete Permanently" class="feather feather-trash permanent-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>                    
                    <div class="dropdown d-inline-block more-actions">
                        <a class="nav-link dropdown-toggle" id="more-actions-btns-dropdown" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </a>
                        <div class="dropdown-menu left" aria-labelledby="more-actions-btns-dropdown">
                            <a class="dropdown-item action-mark_as_read" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> Marcar como leído
                            </a>
                            <a class="dropdown-item action-mark_as_unRead" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Marcar como no leído
                            </a>
                            <a class="dropdown-item action-delete" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Eliminar
                            </a>
                        </div>
                    </div>

                </div>
            </div>
    
            <div class="message-box">
                
                <div class="message-box-scroll" id="ct">

                @if (count($rows))
                    @php
                    // validando usuarios con imagen o no para recibidos, en enviados solo se pone nombre de quien envia
                    $ini='CNF';
                    if(isset($user['img']))
                        <img src="{{url()}}/public/images/profiles/{{$user['img']}}" 
                        class="user-profile" alt="avatar">
                        @else
                        <div class="avatar avatar-sm">
                            <span class="avatar-title rounded-circle">{{$ini}}</span>
                        </div>
                        @endif

                    if(!empty($user['full_name'])&&strlen($user['full_name'])>=5){
                        $pieces = explode(" ",$user['full_name']);
                        if(count($pieces)<=4){
                            $ini='';
                            for ($pieces as $piece => $val)
                                $ini.=$val[0];
                        }
                        if(count($pieces)>=5){
                            $ini='';
                            for ($pieces as $piece => $val){
                                if(strlen($val)>=3)    
                                    $ini.=$val[0];
                            }
                        }

                    }
                    else {
                        $ini='User';
                    }

                    // validando usuarios con imagen o no para recibidos, en enviados solo se pone nombre de quien envia
                    @endphp

                    

                    @foreach($rows as $_hr => $_vr)
                        @php
                        $new = 1;
                        $tag='';
                        $mark='';
                        $bandeja = 'mailInbox';

                        $opt = json_decode($_vr['options'], true);

                        if ($_vr['cat_statu_id']==1)
                            $bandeja = 'sentmail'; //correos enviados
                            
                        if ($_vr['cat_statu_id']==2)
                            $bandeja = 'mailInbox';//para bandeja de entrada 
                            
                        if ($_vr['cat_statu_id']==3)
                            $bandeja = 'trashed';

                        if ($_vr['cat_statu_id']==5)
                            $bandeja = 'trashed'; // eliminado logicamente

                        if (!empty($opt)){
                            if(isset($opt['new'])&&!empty($opt['new'])){
                            $new = $opt['new'];
                            }

                            if(isset($opt['mark'])&&!empty($opt['mark'])){
                            $mark = 'fadeInUp';
                            $bandeja = 'important'
                            }

                            //1) personal=azul | 2) work => naranja | 3) social =>verde | 4) private=>rojo
                            if(isset($opt['tag'])&&!empty($opt['tag'])){
                            $tag = $opt['tag'];
                            }

                        }

                        //echo json_encode($arr);
                        //$opt=json_decode($_vr['options'], true);
                        @endphp
                       
                        <div class="mail-item {{$bandeja}}" id="{{!isset($new) ? 'unread-schedular-alert' : '')}}" >
                            <div class="animated animatedFadeInUp {{$mark}}" id="mailHeading{{$_vr['id']}}">
                                <div class="mb-0">
                                    <div class="mail-item-heading {{$tag}} collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapse{{$_vr['id']}}" aria-expanded="false">
                                        <div class="mail-item-inner">

                                            <div class="d-flex">
                                                <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                    <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default{{$_vr['id']}}">
                                                </div>
                                                <div class="f-head">
                                                    @if(isset($user['img']))
                                                    <img src="{{url()}}/public/images/profiles/{{$user['img']}}" 
                                                    class="user-profile" alt="avatar">
                                                    @else
                                                    <div class="avatar avatar-sm">
                                                        <span class="avatar-title rounded-circle">{{$ini}}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="f-body">
                                                    <div class="meta-mail-time">
                                                        <p class="user-email" data-mailTo="roxanne@mail.com">Roxanne</p>
                                                    </div>
                                                    <div class="meta-title-tag">
                                                        <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Schedular Alert">Schedular Alert - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                        <div class="tags">
                                                            <span class="g-dot-primary"></span>
                                                            <span class="g-dot-warning"></span>
                                                            <span class="g-dot-success"></span>
                                                            <span class="g-dot-danger"></span>
                                                        </div>
                                                        <p class="meta-time align-self-center">15 Jan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="mail-item mailInbox">
                    <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                        <div class="mb-0">
                            <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#nada" aria-expanded="false">
                                <div class="mail-item-inner">

                                    <div class="d-flex">
                                        
                                        <div class="f-head">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle">VA</span>
                                            </div>
                                        </div>
                                        <div class="f-body">
                                            <div class="meta-mail-time">
                                                <p class="user-email" data-mailTo="">Sin Avisos</p>
                                            </div>
                                            <div class="meta-title-tag">
                                                <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"No tiene Avisos\n"}]}'>
                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> --}}
                                                    <span class="mail-title" data-mailTitle="No tiene Avisos">No titne avisos - </span> Vacio
                                                </p>
                                                <div class="tags">
                                                    <span class="g-dot-primary"></span>
                                                    <span class="g-dot-warning"></span>
                                                    <span class="g-dot-success"></span>
                                                    <span class="g-dot-danger"></span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="attachments">
                                    <span class="">Confirm File.txt</span>
                                    <span class="">Important Docs.xml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

                    <div class="mail-item trashed">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingOne">
                            <div class="mb-0">
                                <div class="mail-item-heading personal collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseOne" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input new-control" type="checkbox" id="form-check-default1">
                                            </div>
                                            <div class="f-body" data-mailfrom="info@mail.com" data-mailto="kf@mail.com" data-mailcc="">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="kf@mail.com">Keith Foster</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-maildescription='{"ops":[{"insert":"titulo de entrada.\n"}]}'><span class="mail-title" data-mailTitle="noticias">trashed: noticias de diseño web - </span>Texto de body del correy</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary">a</span>
                                                        <span class="g-dot-warning">b</span>
                                                        <span class="g-dot-success">c</span>
                                                        <span class="g-dot-danger">d</span>
                                                    </div>
                                                    <p class="meta-time align-self-center">9:30 PM</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item sentmail">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTwo">
                            <div class="mb-0">
                                <div class="mail-item-heading work collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseTwo" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default2">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="alan@mail.com">Alan</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Contenido de una descripcion corta para evitar que se corte o que se cargue mucha informacion\n"}]}'><span class="mail-title" data-mailTitle="Mozilla Update">Mozilla Update - </span>Contenido de una descripcion corta para evitar que se corte o que se cargue mucha informacion</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">8:45 AM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    <div id="unread-promotion-page" class="mail-item mailInbox">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                            <div class="mb-0">
                                <div class="mail-item-heading social collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseThree" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default3">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="laurieFox@mail.com">Isra mont</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"aqui va el body\n"}]}'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                                        <span class="mail-title" data-mailTitle="es el titulo del mail">pagina de promocion - </span> aqui se pone mas texto para ver donde se coloca o termina cuando es demaciado largo porque se puede cortar si es asi
                                                    </p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">2:00 PM</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attachments">
                                        <span class="">Confirm File.txt</span>
                                        <span class="">Important Docs.xml</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item trashed">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFour">
                            <div class="mb-0">
                                <div class="mail-item-heading private collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFour" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default4">
                                            </div>
                                            <div class="f-body" data-mailfrom="info@mail.com" data-mailto="amDiaz@mail.com" data-mailcc="">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="amDiaz@mail.com">Amy Diaz</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Ecommerce Analytics">trashed: Ecommerce Analytics - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">2:00 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item mailInbox">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFive">
                            <div class="mb-0">
                                <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFive" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default5">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="kingAndy@mail.com">Andy King</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Hosting Payment Reminder">Hosting Payment Reminder -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">6:28 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="unread-verification-link" class="mail-item mailInbox">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEleven">
                            <div class="mb-0">
                                <div class="mail-item-heading social collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseEleven" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default6">
                                            </div>
                                            <div class="f-head">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">INI</span>
                                                </div>
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="kirsten.beck@mail.com">Kristen Beck</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Verification Link">Verification Link - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">8 Feb</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    
               

                    <div class="mail-item sentmail">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSix">
                            <div class="mb-0">
                                <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseSix" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default9">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="justincross@mail.com">Justin Cross</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="App Project Checklist">App Project Checklist - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">3:10 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item mailInbox important">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSeven">
                            <div class="mb-0">
                                <div class="mail-item-heading work collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseSeven" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default10">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="niahillyer@mail.com">Nia Hillyer</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. \n"}]}'><span class="mail-title" data-mailTitle="Motion UI Kit">Motion UI Kit - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. </p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="yellow" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                                    </div>
                                                    <p class="meta-time align-self-center">10 Jan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item mailInbox important">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEight">
                            <div class="mb-0">
                                <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseEight" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default11">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="irishubbard@mail.com">Iris Hubbard</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Green Illustration">Green Illustration - </span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">01 Jan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item trashed">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTen">
                            <div class="mb-0">
                                <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseTen" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default13">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="ryanMCkillop@mail.com">Ryan MC Killop</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Make it Simple">Make it Simple - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">11:45 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item mailInbox important">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFourteen">
                            <div class="mb-0">
                                <div class="mail-item-heading work collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFourteen" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default14">
                                            </div>
                                            <div class="f-head">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">E</span>
                                                </div>
                                            </div>
                                            <div class="f-body">    
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="reevesErnest@mail.com">Ernest Reeves</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Youtube">Youtube - </span>Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">25 Dec</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="unread-verification-link-new" class="mail-item mailInbox">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSixteen">
                            <div class="mb-0">
                                <div class="mail-item-heading personal collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseSixteen" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default16">
                                            </div>
                                            <div class="f-head">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">NI</span>
                                                </div>
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="npminc@mail.com">NPM Inc</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg><span class="mail-title" data-mailTitle="npm Inc">npm Inc - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">01 Dec</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attachments">
                                        <span class="">package.zip</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mail-item trashed">
                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEighteen">
                            <div class="mb-0">
                                <div class="mail-item-heading collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseEighteen" aria-expanded="false">
                                    <div class="mail-item-inner">

                                        <div class="d-flex">
                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default20">
                                            </div>
                                            <div class="f-head">
                                                <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                            </div>
                                            <div class="f-body">
                                                <div class="meta-mail-time">
                                                    <p class="user-email" data-mailTo="liamSheldon@mail.com">Liam Sheldon</p>
                                                </div>
                                                <div class="meta-title-tag">
                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="New Offers">New Offers - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                    <div class="tags">
                                                        <span class="g-dot-primary"></span>
                                                        <span class="g-dot-warning"></span>
                                                        <span class="g-dot-success"></span>
                                                        <span class="g-dot-danger"></span>
                                                    </div>
                                                    <p class="meta-time align-self-center">11:45 PM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="content-box">
                <div class="d-flex msg-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    <h2 class="mail-title" data-selectedMailTitle=""></h2>
                </div>

                <div id="mailCollapseTwo" class="collapse" aria-labelledby="mailHeadingTwo" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container sentmail" data-mailfrom="info@mail.com" data-mailto="alan@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex user-info">
                                <div class="f-body">
                                    <div class="meta-mail-time">
                                        <div class="">
                                            <p class="user-email" data-mailto="alan@mail.com"><span>To,</span> alan@mail.com</p>
                                        </div>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">8:45 AM</p>
                                    </div>
                                </div>
                            </div>

                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>
                        <p class="mail-content" data-mailTitle="Mozilla Update" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Shaun Park</p>

                        <div class="attachments">
                            <h6 class="attachments-section-title">Attachments</h6>
                            <div class="attachment file-pdf">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">Confirm File</p>
                                        <p class="file-size">450kb</p>
                                    </div>
                                </div>
                            </div>

                            <div class="attachment file-folder">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                    <div class="media-body">
                                        <p class="file-name">Important Docs</p>
                                        <p class="file-size">2.1MB</p>
                                    </div>
                                </div>
                            </div>

                            <div class="attachment file-img">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">Photo.png</p>
                                        <p class="file-size">50kb</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="mailCollapseThree" class="collapse" aria-labelledby="mailHeadingThree" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="linda@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between">

                            <div class="    ">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Promotion Page">nombre de usuario</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="laurieFox@mail.com">correo de usuario</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">2:00 PM</p>
                                    </div>
                                </div>
                            </div>

                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>fi
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>fd
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Pagina de promocion" data-maildescription='{"ops":[{"insert":"texto insertado\n"}]}'> Texto Insertado </p>

                        <div class="gallery text-center">
                            Texto donde van las imagenes
                        </div>
                        <p>Otro parrafo dentro del Body.</p>

                        <p>saludos</p>
                        <p>nombre de usuario</p>


                        <div class="attachments">
                            <h6 class="attachments-section-title">zon de archivos o comentarios</h6>
                            <div class="attachment file-pdf">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">nombre del archivo adjunto uno</p>
                                        <p class="file-size">peso de archivo450kb</p>
                                    </div>
                                </div>
                            </div>

                            <div class="attachment file-folder">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">nombre del archivo adjunto dos</p>
                                        <p class="file-size">peso de archivo450kb</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div id="mailCollapseFive" class="collapse" aria-labelledby="mailHeadingFive" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="kingAndy@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Hosting Payment Reminder">Andy King</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="kingAndy@mail.com">kingAndy@mail.com</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">6:28 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Hosting Payment Reminder" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Andy King</p>

                    </div>
                </div>

                <div id="mailCollapseEleven" class="collapse" aria-labelledby="mailHeadingEleven" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="kirsten.beck@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle">KB</span>
                                    </div>
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Verification Link">Kirsten Beck</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="kirsten.beck@mail.com">kirsten.beck@mail.com</p>
                                        <p class="mail-content-meta-date">12/08/2022 -</p>
                                        <p class="meta-time align-self-center">11:09 AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Verification Link" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Kirsten Beck</p>

                    </div>
                </div>

                <div id="mailCollapseThirteen" class="collapse" aria-labelledby="mailHeadingThirteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="roxanne@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Schedular Alert">Roxanne</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="roxanne@mail.com">roxanne@mail.com</p>
                                        <p class="mail-content-meta-date">11/15/2022 -</p>
                                        <p class="meta-time align-self-center">2:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Schedular Alert" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Roxanne</p>

                    </div>
                </div>

                <div id="mailCollapseFourteen" class="collapse" aria-labelledby="mailHeadingFourteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="reevesErnest@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle">E</span>
                                    </div>
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Youtube">Youtube</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="reevesErnest@mail.com">reevesErnest@mail.com</p>
                                        <p class="mail-content-meta-date">06/02/2022 -</p>
                                        <p class="meta-time align-self-center">8:25 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Youtube" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Ernest Reeves</p>

                    </div>
                </div>

                <div id="mailCollapseFifteen" class="collapse" aria-labelledby="mailHeadingFifteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="50% Discount">Info Company</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                        <p class="mail-content-meta-date">02/10/2022 -</p>
                                        <p class="meta-time align-self-center">7:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="50% Discount" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>

                    </div>
                </div>

                <div id="mailCollapseSixteen" class="collapse" aria-labelledby="mailHeadingSixteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="npminc@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-title rounded-circle">NI</span>
                                    </div>
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="npm Inc">npm Inc</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="npminc@mail.com">npminc@mail.com</p>
                                        <p class="mail-content-meta-date">12/15/2021 -</p>
                                        <p class="meta-time align-self-center">8:37 AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="npm Inc" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>


                        <div class="attachments">
                            <h6 class="attachments-section-title">Attachments</h6>
                            <div class="attachment file-pdf">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    <div class="media-body">
                                        <p class="file-name">package.zip</p>
                                        <p class="file-size">450kb</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="mailCollapseSeventeen" class="collapse" aria-labelledby="mailHeadingSeventeen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="eBill">eBill</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                        <p class="mail-content-meta-date">11/25/2021 -</p>
                                        <p class="meta-time align-self-center">1:51 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="eBill" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>
                    </div>
                </div>

                <div id="mailCollapseNineteen" class="collapse" aria-labelledby="mailHeadingNineteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Renew : Cork Licence">Renew : Cork Licence</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                        <p class="mail-content-meta-date">11/25/2021 -</p>
                                        <p class="meta-time align-self-center">1:51 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Renew : Cork Licence" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>
                    </div>
                </div>

                <div id="mailCollapseTwenty" class="collapse" aria-labelledby="mailHeadingTwenty" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Verification Link">Verification Link</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                        <p class="mail-content-meta-date">11/25/2021 -</p>
                                        <p class="meta-time align-self-center">1:51 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Verification Link" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>
                    </div>
                </div>

                <div id="mailCollapseEighteen" class="collapse" aria-labelledby="mailHeadingEighteen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="">Info Company</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">11:45 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="New Offers" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Info Company</p>


                        <div class="attachments">
                            <h6 class="attachments-section-title">Attachments</h6>
                            <div class="attachment file-pdf">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">Confirm File</p>
                                        <p class="file-size">450kb</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="mailCollapseSix" class="collapse" aria-labelledby="mailHeadingSix" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container sentmail" data-mailfrom="info@mail.com" data-mailto="justincross@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex user-info">
                                <div class="f-body">
                                    <div class="meta-mail-time">
                                        <div class="">
                                            <p class="user-email" data-mailto="justincross@mail.com"><span>To,</span> justincross@mail.com </p>
                                        </div>
                                        <p class="mail-content-meta-date">12/14/219 -</p>
                                        <p class="meta-time align-self-center">3:10 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="App Project Checklist" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Shaun Park</p>

                        <div class="attachments">
                            <h6 class="attachments-section-title">Attachments</h6>
                            <div class="attachment file-folder">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                    <div class="media-body">
                                        <p class="file-name">Important Docs</p>
                                        <p class="file-size">2.1MB</p>
                                    </div>
                                </div>
                            </div>

                            <div class="attachment file-img">
                                <div class="media">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                    <div class="media-body">
                                        <p class="file-name">Photo.png</p>
                                        <p class="file-size">50kb</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="mailCollapseSeven" class="collapse" aria-labelledby="mailHeadingSeven" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container important" data-mailfrom="info@mail.com" data-mailto="niahillyer@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Motion UI Kit">Nia Hillyer</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="niahillyer@mail.com">niahillyer@mail.com</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">2:22 AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="op" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Motion UI Kit" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>

                        <div class="gallery text-center">
                            sdfsdfsdfs fsd fsdf sdf s
                        </div>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Nia Hillyer</p>

                    </div>
                </div>

                <div id="mailCollapseEight" class="collapse" aria-labelledby="mailHeadingEight" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container important" data-mailfrom="info@mail.com" data-mailto="irishubbard@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Green Illustration">Iris Hubbard</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="irishubbard@mail.com">irishubbard@mail.com</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">1:40 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>

                        <p class="mail-content" data-mailTitle="Green Illustration" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Iris Hubbard</p>

                    </div>
                </div>

                <div id="mailCollapseTen" class="collapse" aria-labelledby="mailHeadingTen" data-bs-parent="#mailbox-inbox">
                    <div class="mail-content-container trashed" data-mailfrom="info@mail.com" data-mailto="ryanMCkillop@mail.com" data-mailcc="">

                        <div class="d-flex justify-content-between mb-5">
                            <div class="d-flex user-info">
                                <div class="f-head">
                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
                                </div>
                                <div class="f-body">
                                    <div class="meta-title-tag">
                                        <h4 class="mail-usr-name" data-mailtitle="Make it Simple">Ryan MC Killop</h4>
                                    </div>
                                    <div class="meta-mail-time">
                                        <p class="user-email" data-mailto="ryanMCkillop@mail.com">ryanMCkillop@mail.com</p>
                                        <p class="mail-content-meta-date current-recent-mail">12/14/2022 -</p>
                                        <p class="meta-time align-self-center">11:45 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="action-btns">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                </a>
                            </div>
                        </div>
                        <p class="mail-content" data-mailTitle="Make it Simple" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                        <div class="gallery text-center">
                            dsfsdfsdfsfsdfsd sdf df
                        </div>

                        <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                        <p>Best Regards,</p>
                        <p>Ryan McKillop</p>

                    </div>
                </div>
            </div>

        </div>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-title" id="notesMailModalTitleeLabel">Crear Aviso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                    <div class="compose-box">
                        <div class="compose-content">
                            {{ html()->modelForm($modelo,'post','{{route('prueba')}}')->id('modal')->open() }} 
                                <div class="mb-4 mail-subject">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Asunto:</p>
                                    <div class="w-100">
                                        <input type="text" id="title" class="form-control" wire:model.defer="title" title="Título del Aviso">
                                        @error('title')  
                                            <div class="input-group mb-3">
                                                <span class="text-danger"><b>* {{$message}}</b></span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <p>De:</p>
                                            <select class="form-control disabled" id="from_id" wire:model.defer='from_id' title="Elija usuario a enviar aviso">
                                                <option value={{$us->id}}>{{$us->full_name}}</option>
                                                {{-- @if($us->hasRole('spme-admin')) --}}
                                                @if($_adm)
                                                <option value=1>Sistema de Planeación Monitoreo y Evaluación</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4 mail-to">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Para:</p>
                                            <select class="form-control" id="user_id" wire:model.defer='user_id' title="Elija usuario a enviar aviso">
                                                <option value=0>Seleccione</option>
                                                @foreach ($rows_us as $_hus => $_vus)
                                                <option value={{$_hus}}>{{$_vus}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')  
                                                <div class="input-group mb-3">
                                                    <span class="text-danger"><b>* {{$message}}</b></span>
                                                </div>
                                            @enderror
                                            {{-- <div class="">
                                                <input type="email" id="m-to" class="form-control">
                                                <span class="validation-text"></span>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4 mail-cc">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> CC:</p>
                                            {{ html()->Select('m_cc')->class('form-control')->placeholder('Seleccione')->options($rows_us)->attributes(['wire:model.defer'=>'m_cc','title'=>'Elija un usuario a copiarle el aviso: ']) }}
                                            @error('m_cc')  
                                            <div class="input-group mb-3">
                                                <span class="text-danger"><b>* {{$message}}</b></span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip attachment-indicator"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> Archivos adjuntos:</p>
                                    <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                                    <input class="form-control file-upload-input" type="file" id="formFile" multiple="multiple">
                                    @error('formFile')
                                        <div class="input-group mb-3">
                                            <span class="text-danger"><b>* {{$message}}</b></span>
                                        </div>
                                    @enderror
                                </div>

                                <div id="editor-container">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button id="btn-save" class="btn float-left btn-success"> Guardar</button> --}}
                    {{-- <button id="btn-reply-save" class="btn float-left btn-success"> Save Reply</button>
                    <button id="btn-fwd-save" class="btn float-left btn-success"> Save Fwd</button> --}}

                    <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Cancelar</button>

                    {{-- <button id="btn-reply" class="btn btn-primary"> Responder</button> --}}
                    {{-- <button id="btn-fwd" class="btn btn-primary"> Forward</button> --}}
                    <button type="button" class="btn btn-success" form="modal" wire:click="create" wire:loading.attr="disabled">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</div>
