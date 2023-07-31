<?php

namespace App\Http\Livewire\Monitoreo\Asm;

use Livewire\Component;

use App\Models\Asm\asmRecomendacione;
use App\Models\asm\asm_ficha;
use Illuminate\Support\Facades\DB;
use App\Models\Cat\Cat_programas_presupuestale;
use Database\Seeders\cat_programas_presupuestales_seed;
use App\Models\Cat\catDependencia;

class FichasForm extends Component
{
    public asm_ficha $modelo;
    public Cat_programas_presupuestale $mod_pp;
    public catDependencia $mod_cd;
    public $rows_pp,$rows_cd;
    public $clave, $rows, $permissions;
    public $nombre,$descripcion,$programa,$fecha_inicial,$dependencia,$stp1;
    Public $msg; 

    protected $rules= [
        'nombre' => 'required|string|max:100',
        'programa' => 'required',
        'descripcion' => 'required|string|min:6',
        'fecha_inicial' => 'required',
        'programa' => 'required',
        'dependencia' => 'required',
    ];


    public function create () {
        $this ->stp1 =true;
        $this->validate();
        if (empty($this->modelo->id))
             $this->modelo = new asm_ficha;
        $this->modelo->nombre = $this->nombre;
        $this->modelo->descripcion = $this->descripcion;
        $this->modelo->fecha_inicial = $this->fecha_inicial;
        $this->modelo->cat_programas_presupuestale_id = $this->programa;
        $this->modelo->cat_dependencia_id = $this->dependencia;
        $this->modelo->cat_estatu_id = 1;
    
        $this->stp1=1;
        if($this->modelo->save()){
            $this->msg="Registro Guardado con Éxito";
            $this->emitUp('render');
            // $this->emitTo('FichasAsm','render');
            // $this->emitTo('Recomendaciones','alert');
            $this->reset(['nombre','descripcion','fecha_inicial','programa','dependencia']);
            // return redirect()->route('asm.fichas.index');
            return view('asm.monitoreo_asm');
           
        }
        else{
            $this->msg="Errores de guardado";
        }

    }

    public function mount ($id = 0) {
        $this->permissions['create']='asm.fichas.index';
        $this->permissions['update']='asm.fichas.index';
        //precarga informacion
        if (!isset($this->modelo)){
            $this->modelo = new asm_ficha;
        }

        $this->mod_pp = new cat_programas_presupuestale;
        $this->rows_pp=$this->mod_pp->getBasicToSelect();
        $this->mod_cd = new catDependencia();
        $this->rows_cd=$this->mod_cd->getBasicToSelect();
        $this->rows=$this->modelo->getJoinsNames();
    }

    public function val () {
        $this->stp1=1;
        // $this->emit('alert');
        $this->emitUp('render');
        // return view('asm.monitoreo_asm');
        //return redirect()->route('asm.fichas.index');

    }


    public function render() {
        // $this->emit('alert');
        
        return view('livewire.monitoreo.asm.fichas-form');
    }
}
