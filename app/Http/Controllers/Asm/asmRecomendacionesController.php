<?php

namespace App\Http\Controllers\Asm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asm\asmRecomendacione;

class asmRecomendacionesController extends Controller
{
    public function index(Request $request){
        $rows = asmRecomendacione::all();
        $data = [
            'menu_active' => 'Monitoreo',
            'submenu_active' => 'asm_recomendaciones',
            'breadcrumb'  => [
                'Monitoreo' => route('asm_recomendaciones'),
                'A.S.M.' => route('asm_recomendaciones'),
                'Recomendaciones' => route('asm_recomendaciones'),
            ],
            'rows'        => $rows,
            'anios'  => ['2019','2020','2021','2022'],
            'fichas'  => ['FMyE 2019-2020','FMyE 2020-2021','FMyE 2019-2023'],
        ];


        return view('asm.RecomendacionesList',$data);
    }
}
