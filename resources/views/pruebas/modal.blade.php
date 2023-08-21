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

    <link href="{{ asset('dx/src/assets/css/light/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/assets/css/dark/apps/mailbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/dark/editors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dx/src/plugins/css/light/editors/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('dx/src/plugins/src/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
    
@endpush


@section('content')

<div>
    checa:
    <br>
    @if(isset($request))
    {{var_dump($request)}}
    @endif
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

                    @if(isset($rows))
                    @foreach($rows as $_hr => $_vr)
                        @php
                        //echo json_encode($arr);
                        //$opt = array();
                        //$opt=json_decode($_vr['options'], true);
                        @endphp
                        <div class="mail-item mailInbox" id="{{!empty($opt) ? 'unread-schedular-alert' : ''}}" >
                            <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThirteen">
                                <div class="mb-0">
                                    <div class="mail-item-heading personal collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseThirteen" aria-expanded="false">
                                        <div class="mail-item-inner">

                                            <div class="d-flex">
                                                <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                    <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default8">
                                                </div>
                                                <div class="f-head">
                                                    <img src="../images/profiles/default/avatar.jpg" class="user-profile" alt="avatar">
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
                    @endif

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

                <form action="{{route('prueba')}}" method="post" id="form_modal">
                    @csrf;

                <div class="modal-header">
                    <h5 class="modal-title add-title" id="notesMailModalTitleeLabel">Compose</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                    <div class="compose-box">
                        <div class="compose-content">

                                

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4 mail-form">
                                            <p>From:</p>
                                            <select class="form-control" name="from">
                                                <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                                                <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4 mail-to">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> To:</p>
                                            <div class="">
                                                <input type="email" name="para" class="form-control">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-4 mail-cc">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> CC:</p>
                                            <div>
                                                <input type="text" name="copia" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 mail-subject">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Subject:</p>
                                    <div class="w-100">
                                        <input type="text" name="asunto" class="form-control">
                                        <span class="validation-text"></span>
                                    </div>
                                </div>
                                
                                <div class="">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Upload Attachment:</p>
                                    <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                                    <input class="form-control file-upload-input" type="file" name="formFile" multiple="multiple">
                                </div>
                                <input type="hidden" id="campoEnriquecido" name="campoEnriquecido">

                                <div id="editor">
                                </div>
                               

                            
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    

                    <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

                   
                    <button type="submit" form="form_modal" class="btn btn-primary"> Send</button>
                </div>
                </form>
            </div>
        </div>
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

   <script src="{{ asset('dx/src/plugins/src/editors/quill/quill.js') }}"></script>
   <script src="{{ asset('dx/src/plugins/src/notification/snackbar/snackbar.min.js') }}"></script>
   <script src="{{ asset('dx/src/assets/js/apps/mailbox.js') }}"></script>

   <script>

    // Inicializa el editor Quill
    var quill = new Quill('#editor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});


var form = document.querySelector('form');
form.onsubmit = function() {
  // Populate hidden form on submit
  var about = document.querySelector('input[name=campoEnriquecido]');
  about.value = JSON.stringify(quill.getContents());
  
  console.log("Submitted", $(form).serialize(), $(form).serializeArray());
  
  // No back end to actually submit to!
  
};




</script>
{{-- 
    // Actualiza el campo oculto con el contenido enriquecido al enviar el formulario

document.querySelector('form').addEventListener('submit', function() {
    var contenidoEnriquecido = quill.root.innerHTML;
    var delta = quill.getContents();
    var text = quill.getText(0,10);
    document.querySelector('#campoEnriquecido').value = text;
  }); 
  
  
  --}}
@endpush


