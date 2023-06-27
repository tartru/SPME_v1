<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_estatu;
use Illuminate\Support\Carbon;

class CatEstatusController extends Controller
{
    protected $modelo;
    const r_index = 'admin.estatus.index';
    const r_create = 'admin.estatus.create';
    const r_edit =  'admin.estatus.edit';
    const r_update = 'admin.estatus.update';
    const vista = 'cat.EstatusList';
    const t_nuevo = 'AGREGAR REGISTRO A CATALOGO DE ESTATUS'; 
    const t_update ='EDITAR CATALOGO DE ESTATUS'; 
    
    public function __construct(Cat_estatu $cat_estatus) {
        $this->modelo = $cat_estatus;
    }

    //validaciones de formulario
    public function validation (request $request) {
        $request->validate([
            'valor' => 'required|numeric|max:125',
            'nombre' => 'required|min:1|max:40',
            'descripcion' => 'required|min:1|max:200',
        ]);
    }

    //listado de registros
    public function index(){
        $rows = $this->modelo->all();
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Estatus' => route(self::r_index),
            ],
            'rows'        => $rows
        ];


        return view(self::vista,$data);
    }

    //Formulario para editar/crear un registro
    public function create(){
        //return $row;
        if(!isset($row)){
            $row=new cat_estatu;
        }
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Catálogo-Estatus' => route(self::r_index),
                'Crear' => route(self::r_create),
            ],
            'row' =>$row,
            'nuevo'    => self::t_nuevo,
        ];
        //return $data;
        return view(self::vista,$data);
    }
    
    //Formulario para editar/crear un registro
    public function edit(cat_estatu $row){
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => self::r_index,
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Catálogo-Estatus' => route(self::r_index),
                'Editar' => route(self::r_index),
            ],
            'row'        => $row,
            'update'    => self::t_update,
        ];
        
        return view(self::vista,$data);
    }

    //Eliminar fisicamente
    public function destroy(request $request, Cat_estatu $row) {
        $registro = cat_estatu::findOrFail($row->id);
        
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
    public function update(request $request,Cat_estatu $row){

        $registro = cat_estatu::findOrFail($row->id);
        
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
    public function store (request $request,Cat_estatu $row){
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
