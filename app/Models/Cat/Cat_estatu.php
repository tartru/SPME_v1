<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_estatu extends Model
{
    //protected $fillable=['name','description','value];
    protected $guarded=['active','deleted'];

    public function Obtener() {
        return Cat_estatu::all();
    }
}
