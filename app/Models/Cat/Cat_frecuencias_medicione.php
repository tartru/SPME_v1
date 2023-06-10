<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_frecuencias_medicione extends Model
{
    public function Obtener() {
        return Cat_frecuencias_medicione::all();
    }

    public function ObteneFrecuenciasPorId($id) {
        return Cat_frecuencias_medicione::find($id);
    }
}
