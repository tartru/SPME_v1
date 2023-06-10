<?php

namespace App\Http\Controllers\Pic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function index() {
        return view('Pic.index');
    }
}
