<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_grupos_captura;
use App\Models\Cat\Cat_entidades_federativa;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CatGruposCapturasController extends Controller
{
    protected $modelo,$entidades,$users;

    const r_index = 'admin.grupos_capturas.index';
    const r_create = 'admin.grupos_capturas.create';
    const r_edit =  'admin.grupos_capturas.edit';
    const r_update = 'admin.grupos_capturas.update';
    const view_list = 'admin.GruposCapturasList'; //return view('cat.GruposCapturasList');
    const view_edit = 'admin.GrupoCapturaEdit'; //return view('admin.GrupoCapturaEdit');
    const t_ = 'Grupos de Captura';
    const mm_ = 'Administrar';
    
    public function __construct(Cat_grupos_captura $cat_grupos_capuras,Cat_entidades_federativa $entidades, User $users) {
        $this->modelo = $cat_grupos_capuras;
        $this->entidades = $entidades;
        $this->users = $users;
    }

    //validaciones de formulario
    public function validation (request $request) {
        $request->validate([
            'nombre' => 'required|min:5|max:115|unique:cat_grupos_capturas',
        ]);
    }

    public function index(){
        
        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                self::mm_ => route('admin.index'), 
                'Grupos' => route(self::r_index),
            ],
            'rows'  => $this->modelo->getAllActives(),
        ];
        return view(self::view_list,$data);
    }


     //plantilla para editar registro
     public function edit(Cat_grupos_captura $row){         
       
        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                self::mm_ => route('admin.index'),
                self::t_ => route(self::r_index),
                'Editar' => route(self::r_index),
            ],
            'row'        => $row,
            'rows' => $this->entidades->getAllActives(),
            'rows_s' =>  $row->Cat_entidades_federativas,
            'update'=>'Editar '.self::t_,
            'rows2' => $this->users->getBasicToSelect(),
            'rows2_s' => $row->users()->select('users.id','users.full_name as nombre','users.active','users.deleted')->get(),
            // type = tipo de campo| tamaño | requerido | valor default| editable
            'headers' => [
                'id'        => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'nombre'      => ['txt'=>'Nombre','type'=>'varchar-110-si-no-si'],
                'active'      => ['txt'=>'Activo','type'=>'tint-1-20-1-no'],
                'deleted'      => ['txt'=>'Eliminado','type'=>'tint-1-no-0-no'],
                'created_at'      => ['txt'=>'Creado el','type'=>'timestamp-2-no-null-no'],
                'updated_at'      => ['txt'=>'Actualizado el','type'=>'timestamp-2-no-null-no'],
                'deleted_at'      => ['txt'=>'Eliminado el','type'=>'timestamp-2-no-null-no'],
                'activated_at'      => ['txt'=>'Reactivado el','type'=>'timestamp-2-no-null-no'],
            ],
            'atras'  => self::r_index,
        ];
        //return $data['rows2_s'];
        return view(self::view_edit,$data);
    }
        

    //plantilla para crear registro
    public function create(Cat_grupos_captura $row){
       
        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                self::mm_ => route('admin.index'),
                self::t_ => route(self::r_index),
                'Crear' => route(self::r_index),
            ],
            'row'        => $row,
            'nuevo'=> self::t_,
            // type = tipo de campo| tamaño | requerido | valor default| editable
            'headers' => [
                'id'        => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'nombre'      => ['txt'=>'Nombre','type'=>'varchar-110-si-no-si'],
                'active'      => ['txt'=>'Activo','type'=>'tint-1-20-1-no'],
                'delete'      => ['txt'=>'Eliminado','type'=>'tint-1-no-0-no'],
            ],
            'atras'  => self::r_index,
        ];
        return view(self::view_edit,$data);
    }
    

    //actualizar y guardar registro
    public function update(request $request,Cat_grupos_captura $row){
        $modelo = $row::findOrFail($row->id);

        //actualizar informacion del grupo
        if ($request->has("update")){
            $paso =$this->validation($request);
            if(empty($paso))
            
            $datos = $request->except('_method','_token','update');
  
            if($modelo->update($datos)){
                session()->flash('msg-success' ,'Datos actualizados');
                return redirect()->route(self::r_edit,$modelo);
            }else {
                session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
                return redirect()->back()->withInput();
            }
        }

        //activar/dessactivar grupo
        if ($request->has("active")){
            $modelo->active = $request->active;
            $tiempo=Carbon::now();
            $modelo->activated_at =$tiempo;
            $msg = ($request->active == 0) ? 'Registro Desactivado' : 'Registro Activado';
            if($modelo->save()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_edit,$modelo);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$modelo)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }

        //Agregar usuario al grupo
        if ($request->has("user")){
            $validator = Validator::make($request->all(), [
                'usuarios' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator); 
            }
            $datos = $request->except('_method','_token','user');
            if($modelo->users()->where('users.id',$datos)->exists()){
                return redirect()->back()->withErrors(['usuarios'=>'El usuario ya existe en el grupo']); // ya esta el usuario agregado
            }
            $tiempo=Carbon::now();
            $bol_f=true; //sin errores
            //return $request;
            if(!$modelo->users()->attach($datos,['created_at' => $tiempo])){
                //dump('quitado');
            }
            else {
                $bol_f=false;
                //dump('error no quitado');
            }
            $msg = ($bol_f) ? 'Usuario agregado' : 'No se pudo quitar usuario, Reintente';
            if($bol_f){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_edit,$modelo);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$modelo)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }

        //elimina usuarios del grupo
        if ($request->has("del_us")){
            $datos = $request->except('_method','_token');
            $bol_f=true; //sin errores
            //return $request;
            if($modelo->users()->detach([$datos])){
                //dump('quitado');
            }
            else {
                $bol_f=false;
                //dump('error no quitado');
            }
            $msg = ($bol_f) ? 'Usuario quidado del grupo de captura' : 'No se pudo quitar usuario, Reintente';
            if($bol_f){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_edit,$modelo);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$modelo)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }

        //agrega o elimina entidades al grupo
        if ($request->has("rows_a")){
            $rows_g =  $row->Cat_entidades_federativas;
            $var=array();
            //return $rows_g;
                foreach ($rows_g as $_hrs => $_vrs){
                    $var[$_vrs['id']]=$_vrs['id'];
                }
            //dump ($var);
            $datos = $request->except('_method','_token','rows_a');
            $bol_f=true; //sin errores
             $tiempo=Carbon::now();
                foreach ($datos as $_hd => $_vd) {
                    if (Str::contains($_hd,'-R')){
                        //dump('Entra '.$_hd);
                        if(Arr::exists($datos,Str::before($_hd,'-R'))) {
                            //dump('chek');
                            if(!Arr::exists($var,$_vd)){
                                //dump('se asignará: '.$_vd);
                                if(!$modelo->cat_entidades_federativas()->attach($_vd,['created_at' => $tiempo])){
                                    //dump('asignado');
                                }
                                else {
                                    $bol_f=false;
                                    //dump('error no asignado');
                                }
                            }
                        }
                        else {
                            if(Arr::exists($var,$_vd)){
                                //dump('se quitará: '.$_vd);
                                if($modelo->cat_entidades_federativas()->detach([$_vd])){
                                    //dump('quitado');
                                }
                                else {
                                    $bol_f=false;
                                    //dump('error no quitado');
                                }
                            }
                        }
                    }
                }
                //dump($bol_f); 
                //return $datos;
            
            if($bol_f){
                session()->flash('msg-success' ,'Grupo de Captura Actualizado');
                return redirect()->route(self::r_edit,$modelo);
            }else {
                session()->flash('msg-warning' ,'No se actualizó el Grupo de Captura - Intente nuevamente');
                return redirect()->back()->withInput();
            }

        }
        
        session()->flash('msg-warning' ,'Errores en funcion solicitada - Intente nuevamente');
        return redirect()->route(self::r_edit,$modelo);
    }

    //Guardar registro
    public function store (request $request,Cat_grupos_captura $row){
        $paso =$this->validation($request);
        $registro = $row::create($request->all());
        if(empty($paso)){
            if(isset($registro->id)){
                session()->flash('msg-success' ,'Datos Guardados');
                return redirect()->route(self::r_edit,$registro->id);
            }else {
                session()->flash('msg-warning' ,'No se pudo guardar - Intente nuevamente');
                return redirect()->back()->withInput();
            }
        }
        session()->flash('msg-warning' ,'Error detectados - Corrija e Intente nuevamente'); //no debe llegar
             return redirect()->back()->withInput();    
    }

   
    /** Eliminar virtualmente
     *  use Illuminate\Support\Carbon;
    */
   public function destroy(request $request, Cat_grupos_captura $row) {
    $registro = $this->modelo::findOrFail($row->id);
    
        if ($request->has("deleted")){
            $registro->deleted = $request->deleted;
            if(!empty($registro->deleted)){
                $registro->active=0;
            }
            $tiempo=Carbon::now();
            $registro->deleted_at =$tiempo;
            $msg = ($request->deleted == 1) ? 'Registro Eliminado' : 'Registro Restaurado';
            if($registro->save()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_edit,$registro);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$registro)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }
    return redirect()->route(self::r_index); //no debe llegar
    }
}


