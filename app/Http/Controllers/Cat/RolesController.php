<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Cat\Cat_system;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class RolesController extends Controller
{
    protected $roles;
    protected $systems;
    protected $modelo;
    const r_index = 'admin.roles.index';
    const r_create = 'admin.roles.create';
    const r_edit =  'admin.roles.edit'; //redorect view(admin.roles.edit);
    const r_update = 'admin.roles.update';
    const vista = 'admin.RolesList';
    const t_ = 'Roles';
    const mm_ = 'Administrar';

    public function __construct(Role $roles,Cat_system $systems) {
        $this->roles = $roles;
        $this->systems = $systems;
    }

    //validaciones de formulario
    public function validation (request $request) {
        $request->validate([
            'name' => 'required|min:5|max:50|unique:roles',
            'descripcion' => 'required|min:1|max:200',
            'nivel' => 'required|numeric|max:50',
        ]);
    }


    public function index(){
        //regresa solo los sistemas a los que se le dio permiso
        $user_sys= $this->systems->getByUser(Auth::user()->id);
        //return $user_sys;
        //regresa solo los roles a los que tiene permiso listar
    
        $qry = 'select roles.*, cat_systems.siglas FROM roles JOIN cat_systems ON roles.nivel = cat_systems.id ';
        $bol=false;
        foreach ($user_sys as $_h =>$_v){
            $tx=strtolower($_v['siglas']).'.admin.roles.index';
            if($this->middleware($tx)||$this->hasRole('spme.admin')){
                if (!$bol){
                    $qry.=' WHERE ';
                    $bol=true;
                }
                else
                    $qry.=' OR';
                $qry.=" roles.nivel = ".$_v['sys_id']. ' AND cat_systems.active = 1 AND cat_systems.deleted = 0';
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.update';
            if($this->middleware($tx)||$this->hasRole('spme.admin')){
                $permisos[$_v['sys_id']]['update']='admin.roles.update';
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.delete';
            if($this->middleware($tx)||$this->hasRole('spme.admin')){
                $permisos[$_v['sys_id']]['delete']='admin.roles.delete';
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.create';
            if($this->middleware($tx)||$this->hasRole('spme.admin')){
                $permisos[$_v['sys_id']]['create']='admin.roles.create';     
            }
        }
        $qry.=' ORDER BY roles.nivel';
    
        $user_sys_rol=DB::select($qry);
   
        if(empty($permisos))
        $permisos=0;
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.roles.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.roles.index'), 
                'Roles' => route('admin.roles.index'),
            ],
            'rows'          => $user_sys_rol,
            'permisos'   =>$permisos,
            'sistemas'   =>$user_sys,

        ];
        return view('admin.RolesList',$data);
    }

    //Muestra formulario para editar
    public function edit(Role $row){   
        $user_sys= $this->systems->getByUser(Auth::user()->id);
        if(isset($user_sys)) {
            foreach ($user_sys as $value => $val) {
            $sistemas[$val->sys_id] = $val->siglas;
            }
        }
        //regresa solo los roles a los que tiene permiso listar
        $qry = 'select permissions.*, cat_systems.siglas FROM permissions JOIN cat_systems ON permissions.nivel = cat_systems.id';
        foreach ($user_sys as $_h =>$_v){
            $tx=strtolower($_v['siglas']).'.admin.roles.index';
            if($this->middleware($tx)){
                if (array_key_first(array ($user_sys))==$_h)
                $qry.=' where';
                else
                $qry.=' or';
                $qry.=" permissions.nivel = ".$_v['sys_id'];
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.update';
            if($this->middleware($tx)){
                $permisos[$_v['sys_id']]['update']='admin.roles.update';
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.delete';
            if($this->middleware($tx)){
                $permisos[$_v['sys_id']]['delete']='admin.roles.delete';
            }
            $tx=strtolower($_v['siglas']).'.admin.roles.create';
            if($this->middleware($tx)){
                $permisos[$_v['sys_id']]['create']='admin.roles.create';     
            }
        }
        $qry.=' ORDER BY permissions.nivel';
        $user_sys_per=DB::select($qry);

        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.roles.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Roles' => route('admin.roles.index'),
                'Editar' => route('admin.roles.index'),
            ],
            'row'        => $row,
            'permissions'=>$permisos,
            'nivel'   =>$sistemas,
            'update'=>'rol',
            // type = tipo de campo| tamaño | requerido | valor default| editable
            'headers' => [
                'id'     => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'name'   => ['txt'=>'Nombre','type'=>'varchar-125-no-no-si'],
                'descripcion'  => ['txt'=>'Descripción','type'=>'varchar-125-si-null-si'],
                'nivel'  => ['txt'=>'Sistema','type'=>'select-2-si-0-si'],
                'guard_name' => ['txt'=>'Guard Name','type'=>'varchar-50-si-null-no'],
                'created_at' => ['txt'=>'Creado','type'=>'timestamp-3-si-now-no'],
                'updated_at' => ['txt'=>'Actualizado','type'=>'timestamp-3-si-now-no'],
            ],
            'atras'  => 'admin.roles.index',
            'permisos'  => $user_sys_per,
            
        ];
        
        return view('admin.RolesEdit',$data);
    }

    //Muestra formulario para editar
    public function create(Role $row){ 
        if(!isset($row)){
            $row=$this->roles;
        }
        $user_sys= $this->systems->getByUser(Auth::user()->id);
        if(isset($user_sys)) {
            foreach ($user_sys as $value => $val) {
            $sistemas[$val->sys_id] = $val->siglas;
            }
        }
       $permisos['create']='admin.roles.create';     

        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.roles.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Roles' => route('admin.roles.index'),
                'Crear' => route('admin.roles.index'),
            ],
            'row'        => $row,
            'permissions'=>$permisos,
            'nivel'   =>$sistemas,
            'nuevo'=>'nuevo Rol',
            // type = tipo de campo| tamaño | requerido | valor default| editable
            'headers' => [
                'id'     => ['txt'=>'ID','type'=>'tint-1-no-auto-no'],
                'name'   => ['txt'=>'Nombre','type'=>'varchar-125-no-no-si'],
                'descripcion'  => ['txt'=>'Descripción','type'=>'varchar-125-si-null-si'],
                'nivel'  => ['txt'=>'Sistema','type'=>'select-2-si-0-si'],
                'guard_name' => ['txt'=>'Guard Name','type'=>'varchar-50-si-null-no'],
                'created_at' => ['txt'=>'Creado','type'=>'timestamp-3-si-now-no'],
                'updated_at' => ['txt'=>'Actualizado','type'=>'timestamp-3-si-now-no'],
            ],
            'atras'  => 'admin.roles.index',
            
        ];
        
        return view('admin.RolesEdit',$data);
    }

    //actualizar y guardar registro
    public function update(request $request,Role $row){
        $rol = Role::findOrFail($row->id);

        if ($request->has("update")){
            $paso =$this->validation($request);
            if(empty($paso))
            
            $datos = $request->except('_method','_token','update');
  
            if($rol->update($datos)){
                session()->flash('msg-success' ,'Datos actualizados');
                return redirect()->route('admin.roles.edit',$rol);
            }else {
                session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
                return redirect()->back()->withInput();
            }
        }

        if ($request->has("permisos")){
            $datos = $request->except('_method','_token','permisos');
            $bol_f=true; //sin errores
                foreach ($datos as $_hd => $_vd) {
                    if (Str::contains($_hd,'-R')){
                        //dump($_hd);
                        if(Arr::exists($datos,Str::before($_hd,'-R'))) {
                            //dump('chek');
                            if(!$rol->hasPermissionTo($_vd)){
                                //dump('se asignará');
                                if(!$rol->givePermissionTo($_vd))
                                $bol_f=false;
                            }
                        }
                        else {
                            if($rol->hasPermissionTo($_vd)){
                                //dump('se quitará');
                                if(!$rol->revokePermissionTo($_vd))
                                $bol_f=false;
                            }
                        }
                    }
                }
                //dump($bol_f); 
                //return $datos;
            
            if($bol_f){
                session()->flash('msg-success' ,'Rol actualizado');
                return redirect()->route('admin.roles.edit',$rol);
            }else {
                session()->flash('msg-warning' ,'No se actualizó el rol - Intente nuevamente');
                return redirect()->back()->withInput();
            }

        }
        session()->flash('msg-warning' ,'Errores en rol - Intente nuevamente');
        return redirect()->route('admin.roles.edit',$rol);
    }

    //Guardar registro
    public function store (request $request,Role $row){
        $paso =$this->validation($request);
        //$registro = $row::create($request->all());
        $registro = Role::create(['name' => $request->name, 'descripcion' => $request->descripcion, 'nivel' => $request->nivel]);
        if(empty($paso)){
            if(isset($registro->id)){
                session()->flash('msg-success' ,'Datos Guardados');
                return redirect()->route(self::r_edit,$registro->id);
            }else {
                session()->flash('msg-warning' ,'No se pudo guardar - Intente nuevamente');
                return redirect()->back()->withInput();
            }
        }
        session()->flash('msg-warning' ,'Error detectados - Corrija e ntente nuevamente'); //no debe llegar
             return redirect()->back()->withInput();    
    }

    //Eliminar virtualmente
    public function destroy(request $request, Role $row) {
        $registro = Role::findOrFail($row->id);
           
            $msg = (!empty($registro)) ? 'Registro Eliminado' : 'Registro no encontrado';
            if($registro->delete()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_index);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$registro)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
    
        return redirect()->route(self::r_index); //no debe llegar
    }


} //fin de clase
