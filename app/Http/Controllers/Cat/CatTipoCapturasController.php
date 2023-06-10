<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Cat\Cat_tipo_captura;

class CatTipoCapturasController extends Controller
{
    protected $cat_tipo_capturas;
    
    public function __construct(Cat_tipo_captura $cat_tipo_capturas) {
        $this->cat_tipo_capturas = $cat_tipo_capturas;
    }

    public function index(){
        
        $cat_tipo_capturas = $this->cat_tipo_capturas->Obtener();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_tipo_capturas',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Tipos de captura' => route('admin_tipo_capturas'),
            ],
            'rows'        => $cat_tipo_capturas,
        ];


        return view('cat.TipoCapturasList',$data);
    }
}
