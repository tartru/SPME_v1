<?php

namespace App\Models\Asm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asmRecomendacione extends Model
{
    public function ficha()
    {
        return $this->belongsTo('App\Models\Asm\asmFicha');
    }
}
