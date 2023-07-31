<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Error;
use Spatie\Permission\Models\Role;
use App\Models\Cat\Cat_system;
use App\Models\Cat\Cat_entidades_federativa;
use App\Models\Cat\Cat_grupos_captura;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;


class UsersController extends Controller
{
    
    protected $usuario;
    protected $systems, $entidades, $grupos;
    
    public function __construct(User $usuario ,Cat_system $systems,Cat_entidades_federativa $entidades,Cat_grupos_captura $grupos ) {
        $this->usuario = $usuario;
        $this->systems = $systems;
        $this->entidades = $entidades;
        $this->grupos = $grupos;
    }

    //validaciones de formulario
    public function validation (request $request) {
        $request->validate([
            'name' => 'required|min:5|max:50',
            'type' => 'required|min:1|max:20',
            'full_name' => 'required|min:5|max:50',
        ]);
    }

    //listar usuarios
    public function index(){
        
        $usuario = $this->usuario->all();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.users.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.users.index'), 
                'Usuarios' => route('admin.users.index')
            ],
            'rows'        => $usuario
        ];

        return view('admin.UsersList',$data);
    }

    //datos de usuario
    public function profile()  {
        $id=auth()->id ();
        $user=$this->usuario->find($id);
        $data = [
            'menu_active' => 'Cuenta',
            'submenu_active' => 'admin.users.profile',
            'breadcrumb'  => [
                'Administrar' => route('admin.users.index'), 
                'Usuarios' => route('admin.users.index'),
                'Usuarios' => route('admin.users.index'),
            ],
            'rows'        => $user,
        ];
        return view('admin.UsersProfile',$data);    
    }

    //plantilla para editar registro
    public function edit(User $row){
        //regresa solo los sistemas a los que se le dio permiso
        $user_sys= $this->systems->getByUser($row->id);
        $sistemas= $this->systems->getBasic();
        $roles=Role::all();
        $groups = $this->grupos->getBasicToSelect();
        //return $groups;
        if (empty($groups)){
            $groups[0] = 'Agregar Todos';
        }
        else{
            $groups = arr::prepend($groups,'Agregar Todos',0);
        }
        $us_gs =  $row->cat_grupos_capturas()->select('cat_grupos_capturas.id','cat_grupos_capturas.nombre','cat_grupos_capturas.active','cat_grupos_capturas.deleted')->get();
        foreach ($us_gs as $_hgs => $_vgs){
            if(Arr::exists($groups,$_vgs['id'])) {
             unset($groups[$_vgs['id']]);
            //dump($_vgs['id']);
            }
        }
        
        //tipo-tamaño-nulos-default
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.users.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Usuarios' => route('admin.users.index'),
                'Editar' => route('admin.users.index'),
            ],
            'user'        => $row,
            'roles'=>$roles,
            'rows_e' => $this->entidades->getAllActives(),
            'rows_es' =>  $row->Cat_entidades_federativas()->select('cat_entidades_federativas.id','cat_entidades_federativas.nombre','cat_entidades_federativas.deleted')->get(),
            'rows_g' => $groups,
            'rows_gs' => $us_gs,
            'update'=>'Actualizar datos de Usuario',
            // type = tipo de campo| tamaño | requerido | valor default| editable
            'headers' => [
                'id'        => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'name'      => ['txt'=>'Usuario','type'=>'varchar-50-si-no-si'],
                'full_name'      => ['txt'=>'Nombre','type'=>'varchar-150-si-no-si'],
                'email'     => ['txt'=>'Correo Electronico','type'=>'varchar-3-si-null-no'],
                'type'     => ['txt'=>'Tipo de Usuario','type'=>'varchar-3-si-null-si'],
                'puesto'     => ['txt'=>'Puesto a desempeñar','type'=>'varchar-125-si-null-si'],
                'area'     => ['txt'=>'Área asignada','type'=>'varchar-125-si-null-si'],
                'last_ip'     => ['txt'=>'IP','type'=>'varchar-3-si-null-no'],
                'login_attempts'     => ['txt'=>'Intentos de logéo','type'=>'tint-2-si-1-si'],
                'logged_at' => ['txt'=>'Ultimo login el','type'=>'timestamp-3-no-null-no'],
                'ban_reason'     => ['txt'=>'Bloqueado por','type'=>'varchar-100-no-null-si'],
                'bloqued'    => ['txt'=>'Bloqueado','type'=>'tint-1-si-0-si'],
                'active'    => ['txt'=>'Activo','type'=>'tint-1-si-1-no'],
                'deleted'   => ['txt'=>'Eliminado','type'=>'int-1-si-0-no'],
                'created_at' => ['txt'=>'Creado el','type'=>'timestamp-3-no-null-no'],
                'updated_at' => ['txt'=>'Actualizado el','type'=>'timestamp-2-no-now-no'],
                'activated_at' => ['txt'=>'Activado el','type'=>'timestamp-2-no-null-no'],
                'deleted_at' => ['txt'=>'Eliminado el','type'=>'timestamp-2-no-null-no'],
            ],
            'atras'  => 'admin.users.index',
            'user_sys'  => $user_sys,
            'sistemas' => $sistemas,
        ];
        return view('admin.UserEdit',$data);
    }

    //actualizar y guardar registro
    public function update(request $request, User $user){
        $us = User::findOrFail($user->id);
        
        //activar o desactivar usuario
        if ($request->has("active")){
            $us->active = $request->active;
            $msg = ($request->active == 0) ? 'Usuario Desactivado' : 'Usuario Activado';
            if($us->save()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route('admin.users.edit',$us);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route('admin.users.edit',$us)->with('message' ,"No se pudo relizar la acción");
            }
        }

        //datos del usuario
        if ($request->has("data_us")){
            $paso =$this->validation($request);
            if(empty($paso))
            $datos = $request->except('_method','_token','data_us');
            //return $datos;
            //$user->fill($request->all());
            if($us->update($datos)){
                session()->flash('msg-success' ,'Datos actualizados');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
                return redirect()->route('admin.users.edit',$us);
            }
        }

        //permitir acceso a sistemas
        if ($request->has("system")){
            $datos = $request->except('_method','_token','system');
            $bol_f=true; //sin errores
            //return $datos;
            foreach ($datos as $_hd => $_vd) {
                $bol_d=false;
                if (Str::contains($_hd,'-R')){
                    //dump($_vd);
                    if(Arr::exists($datos,Str::before($_hd,'-R'))) {
                        $bol_d=true;
                        //dump('chek');
                    }
                    
                    if ($bol_d&&!$this->systems->hasUsIdSystemId($user->id,$_vd)){
                       //dump('se agregara');
                        // aquiva vamos para guardar los datos o quitarlos segun la funcion cat_systems->getBySigla que regresa el registro o un cero si no hay
                        if(!$this->systems->saveUsIdSysId($user->id,$_vd)) {
                            $bol_f=false;
                        }
                    }

                    if (!$bol_d&&$this->systems->hasUsIdSystemId($user->id,$_vd)) {
                        //dump('se eliminara');
                        if(!$this->systems->deleteUsIdSysId($user->id,$_vd)){
                            $bol_f=false;
                        }
                    }
                 }
                //dump($bol_f);
                
            }
            //return $datos;
            $msg = ($bol_f) ? 'Sistemas del Usuario Actualizados' : 'Error al signar Sistemas del Usuario';
            if($bol_f){
                session()->flash('msg-success' ,$msg);
                return redirect()->route('admin.users.edit',$us);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route('admin.users.edit',$us)->with('message' ,"No se pudo relizar la acción");
            }
        }

        //asignar roles
        if ($request->has("roles")){
            $datos = $request->except('_method','_token','roles');
            $bol_f=true; //sin errores
                foreach ($datos as $_hd => $_vd) {
                    if (Str::contains($_hd,'-R')){
                        //dump($_vd);
                        if(Arr::exists($datos,$_vd)){
                            //dump('chek');
                            if(!$us->hasrole($_vd)){
                                //dump('se asignará');
                                if(!$us->assignRole($_vd))
                                $bol_f=false;
                            }
                        }
                        else {
                            if($us->hasrole($_vd)){
                                //dump('se quitará');
                                if(!$us->removeRole($_vd))
                                $bol_f=false;
                            }
                        }
                    }
                }
                //dump($bol); 
                //return "tex";
            //$us->role()->sync($datos);// no porque quita todos y deja solo el array
            // $roles = $user->getRoleNames(); // regresa todos los roles del usuario
            if($bol_f){
                session()->flash('msg-success' ,'Roles actualizados');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se actualizaron los roles - Intente nuevamente');
                return redirect()->route('admin.users.edit',$us);
            }

        }

        //elimina grupo ind al que pertenece el usuario
        if ($request->has("del_gr")){
            $datos = $request->except('_method','_token');
            $bol_f=true; //sin errores
            //return $request;
            if($us->cat_grupos_capturas()->detach([$datos])){
                //dump('quitado');
            }
            else {
                $bol_f=false;
                //dump('error no quitado');
            }
            $msg = ($bol_f) ? 'Grupo quitado' : 'No se pudo quitar grupo, Reintente';
            if($bol_f){
                session()->flash('msg-success' ,$msg);
                return redirect()->route('admin.users.edit',$us);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route('admin.users.edit',$us)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }

        //agrega o elimina entidades al grupo
        if ($request->has("add_grupo")){
            $datos = $request->except('_method','_token','add_grupo');
            $tiempo=Carbon::now();
            $bol_f=true; //sin errores
            //return $datos;
            if ($request->input('grupos')==0){
                $groups= $this->grupos->getBasicToSelect();
                $us_gs = $us->cat_grupos_capturas()->select('cat_grupos_capturas.id','cat_grupos_capturas.nombre','cat_grupos_capturas.active','cat_grupos_capturas.deleted')->get();
                $var=array();
                //return $rows_g;
                foreach ($us_gs as $_hgs => $_vgs){
                    $var[$_vgs['id']]=$_vgs['id'];
                }
                //dump ($var);
                
                foreach ($groups as $_hg => $_vg){
                    if(!Arr::exists($var,$_hg)) {
                        //dump('se asignará: '.$_hg);
                        if(!$us->cat_grupos_capturas()->attach($_hg,['created_at' => $tiempo])){
                            //dump('asignado');
                        }
                        else {
                            $bol_f=false;
                            //dump('error no asignado');
                        }
                    }
                    //dump($bol_f); 
                    //return $datos;
                }
            }
            else
            {
                if(!$us->cat_grupos_capturas()->attach($datos,['created_at' => $tiempo])){
                    //dump('asignado');
                }
                else {
                    $bol_f=false;
                    //dump('error no asignado');
                } 
            }
            
            if($bol_f){
                session()->flash('msg-success' ,'Grupo de Captura Actualizado');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se actualizó el Grupo de Captura - Intente nuevamente');
                return redirect()->back()->withInput();
            }

        }

        //quita todos los grupos
        if ($request->has("del_gr_all")){
            $datos = $request->except('_method','_token','del_gr_all');
            $bol_f=false;
            if($us->cat_grupos_capturas()->detach()){
                //dump('asignado');
                $bol_f=false;
            }
            if($bol_f){
                session()->flash('msg-success' ,'Grupos de Captura quitados');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se quitaron los Grupo de Captura - Intente nuevamente');
                return redirect()->back()->withInput();
            }
        }
        session()->flash('msg-warning' ,'No se actualizaron los datos - Intente nuevamente');
        return redirect()->route('admin.users.edit',$us);
    }

}  //fin de clase  //Users_system::save('user_id'= $user->id, );
