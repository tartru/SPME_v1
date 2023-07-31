<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_entidades_federativa;
use App\Models\Cat\Cat_regione;
use App\Models\Cat\Cat_municipio;

class CatEntidadesFederativasController extends Controller
{
    protected $cat_entidades_federativas;
    
    public function __construct(Cat_entidades_federativa $cat_entidades_federativas) {
        $this->cat_entidades_federativas = $cat_entidades_federativas;
    }

    public function index(){
        $rows = Cat_entidades_federativa::select(['nombre'])->get();
        return $rows;
    }

    public function agrupado() {                   
                
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.entidades_federativas',
                'breadcrumb'    => [
                    'Administrar' => route('admin.index'), 
                    'Entidades federativas' => route('admin.entidades_federativas')
                ],
                'rows'        => $this->cat_entidades_federativas->ObteterEstadosyNumMunicipios(),
                'catalogos'   => [
                    'regiones'  => Cat_regione::select(['nombre'])->where('deleted',0)->get(),
                    'entidades' => Cat_entidades_federativa::select(['nombre'])->where('deleted',0)->get(),
                ],
            ];
                
        //return ($data);
        //return view('Pat.index',compact('data')); //como objeto
        return view('Cat.EntidadesList',$data);
    }

    public function prueba() {
    //$data=$this->cat_entidades_federativas->cat_entidades_federativas()->get();
    //$data=Cat_entidades_federativa::with('cat_regione')->get(); //ok
    $data=Cat_entidades_federativa::with('cat_municipios')->get(); //ok
    //$data=Cat_regione::with('cat_entidades_federativas')->get(); //ok
    //$data=Cat_municipio::with('cat_entidades_federativa')->select('id','nombre','cat_entidades_federativa_id')->get(); //ok
    return $data;
    }
}
