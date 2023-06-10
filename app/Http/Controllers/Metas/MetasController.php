<?php

namespace App\Http\Controllers\Metas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function index() {
        return view('Metas.index');
    }
}
