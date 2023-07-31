<?php

namespace App\Models\asm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class asm_ficha extends Model
{

    protected $guarded = ['deleted'];

    public function getJoinsNames () {
        $arows=asm_ficha::select('asm_fichas.id','asm_fichas.nombre','asm_fichas.descripcion','asm_fichas.fecha_inicial','asm_fichas.fecha_final','cat_programas_presupuestales.clave as programa','cat_dependencias.siglas as dependencia','cat_estatus.nombre as estatus')
        ->leftjoin('cat_programas_presupuestales','asm_fichas.cat_programas_presupuestale_id','=','cat_programas_presupuestales.id')
        ->leftjoin('cat_dependencias','asm_fichas.cat_dependencia_id','=','cat_dependencias.id')
        ->leftjoin('cat_estatus','asm_fichas.cat_estatu_id','=','cat_estatus.id')
        ->where ('asm_fichas.deleted',0)
        ->orderBy('asm_fichas.created_at', 'desc')
        ->get();
        return $arows;

    }
     
    public function getAniosInit() {
        $arows = DB::table('asm_fichas')
        ->selectRaw('DISTINCT YEAR(fecha_inicial) AS anios')
        ->orderBy('fecha_inicial', 'asc')
        ->get()
        ->pluck('anios');

        return $arows;

    }

    public function getAniosFin() {
        $arows = DB::table('asm_fichas')
        ->selectRaw('DISTINCT YEAR(fecha_final) AS anios')
        ->orderBy('fecha_final', 'asc')
        ->get()
        ->pluck('anios');

        return $arows;

    }

    public function asm_recomendaciones()
    {
        return $this->hasMany('App\Models\Asm\asmRecomendacione');
    }
}
