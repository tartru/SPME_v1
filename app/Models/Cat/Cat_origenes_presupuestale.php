<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cat_origenes_presupuestale extends Model
{
    public function Obtener() {
        return Cat_origenes_presupuestale::all();
    }

    public function ObteneOrigenesPPorId($id) {
        return Cat_origenes_presupuestale::find($id);
    }

    public function ObteterOrigenes (){ // no configurado
       
        return "Sin Configuar";
    }
}