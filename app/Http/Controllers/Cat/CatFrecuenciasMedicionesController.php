<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_frecuencias_medicione;

class CatFrecuenciasMedicionesController extends Controller
{
    protected $cat_frecuencias_mediciones;
    
    public function __construct(Cat_frecuencias_medicione $cat_frecuencias_mediciones) {
        $this->cat_frecuencias_mediciones = $cat_frecuencias_mediciones;
    }

    public function index(){
        
        $cat_frecuencias_mediciones = $this->cat_frecuencias_mediciones->Obtener();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.frecuencias_mediciones',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Estatus' => route('admin.frecuencias_mediciones')
            ],
            'rows'        => $cat_frecuencias_mediciones
        ];


        return view('cat.FrecuenciasMedicionesList',$data);
    }
}
