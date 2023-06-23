<?php

namespace App\Http\Controllers\Pat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class PatController extends Controller
{
      public function index()
    {
        $tabla = DB::table('cat_acciones')->get();
        return view('Pat.index',Compact('tabla'));
    }

    public function estados()
    {
    $tabla = DB::table('cat_entidades_federativas')
            ->select(DB::raw('cat_entidades_federativas.cve_entidad AS CVE_ENTIDAD,
            cat_entidades_federativas.nombre AS nombre, 
            cat_entidades_federativas.abreviacion AS abreviacion, 
            cat_regiones.nombre AS region, count(cat_entidades_federativas.nombre) as cant_municipios'))
            ->join('cat_regiones', 'cat_regiones.id', '=', 'cat_entidades_federativas.cat_regione_id')
            ->join('cat_municipios', 'cat_entidades_federativas.id', '=', 'cat_municipios.cat_entidades_federativa_id')
            ->groupBy('cat_entidades_federativas.cve_entidad');
           
    $regiones = DB::table('cat_regions')
            ->select(DB::raw('id,nombre'))
            ->groupBy('nombre');

    $entidades = DB::table('cat_entidades_federativas')
            ->select(DB::raw('id,nombre'))
            ->groupBy('nombre');

    
            $data = [
                'menu_active'   => 'admin.entidades_federativas',
                'breadcrumb'    => ['Administrar' => route('admin.index'), 'Entidades federativas' => route('admin.entidades_federativas')],
                'rows'        => $tabla->get(),
                'catalogos'   => [
                    'regiones'  => $regiones->get(),
                    'entidades' => $entidades->get(),
                ],
            ];
            
            //return ($data);
            //return view('Pat.index',compact('data')); //como objeto
            return view('Pat.index',$data);
    }
  
}