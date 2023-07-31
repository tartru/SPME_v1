<?php

namespace App\Http\Livewire\Monitoreo\Asm;

use Livewire\Component;

use App\Models\asm\asm_ficha;
use App\Models\Cat\Cat_programas_presupuestale;
use App\Models\Cat\catDependencia;

class FichasASM extends Component
{
    public asm_ficha $modelo;
    public Cat_programas_presupuestale $mod_pp;
    public catDependencia $mod_cd;
    public $permissions;

    protected $listeners= ['render' => 'render','mount' => 'mount'];

  
    public function mount ($id = 0) {
        $this->permissions['create']='asm.fichas.index';
        $this->permissions['update']='asm.fichas.index';
        
        //inicializa modelos
       
        $this->modelo = new asm_ficha;
        $this->mod_pp = new cat_programas_presupuestale;

    }


    public function render() {
       
        $this->emit('alert');
         
        return view('livewire.monitoreo.asm.fichas-a-s-m',[
            'table_data' => $this->modelo->getJoinsNames(), 
            'table_config' => [
                'headers' => [
                    'id'    => 'ID',
                    'nombre'      => 'Nombre',
                    'descripcion' => 'Descripción',
                    'fecha_inicial'      => 'Inicio',
                    'fecha_final'     => 'Final',
                    'programa'     => 'Programa Presupuestal',
                    'dependencia'     => 'Dependencia',
                    'estatus'     => 'Estatus',
                ],
                'with_pos' => false,
                'actions'  => [
                    'pagination' => [
                        'options' => [10,20,50],
                        'rows'    => 10,
                    ],
                    'ordering'    => true,
                    'order' => [[0, 'desc']],
                    'searching'        => true,
                    'extras_accordion' => true,
                    'export_data'      => true,
                    'search_columns'   => [
                        'nombre' => [
                            'type'        => 'text',
                            'placeholder' => 'Filtrar por Nombre',
                            'name'        => 'Nombre de Ficha',
                        ],
                        'descripcion' => [
                            'type'        => 'text',
                            'placeholder' => 'Filtrar por Descripción',
                            'name'        => 'Descripción de Ficha',
                        ],
                        'fecha_inicial' => [
                            'type'    => 'select',
                            'options' => $this-> modelo->getAniosInit(),
                            'name'        => 'Año Inicial',
                        ],
                        'fecha_final' => [
                            'type'    => 'select',
                            'options' => $this-> modelo->getAniosFin(),
                            'name'        => 'Año Fin',
                        ],
                        'programa' => [
                            'type'    => 'select',
                            'options' => $this-> mod_pp->select('clave')->where('active',1)->where('deleted',0)->get()->pluck('clave'),
                            'name'        => 'Programa Presupuestal',
                        ],
                    ],
                ],
            ],
        ]);
    }
}
