<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat\Cat_regione;

class CatRegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cat_regiones;
    
    public function __construct(Cat_regione $cat_regiones) {
        $this->cat_regiones = $cat_regiones;
    }
    
    public function index(){
        $cat_regiones = $this->cat_regiones->Obtener();
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_regiones',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Regiones' => route('admin_regiones'),
            ],
            'rows'        => $cat_regiones,
        ];
        return view('Cat.RegionesList',$data);
    }

    public function agrupado(){
                
        $data = [
            'menu_active' => 'Administrar',
            'submenu_active' => 'admin_regiones',
            'breadcrumb'  => [
                'Administrar' => route('admin_index'), 
                'Regiones' => route('admin_regiones'),
            ],
            'rows'        => $this->cat_regiones->ObteterRegionesyNumEstados(),
        ];

        //return view('Cat/CatRegiones', ['cat_regions' => $cat_regions]);
        return view('cat/RegionesList',$data);
    }

        public function prueba() {
        //$data=$this->cat_entidades_federativas->cat_entidades_federativas()->get();
        //$data=$this->cat_entidades_federativas->cat_entidades_federativas()->get();
        //$data=Cat_entidades_federativa::with('cat_regiones','cat_regiones_id')->get(); //ok
        $data=Cat_regione::with('cat_entidades_federativas','cat_regiones_id','id')->get();
        return $data;
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }

}
