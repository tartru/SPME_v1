<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    protected $usuario;
    
    public function __construct(User $usuario) {
        $this->usuario = $usuario;
    }

    public function index(){
        
        $usuario = $this->usuario->all();
        
        $data = [
            'menu_active' => 'configuraciones',
            'submenu_active' => 'admin_usuarios',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Estatus' => route('admin_usuarios')
            ],
            'rows'        => $usuario
        ];
        return view('UsersList',$data);
    }

    public function getByName(Request $request) {
        $name = $request->get('name');
        $usuar = $this->usuario->where('name','like',$name)->get();
        $filter = [
            'name'    => $name,
            'deleted' => 0,
        ];

    }
}
