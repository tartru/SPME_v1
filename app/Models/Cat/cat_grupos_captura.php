<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cat\Cat_entidades_federativa;
use App\Models\User;

class Cat_grupos_captura extends Model {

    public $timestamps = true;
    protected $guarded = ['deleted'];
    
    public function Obtener() {
        return $this->all();
    }

    public function getId($id) {
        return $this->where('deleted',0)->where('active',1)->where('id',$id)->get();
    }

    public function getAllActives () {
        return Cat_grupos_captura::where('deleted',0)->where('active',1)->get();
    }

    //regresa registros activos id, nombre y siglas (array simple) 
    public function getBasicToSelect (){
        $arows=null;
        $rows=null;
        $arows=$this->orderBy('nombre', 'ASC')->select(['id','nombre'])->where('active',1)->where('deleted',0)->get();
        if($arows->count()){
            foreach($arows as $_hr => $_vr){
                $rows[$_vr['id']] = $_vr['nombre']; //$_vr['clave'].' - '.$_vr['nombre'];
            }
        }
        return $rows;
    }

    //Relacion polimorfica (Many-to-Many) Inversa con entidades federativas
    public function cat_entidades_federativas () {
        return $this->morphedByMany(Cat_entidades_federativa::class,'cat_grupable');
    }

    //Relacion polimorfica (Many-to-Many) Inversa con usuarios
    public function users () {
        return $this->morphedByMany(User::class,'cat_grupable');
    }
    
}
