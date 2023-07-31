<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_programas_presupuestale extends Model
{
    public $timestamps = true;

    public function Obtener() {
        return Cat_programas_presupuestale::all();
    }

    public function ObteneOrigenesPPorId($id) {
        return Cat_programas_presupuestale::find($id);
    }

    public function getBasicToSelect (){
        $arows=null;
        $rows=null;
        $arows=Cat_programas_presupuestale::orderBy('clave', 'ASC')->select(['id','clave','nombre'])->where('active',1)->where('deleted',0)->get();
        if($arows->count()){
            foreach($arows as $_hr => $_vr){
                $rows[$_vr['id']] = $_vr['clave'].' - '.$_vr['nombre'];
            }
        }
        return $rows;
    }

}
