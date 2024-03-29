<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_accione;

class CatAccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cat_acciones;
    
    public function __construct(Cat_accione $cat_acciones) {
        $this->cat_acciones = $cat_acciones;
    }

    public function index(){
        $cat_acciones = $this->cat_acciones->Obtener();
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_acciones',
            'breadcrumb'  => ['Administrar' => route('admin_index'), 'Acciones' => route('admin_acciones')
        ],
            'rows'        => $cat_acciones,
        ];


        return view('cat/AccionesList',$data);
    }

}
