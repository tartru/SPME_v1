<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_municipio;
use App\Models\Cat\Cat_entidades_federativa;
use App\Models\Cat\Cat_regione;

class CatMunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cat_municipios;
    
    public function __construct(Cat_municipio $cat_municipios) {
        $this->cat_municipios = $cat_municipios;
    }
    
    public function index(){
        $cat_municipios = $this->cat_municipios->Obtener();

        //regiones
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.municipios',
            'breadcrumb'  => ['Administrar' => route('admin.index'), 'Regiones' => route('admin.municipios')],
            'rows'        => $cat_municipios,
        ];
        return view('Cat\MunicipiosList',$data);
    }

    public function agrupado(){
                 
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.municipios',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Municipios' => route('admin.municipios'),
            ],
            'rows'        => $this->cat_municipios->ObteterMunicipiosyRegionyEstado(),
            'catalogos'   => [
                'regiones'  => Cat_regione::select(['id', 'nombre'])->where('deleted',0)->get(),
                'entidades' => Cat_entidades_federativa::select(['id', 'nombre','cat_regione_id'])->where('deleted',0)->get(),
            ],
        ];

        //return $data;
       return view('Cat.MunicipiosList',$data);
    }

    public function CatMunicipiId(){
        $cat_municipios = $this->cat_municipios->cat_entidades_federativa();

        //regiones
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.municipios',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Regiones' => route('admin.municipios'),
            ],
            'rows'        => $cat_municipios,
        ];
        return view('Cat.MunicipiosList',$data);
        //return $cat_municipios;
    }
}
