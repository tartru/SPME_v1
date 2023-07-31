<?php

namespace App\Models\Cat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;


class Cat_system extends Model
{
    public function Obtener() {
        return $this->all();
    }

    public function getById($id) {
        return $this->where('id',$id)->where('active',1)->where('deleted',0)->get();
    }
    public function getBySigla($sigla) {
        return $this->where('siglas',$sigla)->where('active',1)->where('deleted',0)->get();
    }

    public function user() {
        return $this->belongsTo(User::class); // Fkey = nombre de metodo + id Pkey=> regresa * entidadesfederativas con objeto region que le pertenece;
    }
    //regresa los sistemas del usuario 
    public function getByUser($user_id) {
        $user = User::findOrFail($user_id);
        if ($user->hasRole('spme-admin')){
            $qry= $this->select('id as sys_id','siglas')
            ->where('active',1)->where('deleted',0)
            ->get();
        }
        else{
            $qry= $this->select('cat_systems.id as sys_id','cat_systems.siglas as siglas','users.id as us_id')
            ->leftjoin('users_systems','cat_systems.id','=','users_systems.cat_system_id')
            ->rightjoin('users','users_systems.user_id','=','users.id')
            ->where('cat_systems.active',1)->where('cat_systems.deleted',0)
            ->where('users.active',1)->where('users.deleted',0)
            ->where('users.id',$user_id)
            ->get();
        }

        return ($qry);
    }

    public function getAllActives() {
        return $this->where('active',1)->where('deleted',0)->get();
    }

    public function getBasic() {
        return $this->select('id','siglas','nombre')->where('active',1)->where('deleted',0)->get();
    }

    public function hasUsIdSystemId($us_id,$sys_id) {
        $rows=DB::table('users_systems')->where('user_id', $us_id)->where('cat_system_id', $sys_id)->get();
        if(count($rows)>=1)
            return true;
        else
            return false;
    }

    public function hasUsIdSystemName($us_id,$sys_name) {
        $rows=DB::table('users_systems')
        ->join('cat_systems','cat_systems.id','=','users_systems.cat_system_id')
        ->join('users','users_systems.user_id','=','users.id')
        ->where('cat_systems.active',1)->where('cat_systems.deleted',0)
        ->where('users.active',1)->where('users.deleted',0)
        ->where('user_id', $us_id)
        ->where('cat_system.siglas',$sys_name)
        ->get();
        if(count($rows)>=1)
            return true;
        else
            return false;
    }

    public function saveUsIdSysId($us_id,$sys_id) {
        if(DB::table('users_systems')->insert(['user_id' => $us_id,'cat_system_id' => $sys_id]))
            return true;
        else
            return false;
    }

    public function deleteUsIdSysId($us_id,$sys_id) {
        if(DB::table('users_systems')->where('user_id', $us_id)->where('cat_system_id', $sys_id)->delete())
            return true;
        else
            return false;
    }

}

