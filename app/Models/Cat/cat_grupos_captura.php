<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_grupos_captura extends Model
{
    public function Obtener() {
        return Cat_grupos_captura::all();
    }

    public function ObteneGrupoCapturaPorId($id) {
        return Cat_grupos_captura::find($id);
    }
}
