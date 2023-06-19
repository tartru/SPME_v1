<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cat_system extends Model
{
    public function Obtener() {
        return Cat_system::all();
    }

    public function ObtenerSystemPorId($id) {
        return Cat_system::find($id);
    }

    public function user() {
        return $this->belongsTo(User::class); // Fkey = nombre de metodo + id Pkey=> regresa * entidadesfederativas con objeto region que le pertenece;
    }
}

