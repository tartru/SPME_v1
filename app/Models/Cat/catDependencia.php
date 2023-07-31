<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catDependencia extends Model
{
    public $timestamps = true;

    public function getBasicToSelect (){
        $arows=null;
        $rows=null;
        $arows=catDependencia::orderBy('siglas', 'ASC')->select('id','siglas','nombre')->where('deleted',0)->get();
        if($arows->count()){
            foreach($arows as $_hr => $_vr){
                $rows[$_vr['id']] = $_vr['siglas'].' - '.$_vr['nombre'];
            }
        }
        return $rows;
    }
}
