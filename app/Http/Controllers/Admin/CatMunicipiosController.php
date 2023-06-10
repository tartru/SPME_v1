<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Persistence\Repository\CnfDbApiRepository;
use SPME\Shared\Persistence\Repository\LaravelRepository;
use SPME\System\Admin\DivisionGeografica\Service\CatRegionesService;
use SPME\System\Admin\DivisionGeografica\Service\CatMunicipiosService;

class CatMunicipiosController extends Controller
{

    private $diccionario = [
        'CVE_ENT_MUN' => 'mun.CVE_ENT_MUN',
        'CVE_MUN'     => 'mun.CVE_MUN',
        'nombre'      => 'mun.nombre',
        'entidad'     => 'ef.nombre',
        'region'      => 'reg.nombre',
    ];



    /**
     * Shows the list
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param Int $cat_entidad_federativa_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$cat_entidad_federativa_id = null) {

        $dependencias = [
            'repository' => $this->getRepository(),
        ];

        if ( !empty($cat_entidad_federativa_id) ) {
            $params = ['cat_entidades_federativa_id' => $cat_entidad_federativa_id];
        }
        else {
            $params = [];
        }

        $regiones  = CatRegionesService::execute('getWithEntidadesForSelect', new ServiceRequest(dependencies: $dependencias));
        // $result    = CatMunicipiosService::execute('getWithEntidadAndRegion', new ServiceRequest($params, $dependencias, $request->header()));
        // $result    = $result->getResponse();
        $entidades = [];

        foreach ( $regiones->getResponse() as $region ) {
            foreach ( $region['entidades'] as $t_entidades ) {
                //$entidades[$t_entidades['id']] = $t_entidades['entidad_federativa'];
                $entidades[$t_entidades['entidad_federativa']] = $t_entidades['entidad_federativa'];
            }
        }
        ksort($entidades);

        $data = [
            'menu_active' => 'admin_municipios',
            'breadcrumb'  => ['Administrar' => route('admin_index'), 'Municipios' => route('admin_municipios')],
            'rows'        => [],//$result['rows'],
            'catalogos'   => [
                'regiones'  => $regiones->getResponse(),
                'entidades' => $entidades,
            ],
        ];


        return view('admin.municipios.list',$data);
        //return $data;
    }



    /**
     * Shows the filtered list
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request) {
        $dependencias = [
            'repository' => $this->getRepository(),
        ];

        $validated = \Validator::make($request->all(),[
            'draw'             => 'required|integer',
            'columns.*.name'   => 'required|string|min:1',
            'columns.*.search' => 'required|size:2',
            'start'            => 'required|integer',
            'length'           => 'required|integer',
        ]);

        if ( $validated->fails() ) {
            return $validated->errors();
        }

        $parametros = $request->input();
        $draw       = $parametros['draw'];

        $params = [
            'offset' => $parametros['start'],
            'limit'  => $parametros['length'],
            'params' => [],
        ];

        if ( !empty($parametros['order']) && !empty($parametros['order'][0]) && $parametros['order'][0]['column'] != '' && !empty($parametros['order'][0]['dir'])
            && isset($parametros['columns'][$parametros['order'][0]['column']]) && isset($this->diccionario[$parametros['columns'][$parametros['order'][0]['column']]['name']]) ) {
            $params['order_by']   = $this->diccionario[$parametros['columns'][$parametros['order'][0]['column']]['name']];
            $params['order_type'] = $parametros['order'][0]['dir'];
        }

        if ( !empty($parametros['search']) && !empty($parametros['search']['value']) ) {
            $params['search'] = $parametros['search']['value'];
        }

        if ( !empty($parametros['columns']) ) {
            foreach ( $parametros['columns'] as $t_column ) {
                if ( !empty($t_column['search']['value']) ) {
                    $params['params'][$t_column['name']] = $t_column['search']['value'];
                }
            }
        }

        $result = CatMunicipiosService::execute('getWithEntidadAndRegion', new ServiceRequest($params, $dependencias, $request->header()));

        if ( !$result->success() ) {
            $response = [
                'draw'            => $draw,
                'recordsTotal'    => 0,
                'recordsFiltered' => 0,
                'data'            => $result->getResponse(),
            ];
        }

        $result = $result->getResponse();
        
        $response = [
            'draw'            => $draw,
            'recordsTotal'    => $result['total'],
            'recordsFiltered' => $result['cant'],
            'data'            => $result['rows'],
        ];

        return $response;
    }





    /**
     * Genera la conexión a la base de datos
     * 
     * @return \SPME\Shared\Persistence\Repository\Repository
     */
    private function getRepository() {
        if ( env('DB_REPOSITORY') == 'Local' ) {
            return LaravelRepository::getRepository(['db_facade' => "Illuminate\Support\Facades\DB", 'connection' => 'mysql']);
        }

        else {
            return CnfDbApiRepository::getRepository(['url' => env('DB_HOST'), 'ephylone' => env('DB_DATABASE')]);
        }
    }
}
