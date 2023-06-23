<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    protected $roles;
    public function __construct(Role $roles) {
        $this->roles = $roles;
    }

    public function index(){
        
        $roles = $this->roles->all();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'Roles',
            'breadcrumb'  => [
                'Administrar' => route('admin.roles.index'), 
                'Roles' => route('admin.roles.index'),
            ],
            'rows'        => $roles,
        ];


        return view('cat.RolesList',$data);
    }

    public function edit(Role $row){   
        $permisos=Permission::all();
        
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.roles.edit',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Roles' => route('admin.roles.index'),
                'Editar' => route('admin.roles.edit'),
            ],
            'roles'        => $row,
            'permisos'=>$permisos,
            
        ];
        $update=1;
        return view('RoleEdit',$data,$update);
    }

    public function destroy(Role $role) {
        $role->delete();
        return redirect()->route('admin.roles.index');
  }
}
