<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_estatu extends Model
{
    public function Obtener() {
        return Cat_estatu::all();
    }
}
