<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cat_municipio extends Model {
    
    public function Obtener() {
        return Cat_municipio::all();
    }

    public function ObtenerMunicipioPorId($id) {
        return Cat_municipio::find($id);
    }

    public function ObteterMunicipiosyRegionyEstado (){
        $tabla = DB::table('cat_municipios')
        ->select(DB::raw('cat_municipios.cve_ent_mun AS CVE_ENT_MUN, cat_municipios.cve_mun AS CVE_MUN, cat_municipios.nombre AS nombre, cat_entidades_federativas.nombre as entidad, cat_regiones.nombre AS region'))
        //->where('cat_entidades_federativa_id',1)
        ->join('cat_entidades_federativas', 'cat_municipios.cat_entidades_federativa_id', '=', 'cat_entidades_federativas.id')
        ->join('cat_regiones', 'cat_entidades_federativas.cat_regione_id', '=', 'cat_regiones.id')
        ->orderBy('cat_municipios.nombre')
        ->get();
        return $tabla;
    }

    public function cat_entidades_federativa() {
        return $this->belongsTo(Cat_entidades_federativa::class); // regresa * municipios y con objeto el edo que le pertenece;
    }
}