<?php

namespace App\Models\Cat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Cat\Cat_grupos_captura;
use App\Models\User;

class Cat_entidades_federativa extends Model {

    public $timestamps = true;
    protected $guarded = ['deleted'];
    
    public function Obtener() {
        return Cat_entidades_federativa::all();
    }

    public function getAllActives () {
        return $this->where('deleted',0)->get();
    }

    //regresa registros activos id, nombre y siglas (array simple) 
    public function getBasicToSelect (){
        $arows=null;
        $rows=null;
        $arows=$this->orderBy('nombre', 'ASC')->select(['id','nombre'])->where('deleted',0)->get();
        if($arows->count()){
            foreach($arows as $_hr => $_vr){
                $rows[$_vr['id']] = $_vr['nombre'];
            }
        }
        return $rows;
    }

    public function ObteneEntidadesFederativaPorId($id) {
        return Cat_entidades_federativa::find($id);
    }

    public function ObteterEstadosyNumMunicipios (){ //configurarlo con modelos
        $tabla = DB::table('cat_entidades_federativas')
        ->select(DB::raw('cat_entidades_federativas.cve_entidad AS CVE_ENTIDAD,
        cat_entidades_federativas.nombre AS nombre, 
        cat_entidades_federativas.abreviacion AS abreviacion, 
        cat_regiones.nombre AS region, count(cat_entidades_federativas.nombre) as cant_municipios'))
        ->join('cat_regiones', 'cat_regiones.id', '=', 'cat_entidades_federativas.cat_regione_id')
        ->join('cat_municipios', 'cat_entidades_federativas.id', '=', 'cat_municipios.cat_entidades_federativa_id')
        ->groupBy('cat_entidades_federativas.cve_entidad')
        ->get();
        return $tabla;
    }


    public function cat_regione() {
        return $this->belongsTo(Cat_regione::class); // Fkey = nombre de metodo + id Pkey=> regresa * entidadesfederativas con objeto region que le pertenece;
    }

    
    public function cat_municipios(){
        return $this->hasMany(cat_municipio::class); //regresa * estados con objetos de sus municipios correspondientes
    } 


    //relacion (Many-to-Many) polimorfica con Grupos captura
    public function cat_grupos_capturas () {
        return $this->morphToMany(Cat_grupos_captura::class,'cat_grupable');
    }

    
    //Relacion polimorfica (Many-to-Many) Inversa con usuarios
    public function users () {
        return $this->morphedByMany(User::class,'cat_entidable');
    }
     

}
