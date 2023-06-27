<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Error;
use Spatie\Permission\Models\Role;
use App\Models\Users_system;


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
            'submenu_active' => 'admin.users.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.users.index'), 
                'Usuarios' => route('admin.users.index')
            ],
            'rows'        => $usuario
        ];

        return view('admin.UsersList',$data);
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
            'submenu_active' => 'admin.users.profile',
            'breadcrumb'  => [
                'Administrar' => route('admin.users.index'), 
                'Usuarios' => route('admin.users.index'),
                'Usuarios' => route('admin.users.index'),
            ],
            'rows'        => $user,
        ];
        return view('admin.UsersProfile',$data);    
    }

    public function edit(User $row){   
        $roles=Role::all();
        //tipo-tamaño-nulos-default
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin.users.index',
            'breadcrumb'  => [
                'Administrar' => route('admin.index'), 
                'Usuarios' => route('admin.users.index'),
                'Editar' => route('admin.users.index'),
            ],
            'user'        => $row,
            'roles'=>$roles,
        ];
        return view('admin.UserEdit',$data);
    }

    public function update(request $request,User $user){
        $us = User::findOrFail($request->id);
        if ($request->has("active")){
            $us->active = $request->active;
            $msg = ($request->active == 0) ? 'Usuario Desactivado' : 'Usuario Activado';
            if($us->save()){
                session()->flash('msg-success' ,$msg);
                return redirect()->route('admin.users.edit',$us);
            }
            else{
                session()->flash('msg-warning' ,$msg);
                return redirect()->route('admin.users.edit',$us)->with('message' ,"No se pudo relizar la acción");
            }
        }
        if ($request->has("data_us")){
            $datos = $request->except('_method','_token','data_us','guardar');
  
            if($us->update($datos)){
                session()->flash('msg-success' ,'Datos actualizados');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se pudo actualizar - Intente nuevamente');
                return redirect()->route('admin.users.edit',$us);
            }
        }

        if ($request->has("roles")){
            $datos = $request->except('_method','_token','roles','guardar','id');
            //return $request;
            //$us->role()->sync($datos);
           //return $datos;
            if($us->syncRoles($datos)){
                session()->flash('msg-success' ,'Roles actualizados');
                return redirect()->route('admin.users.edit',$us);
            }else {
                session()->flash('msg-warning' ,'No se actualizaron los roles - Intente nuevamente');
                return redirect()->route('admin.users.edit',$us);
            }

        }

        return redirect()->route('admin.users.edit',$us);
    }

    public function user_system (request $request, User $user) { //para agregar roles por tipo de sistema
        $form = $request->except('_method','_token');
        $vaciar=Users_system::where('user_id', $user)->delete();
        if(!empty($vaciar)){
            session()->flash('msg-warning' ,'No se actualizaron los sistemas del usuario - Intente nuevamente');
            return redirect()->route('admin.users.edit',$user);
        }
        $syst=new Users_system;
        foreach ($form as $req) {
            // $syst->user_id = $user;
            // $syst->cat_system_id = $req;
            $registro = $syst->save();
            //$registro = Users_system::save(user_id = User->id,cat_system_id = $req);
            if(empty($registro)){
                session()->flash('msg-warning' ,'No se actualizaron los sistemas - Intente nuevamente');
                return redirect()->route('admin.users.edit',$user['id']);
            }
        }
        session()->flash('msg-success' ,'Actualizado - Se actualizaron los sistemas');
        return redirect()->route('admin.users.edit',$user['id']);
    }
   

    

}  //fin de clase  //Users_system::save('user_id'= $user->id, );
