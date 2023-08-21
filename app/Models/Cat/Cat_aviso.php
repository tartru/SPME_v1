<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Cat_aviso extends Model
{
    public $timestamps = true;
    protected $guarded = ['deleted'];

    
    //Relavion hasMany inversa
    public function User() {
        return $this->belongsTo(User::class); // Fkey = nombre de metodo + id Pkey => regresa * aviso ligados a usuario;
    }

    public function createAviso(User $row,$link) {
        return true;
    }

}

