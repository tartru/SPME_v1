<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Cat_System extends Model
{
    public function Obtener() {
        return Cat_System::all();
    }

    public function ObtenerSystemPorId($id) {
        return Cat_System::find($id);
    }

    public function user() {
        return $this->belongsTo(User::class); // Fkey = nombre de metodo + id Pkey=> regresa * entidadesfederativas con objeto region que le pertenece;
    }
}
