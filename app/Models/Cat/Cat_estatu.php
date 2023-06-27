<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_estatu extends Model
{
    //protected $fillable=['valor','nombre','descripcion'];
    protected $guarded = ['deleted','active'];

    public function Obtener() {
        return Cat_estatu::all();
    }
}
