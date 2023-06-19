<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    protected $usuario;
    
    public function __construct(User $usuario) {
        $this->usuario = $usuario;
    }

    public function index(){
        
        $usuario = $this->usuario->all();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.usuarios.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.usuarios.index'), 
                'Usuarios' => route('admin.usuarios.index')
            ],
            'rows'        => $usuario
        ];
        return view('UsersList',$data);
    }

    public function profile()  {
        $id=auth()->id ();
        $user=$this->usuario->find($id);
        // if((auth()->user()->active)!=0) {
        //     $role=$this->role->find($id);
        //     $permision=$this->permision->getByid($role->id);
        // }
        $data = [
            'menu_active' => 'Cuenta',
            'submenu_active' => 'admin_profile',
            'breadcrumb'  => [
                'Cuenta' => route('admin.usuarios.index'), 
                'Profile' => route('admin_profile')
            ],
            'rows'        => $user,
            // 'role'      =>$role,
            // 'permision'      =>$role,
        ];
        //return dump($user);
        return view('UsersProfile',$data);    
    }

    public function edit(User $row){
        $roles=Role::all();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.usuarios.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Usuarios' => route('admin.usuarios.index'),
                'Editar' => route('admin.usuarios.index'),
            ],
            'user'        => $row,
            'roles'=>$roles,
        ];
        return view('UserEdit',$data);
    }

    

}  //fin de clase
