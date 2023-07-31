<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Cat\Cat_entidades_federativa;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Cat\Cat_grupos_captura;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    public $timestamps = true;
    protected $guarded = ['deleted','active'];
    // protected $fillable = [
    //     'name',
    //     'password',
    //     'email',
    //     'type',
    //     'full_name',
    //     'puesto',
    //     'area',
    //     'last_ip',
    //     'active',
    //     'created_at',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAll() {
        return User::all();
    }

    //retorna array con id => nombre
    public function getBasicToSelect (){
        $arows=null;
        $rows=null;
        $arows=$this->orderBy('full_name', 'ASC')->select(['id','full_name as nombre'])->where('active',1)->where('deleted',0)->get();
        if($arows->count()){
            foreach($arows as $_hr => $_vr){
                $rows[$_vr['id']] = $_vr['nombre'];
            }
        }
        return $rows;
    }

    public function getById($id) {
         $usuario = $this->where('id',$id)->get();
         return (['status' => 200,'usuario' => $usuario]);

    }

    // Busca usuario por nombre y lo retorna o el regresa false
    public function getByName($request) {
        //var_dump($request);
        if(!empty($request)){
            $name = $request;
            $usuario = User::where('name',$name)->get();
            if(count($usuario) >= 1){
                return (['status' => 200,'usuario' => $usuario]);
            }
            else
            {
                return (['status' => 401,'message' => "No se encontro el nombre de usuario"]);
            }

        }
        else {
            return (['status' => 400,'message' => "No se recibio el nombre de usuario"]);
        }
    }

    // Busca usuario por email y lo retorna o el regresa false
    public function getByMail($mail) {
        //var_dump($request);
        if(!empty($mail)){
            $usuario = User::where('email',$mail)->get();
            if(count($usuario) >= 1){
                return (['status' => 200,'usuario' => $usuario]);
            }
            else
            {
                return (['status' => 401,'message' => "No se encontro el email de usuario"]);
            }

        }
        else {
            return (['status' => 400,'message' => "No se recibio el email de usuario"]);
        }
    }

    //relacion (Many-to-Many)s polimorfica con Grupos Captura
    public function cat_grupos_capturas () {
        return $this->morphToMany(Cat_grupos_captura::class,'cat_grupable');
    }

    //relacion (Many-to-Many) polimorfica con Entidades Federativas
    public function cat_entidades_federativas () {
        return $this->morphToMany(Cat_entidades_federativa::class,'cat_entidable');
    }

}
