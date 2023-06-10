<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_estatu;

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
            'submenu_active' => 'admin_estatus',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Estatus' => route('admin_estatus')
            ],
            'rows'        => $cat_estatus
        ];


        return view('cat.EstatusList',$data);
    }
}
