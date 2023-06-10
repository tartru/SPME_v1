<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_origenes_presupuestale;


class CatOrigenesPresupuestalesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cat_origenes_presupuestales;
    
    public function __construct(Cat_origenes_presupuestale $cat_origenes_presupuestales) {
        $this->cat_origenes_presupuestales = $cat_origenes_presupuestales;
    }

    public function index(){
        $cat_origenes_presupuestales = $this->cat_origenes_presupuestales->All();
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_origenes_presupuestales',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Orígenes presupuestales' => route('admin_origenes_presupuestales'),
            ],
            'rows'        => $cat_origenes_presupuestales,
        ];
      
        return view('cat.OrigenesPresupuestalesList',$data);
        //return $data;
    }

}