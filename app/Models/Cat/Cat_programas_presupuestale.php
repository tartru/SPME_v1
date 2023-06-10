<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_programas_presupuestale extends Model
{
    public function Obtener() {
        return Cat_programas_presupuestale::all();
    }

    public function ObteneOrigenesPPorId($id) {
        return Cat_programas_presupuestale::find($id);
    }
}
