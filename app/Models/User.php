<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'email',
        'type',
        'full_name',
        'puesto',
        'area',
        'last_ip',
        'active',
        'created_at',
    ];

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
     

}
