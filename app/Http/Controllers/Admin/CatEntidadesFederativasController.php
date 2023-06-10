<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Persistence\Repository\CnfDbApiRepository;
use SPME\Shared\Persistence\Repository\LaravelRepository;
use SPME\System\Admin\DivisionGeografica\Service\CatRegionesService;
use SPME\System\Admin\DivisionGeografica\Service\CatEntidadesFederativasService;

class CatEntidadesFederativasController extends Controller
{
    /**
     * Shows the list
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param Int $cat_region_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$cat_region_id = null) {

        $dependencias = [
            'repository' => $this->getRepository(),
        ];

        if ( !empty($cat_region_id) ) {
            $params = ['cat_region_id' => $cat_region_id];
        }
        else {
            $params = [];
        }

        $regiones = CatRegionesService::execute('getForSelect', new ServiceRequest(dependencies: $dependencias));
        $result   = CatEntidadesFederativasService::execute('getWithCantidadMunicipios', new ServiceRequest($params, $dependencias, $request->header()));

        $data = [
            'menu_active'   => 'admin_entidades_federativas',
            'breadcrumb'    => ['Administrar' => route('admin_index'), 'Entidades federativas' => route('admin_entidades_federativas')],
            'cat_region_id' => $cat_region_id,
            'rows'        => $result->getResponse(),
            'catalogos'   => [
                'regiones' => $regiones->getResponse(),
            ],
        ];


        return view('admin.entidades_federativas.list',$data);
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
