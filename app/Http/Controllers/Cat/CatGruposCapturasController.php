<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_grupos_captura;

class CatGruposCapturasController extends Controller
{
    protected $cat_grupos_capuras;
    
    public function __construct(Cat_grupos_captura $cat_grupos_capuras) {
        $this->cat_grupos_capuras = $cat_grupos_capuras;

    }

    public function index(){

        $cat_grupos_capuras = $this->cat_grupos_capuras->All();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_grupos_captura',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Grupos' => route('admin_grupos_captura')
            ],
            'rows'        => $cat_grupos_capuras
        ];


        return view('cat.GruposCapturasList',$data);
    }
}


