<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cat_tipo_captura extends Model
{
    public function Obtener() {
        return Cat_tipo_captura::all();
    }
    
}
