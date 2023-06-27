<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    protected $roles;
    public function __construct(Role $roles) {
        $this->roles = $roles;
    }

    public function index(){
        // $roles = DB::table('roles')
        //         ->where('guard_name', 'like', 'spme', 'or')
        //         ->where('guard_name', 'like', 'mir', 'or')
        //         ->where('guard_name', 'like', 'asm', 'or')
        //         ->where('guard_name', 'like', 'web', 'or')
        //         ->get();

       
        
        $sql='select * from roles where guard_name like "web"';

        if($this->middleware('can:spme.admin.roles.update')){
            $sql=$sql.' or guard_name like "spme"';
        }
        if($this->middleware('can:asm.admin.roles.update')){
            $sql=$sql.' or guard_name like "asm"';
        }
        if($this->middleware('can:mir.admin.roles.update')){
            $sql=$sql.' or guard_name like "mir"';
        }
        $sql=$sql.' order by guard_name';
        $roles = DB::select($sql);
       
        //$roles = $this->roles->all();
        
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
