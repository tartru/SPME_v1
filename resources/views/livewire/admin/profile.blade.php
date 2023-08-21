<div>
    
     <div class="widget-content widget-content-area br-8 p-4 m-4">
        <!-- Variables -->
        
        <div class="row layout-spacing d-flex">
    
            <!-- Content -->
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            <?php if ($editar) { ?>
                {{html()->modelForm($user,'post','form')->id('nuevo')->open()}}
                <?php }?>
                <div class="user-profile">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Profile</h3>
                            <a type="button" class="mt-2 edit-profile" wire:click="editar"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>  {{($editar) ? 'ok' : 'nADA'}} 
                        </div>
                        <div class="text-center user-info">
                            <div style="align-content:stretch; overflow:hidden; object-fit: cover; width: 100%;">
                                <div class="p-3" wire:loading wire:target="image">Imagen cargando... </div>
                                <?php
                                if ($image) {
                                     list($width, $height, $type, $attr) = getimagesize($image->temporaryUrl());
                                     if($width>$height){
                                        echo  ('<img src="'.$image->temporaryUrl().'" alt="avatar Temporal" width="500px" style="width:500px;" >');
                                     }
                                     else {
                                        echo  ('<img src="'.$image->temporaryUrl().'" alt="avatar Temporal" height="450px" style="height:450px;" >');
                                     }
                                }
                                ?>
                            </div>
                                <?php if ($editar) { ?>
                                    <span>* Menor de 2Mb</span><br>
                                    <input type="file" wire:model="image" width="100%">  
                                <?php }?>
                            <p class=""> <strong>{{$user['name']}}</strong></p>
                            <p class=""> <strong>{{$user['full_name']}}</strong></p>
                        </div>
                        
                        {{-- datos de usuario --}}
                        <div class="user-info-list">
                    
                            <ul class="contacts-block list-unstyled">
                                <li>
                                    <div class="row">
                                        <div class="col-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                        </div>
                                        <div class="col">Área de Trabajo: <br>{{($user['puesto']) ? $user['puesto'] : ''}} </div>
                                       
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        </div>
                                        <div class="col">Último Ingreso: <br> {{($user['last_login_attempt']) ? $user['last_login_attempt'] : now();}}
                                        </div>
                                       
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </div>
                                        <div class="col">Tipo de Usuario: <br>{{($user['type']) ? $user['type'] : ''}}
                                        </div>
                                       
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        </div>
                                        <div class="col">Correo: <br>{{($user['email']) ? $user['email'] : ''}}
                                        </div>
                                       
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        </div>
                                        <div class="col">Teléfono: <br>{{$user['telefono'] ? $user['telefono'] : ''}}
                                        </div>
                                       
                                    </div>
                                </li>
                            </ul>
              
                            
                        </div>
                    </div>
                </div>
                <?php if ($editar) { ?>
                    {{ html()->form()->close() }} 
                <?php }?>
              
            </div>

            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

                <div class="usr-tasks ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Roles y Permisos</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sistema: MIR</th>
                                        <th>Rol:</th>
                                        <th>Permisos:</th>
                                    </tr>
                                    <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Figma Design</td>
                                        <td>                                                    
                                            <div class="progress br-30">
                                                <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 80.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td><p class="text-danger">29.56%</p></td>
                                        <td class="text-center">
                                            <p>2 mins ago</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sistema: MIR</th>
                                        <th>Roles:</th>
                                        <th>Permisos</th>
                                    </tr>
                                    <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Vue Migration</td>
                                        <td>
                                            <div class="progress br-30">
                                                <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td><p class="text-success">50%</p></td>
                                        <td class="text-center">
                                            <p>4 hrs ago</p>
                                        </td>
                                    </tr>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sistema: MIR</th>
                                                <th>Roles:</th>
                                                <th>Permisos</th>
                                            </tr>
                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                        </thead>
                                    
                                    <tr>
                                        <td>Flutter App</td>
                                        <td>                                                    
                                            <div class="progress br-30">
                                                <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 39%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td><p class="text-danger">39%</p></td>
                                        <td class="text-center">
                                            <p>a min ago</p>
                                        </td>
                                    </tr>
                                  

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
        
        <!-- Variables -->
    </div>

</div>
