<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
//use App\Models\Cat\Cat_entidades_federativa;
//use App\Models\Cat\Cat_grupos_captura;
//use App\Models\Cat\Cat_system;
use App\Models\Cat\Cat_aviso;
use Illuminate\Support\Facades\Auth;

class Bandeja extends Component
{
    public User $user;
    //public Cat_system $systems;
    //public Cat_entidades_federativa $entidades;
    //public Cat_grupos_captura $grupos;
    public Cat_aviso $modelo;

    public $rows_efs,$rows_gcs,$rows_sy,$rows_us;
    public $us, $rows, $sys, $title, $body, $opt, $status;
    public $_adm;

    //validaciones de formulario
    protected $rules= [
        'titulo' => 'required',
        'user_id' => 'required',
    ];

    public function mount ($id = 0) {
        $this->us = new User;
        $this->us = User::find(Auth()->user()->id);
        $this->rows_us = $this->us->getBasicToSelect();
        //$this->rows_sy =$this->us->Cat_systems()->where('active',1)->where('deleted',0);
        //$this->rows_efs = $this->us->cat_entidades_federativas()->where('deleted',0);
        //$this->rows_gcs = $this->us->Cat_grupos_capturas()->where('active',1)->where('deleted',0);
        $this->rows = $this->us->cat_avisos->where('cat_avisos.deleted',0);
        //$this->rows = $this->us->cat_avisos->where('cat_avisos.deleted', 0)->get();
        //dump($this->rows);
        if(auth()->user()->hasRole('spme-admin')){
            $this->_adm = true;
        }
    }

    

    public function create () {
        $this->validate();
        if (empty($this->modelo->id))
             $this->modelo = new Cat_aviso;
        $this->modelo->user_id = $this->user_id;
        $this->modelo->from_id = $this->us->id;
        $this->modelo->cat_system_id = $this->sys;
        $this->modelo->title = $this->title;
        $this->modelo->body = $this->body;
        $this->modelo->options = $this->opt;
        $this->modelo->cat_estatu_id = $this->status;
    }

    
    public function render() { 
    return view('livewire.admin.bandeja',[
       'rows' => $this->rows,
       'user' => $this->us,
       '_adm' => $this->_adm,
       'rows_us' => $this->rows_us,
    ]);
    }
}
