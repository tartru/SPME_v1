<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_programas_presupuestale;

class CatProgramasPresupuestalesController extends Controller
{
    protected $cat_programas_presupuestales;
    
    public function __construct(Cat_programas_presupuestale $cat_programas_presupuestales) {
        $this->cat_programas_presupuestales = $cat_programas_presupuestales;
    }
    
    public function index(){
        $cat_programas_presupuestales = $this->cat_programas_presupuestales->All();
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_programas_presupuestales',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Prog. Presupuestales' => route('admin_programas_presupuestales'),
            ],
            'rows'        => $cat_programas_presupuestales,
        ];
        return view('Cat/ProgramasPresupuestalesList',$data);
    }
}
