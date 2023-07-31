<?php

namespace App\Http\Livewire\Monitoreo\Asm;

use Livewire\Component;

use App\Models\Asm\asmRecomendacione;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\asm\asm_ficha;
use Illuminate\Support\Facades\DB;

class Recomendaciones extends Component
{
    public $data;
    public $ficha,$fichas, $anio,$anios, $clave, $rows, $search='hola';

    public function submitForm () {
        $this->search='se envio formulario correctamente';
        if (!empty($this->clave)){
            $this->rows=asmRecomendacione::where('clave','like','%'.$this->clave.'%')->get();
        }
        elseif (!empty($this->nombre)){
            $this->rows=asmRecomendacione::where('nombre','like','%'.$this->search.'%')->get();
        }
    }

    public function mount () {

        
    }
    public function render() {
        $this->fichas=asm_ficha::select('id','nombre')
            ->where('deleted',0)
            ->where('cat_estatu_id','<>','5')
            ->get();

        $this->anios=DB::table('asm_fichas')
            ->selectRaw('DISTINCT YEAR(fecha_inicial) AS anios')
            ->orderBy('fecha_inicial', 'desc')
            ->get()
            ->pluck('anios');

        if (!empty($this->ficha)){
            $this->rows=asmRecomendacione::where('asm_ficha_id',$this->ficha)
            ->where('deleted',0)
            ->get();
        }
        elseif(!empty($this->anio)){
            $this->rows=asmRecomendacione::select('asm_recomendaciones.*')->join('asm_fichas','asm_recomendaciones.asm_ficha_id','=','asm_fichas.id')->whereYear('asm_fichas.fecha_inicial',$this->anio)->get();
            // ->asm_ficha->whereYear('fecha_inicial',$this->anio)->get();
            // //whereYear('created_at', '2021')->get();
            // $rows= DB::table('permissions')
            // ->join('cat_systems','permissions.nivel','=','cat_systems.id')
            // ->select('permissions.id','permissions.name','permissions.guard_name','permissions.descripcion','permissions.id','permissions.nivel','cat_systems.siglas')
            // ->get();
    
        }
        if(empty($this->rows)){
            $this->rows=0;
        }
        $this->data= [
            'rows' => $this->rows,
            'anios'  => $this->anios,
            'fichas'  => $this->fichas,
        ];
        return view('livewire.monitoreo.asm.recomendaciones');
    }
}
