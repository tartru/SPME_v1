<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_accione extends Model
{
    protected $guarded = ['deleted','active'];
    
    public function Obtener() {
        return Cat_accione::all();
    }

    public function ObteneRegionesPorId($id) {
        return Cat_accione::find($id);
    }

}
