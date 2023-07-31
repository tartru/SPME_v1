<?php

namespace App\Http\Controllers\Asm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asm\asmRecomendacione;

class asmRecomendacionesController extends Controller
{
    protected $modelo;
    const r_index = 'admin.acciones.index';
    const r_create = 'admin.acciones.create';
    const r_edit =  'admin.acciones.edit';
    const r_update = 'admin.acciones.update';
    const vista = 'cat.AccionesList'; //return view('cat.AccionesList')
    const t_ = 'Monitoreo';
    const mm_ = 'Administrar';

    public function recomendaciones(){
        $data = [
            'menu_active' => ucwords(self::t_),
            'submenu_active' => 'asm.recomendaciones.index',
            'breadcrumb'  => [
                ucwords(self::t_) => route('asm.recomendaciones.index'),
                'A.S.M.' => route('asm.recomendaciones.index'),
                'Recomendaciones' => route('asm.recomendaciones.index'),
            ],
            'vista'        => 'recomendaciones',
        ];


        return view('asm.monitoreo_asm',$data);
    }
    public function fichas(){
        $data = [
            'menu_active' => ucwords(self::t_),
            'submenu_active' => 'asm.fichas.index',
            'breadcrumb'  => [
                ucwords(self::t_) => route('asm.fichas.index'),
                'A.S.M.' => route('asm.fichas.index'),
                'Fichas' => route('asm.fichas.index'),
            ],
            'vista'        => 'fichas',
        ];


        return view('asm.monitoreo_asm',$data);
    }

    public function criterios(){
        $data = [
            'menu_active' => ucwords(self::t_),
            'submenu_active' => 'asm.fichas.index',
            'breadcrumb'  => [
                ucwords(self::t_) => route('asm.fichas.index'),
                'A.S.M.' => route('asm.fichas.index'),
                'Criterios' => route('asm.fichas.index'),
            ],
            'vista'        => 'criterios',
        ];


        return view('asm.monitoreo_asm',$data);
    }
}

// SOLO UTILIZADO PARA MENU AHORA ES LIVEWIRE
