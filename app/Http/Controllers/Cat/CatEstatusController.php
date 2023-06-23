<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_estatu;
use Carbon\Carbon;


class CatEstatusController extends Controller
{
    protected $cat_estatus;
    
    public function __construct(Cat_estatu $cat_estatus) {
        $this->cat_estatus = $cat_estatus;
    }

    public function index(){
        
        $cat_estatus = $this->cat_estatus->Obtener();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.estatus.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Estatus' => route('admin.estatus.index')
            ],
            'rows'        => $cat_estatus
        ];


        return view('cat.EstatusList',$data);
    }

    public function store(){
        $title='AGREGAR REGISTRO A CATALOGO DE ESTATUS'; 
        //return 'llego controller';
        $row=new cat_estatu;
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.estatus.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Catálogo-Estatus' => route('admin.estatus.index'),
                'Crear' => route('admin.estatus.create'),
            ],
            'row' =>$row,
            'nuevo'    =>$title,
        ];
        //return $data;
        return view('cat.EstatusList',$data);
    }
    
    public function edit(cat_estatu $row){
        $title='EDITAR CATALOGO DE ESTATUS'; 
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.estatus.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Catálogo-Estatus' => route('admin.estatus.index'),
                'Editar' => route('admin.estatus.index'),
            ],
            'row'        => $row,
            'update'    =>$title,
        ];
        
        return view('cat.EstatusList',$data);
    }

    public function destroy(Cat_estatu $estatu) {
        $estatu->delete();
        return redirect()->route('admin.estatus.index');
  }

  public function update(request $request,cat_estatu $row){
    //return $request;
    $ruta='admin.estatus.edit';
    $registro = cat_estatu::findOrFail($row->id);
    
    if ($request->has("active")){
        $registro->active = $request->active;
        $registro->updated_at=Carbon::now();
        $msg = ($request->active === 0) ? 'Registro Desactivado' : 'Registro Activado';
        if($registro->save()){
            session()->flash('msg-success' ,$msg);
            return redirect()->route($ruta,$registro);
        }
        else{
            session()->flash('msg-warning' ,$msg);
            return redirect()->route($ruta,$registro)->with('message' ,"No se pudo relizar la acción - Verifique y reintente ");
        }
    }
    if ($request->has("update")){
        $form = $request->except('_method','_token','guardar','update');
        //return $form;
        if($registro->update($form)){
            session()->flash('msg-success' ,'Datos actualizados');
            return redirect()->route($ruta,$registro);
        }else {
            session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
            return redirect()->route($ruta,$registro);
        }
    }

    session()->flash('msg-warning' ,'Error - Verifique: '.$ruta);
    return redirect()->route($ruta,$registro);
}

    public function create (request $request){
        return $request;
        $ruta='admin.estatus.edit';
        $registro = $this->cat_estatus;
        $form = $request->except('_method','_token','guardar');
        //return $form;
        if($registro->save($form)){
            session()->flash('msg-success' ,'Datos Guardados');
            return redirect()->route($ruta,$registro);
        }else {
            session()->flash('msg-warning' ,'No se pudo guardar - Intente nuevamente');
            return redirect()->route($ruta,$registro);
        }
        

    }


}
