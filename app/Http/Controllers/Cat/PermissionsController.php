<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Carbon;
use App\Models\Cat\Cat_system;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    protected $modelo;
    const r_index = 'admin.permisos.index';
    const r_create = 'admin.permisos.create';
    const r_edit =  'admin.permisos.edit';
    const r_update = 'admin.permisos.update';
    const vista = 'cat.PermissionsList'; //return view('cat.PermissionsList');
    const t_ = 'Permisos';
    const mm_ = 'Administrar';
      
    public function __construct(Permission $modelo) {
        $this->modelo = $modelo;
    }

    //validaciones de formulario
    public function validation (request $request) {
        $request->validate([
            'name' => 'required|unique:permissions|min:5|max:50',
            'descripcion' => 'required|min:1|max:200',
            'nivel' => 'required|numeric|max:50',
        ]);
    }

    //listado de registros
    public function index(){
        $sistemas = Cat_system::select('id','siglas')->where('active',1)->get();
        $rows= DB::table('permissions')
        ->join('cat_systems','permissions.nivel','=','cat_systems.id')
        ->select('permissions.id','permissions.name','permissions.guard_name','permissions.descripcion','permissions.id','permissions.nivel','cat_systems.siglas')
        ->get();

        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                ucwords(self::t_) => self::r_index,
        ],
            'rows'        => (object) $rows,
            'sistemas'        => $sistemas,
        ];
        return view(self::vista,$data);
    }

    //Formulario para editar/crear un registro
    public function create(){
        $sistemas = Cat_system::select('id','siglas')->where('active',1)->get();
        if(!isset($row)){
            $row=$this->modelo;
        }
        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                ucwords(self::t_) => route(self::r_index),
                'Crear' => route(self::r_create),
            ],
            'row' =>$row,
            'nuevo'    =>strtoupper(self::t_),
            'sistemas'        => $sistemas,
        ];
        return view(self::vista,$data);
    }
    
    //Formulario para editar/crear un registro
    public function edit(Permission $row){
        $sistemas = Cat_system::select('id','siglas')->where('active',1)->get();
        $data = [
            'menu_active' => self::mm_,
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                self::mm_ => route('admin.index'), 
                ucwords(self::t_) => route(self::r_index),
                'Editar' => route(self::r_index),
            ],
            'row'        => $row,
            'update'    =>strtoupper(self::t_),
            'sistemas'        => $sistemas,
        ];
        return view(self::vista,$data);
    }

    //Eliminar virtualmente
   public function destroy(request $request, Permission $row) {
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

    //Actualizar y desactivar un registro
    public function update(request $request,Permission $row){
        
        $registro = $this->modelo::findOrFail($row->id);
        
        if ($request->has("active")){
            $registro->active = $request->active;
            $tiempo=Carbon::now();
            $registro->activated_at =$tiempo;
            $msg = ($request->active === 0) ? 'Registro Desactivado' : 'Registro Activado';
            if($registro->save()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route(self::r_edit,$registro);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route(self::r_edit,$registro)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
            }
        }
        if ($request->has("update")){
            $paso =$this->validation($request);
            if(empty($paso)){
                $form = $request->except('_method','_token','update');
                if($registro->update($form)){
                    session()->flash('msg-success' ,'Datos actualizados');
                    return redirect()->route(self::r_edit,$registro);
                }
                else {
                    session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
                    return redirect()->route(self::r_edit,$registro);
                }
            }
            session()->flash('msg-warning' ,'Error - Verifique: '.self::r_update);
            return redirect()->route(self::r_edit,$registro);
        }
    }

    //Guardar registro
    public function store (request $request,Permission $row){
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
        session()->flash('msg-warning' ,'Error detectados - Corrija e ntente nuevamente'); //no debe llegar
             return redirect()->back()->withInput();    
    }

}
