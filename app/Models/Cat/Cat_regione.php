<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function PHPUnit\Framework\returnSelf;

class Cat_regione extends Model {
    //protected $table = "cat_regions";
    //protected $fillable = ['nombre', 'deleted', 'edad', 'direccion'];
    //protected $hidden = ['id'];
    //$cat_region =Cat_region::where ('deleted',0)
    //->orderBy('nombre')
    //->get();

    public function Obtener() {
        return Cat_regione::all();
    }

    public function ObtenerRegionesPorId($id) {
        return Cat_regione::find($id);
    }

    // Municipios y estados
    public function ObteterRegionesyNumEstados (){
        $tabla = DB::table('cat_regiones')
        ->select(DB::raw('cat_regiones.nombre AS nombre, count(cat_entidades_federativas.nombre) as cant_entidades'))
        ->join('cat_entidades_federativas', 'cat_regiones.id', '=', 'cat_entidades_federativas.cat_regione_id')
        ->groupBy('cat_regiones.nombre')
        ->get();
        return $tabla;
    }

    // Relacion uno a muchos con Cat_entidades_federativa
        public function cat_entidades_federativas(){
            return $this->hasMany(cat_entidades_federativa::class); //regresa * regiones con objetos de sus entidades correspondientes
        }
    // Relacion uno a muchos con Cat_entidades_federativa

    
}
