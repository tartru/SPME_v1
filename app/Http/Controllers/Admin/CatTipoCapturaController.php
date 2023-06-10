<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Persistence\Repository\CnfDbApiRepository;
use SPME\Shared\Persistence\Repository\LaravelRepository;
use SPME\System\Admin\CatTipoCaptura\Service\CatTipoCapturaService;

class CatTipoCapturaController extends Controller
{
    /**
     * Shows the list
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $dependencias = [
            'repository' => $this->getRepository(),
        ];

        $result = CatTipoCapturaService::execute('get', new ServiceRequest($request->input(), $dependencias, $request->header()));


        $data = [
            'menu_active' => 'admin_tipos_captura',
            'breadcrumb'  => ['Administrar' => route('admin_index'), 'Tipos de captura' => route('admin_tipos_captura')],
            'rows'        => $result->getResponse(),
        ];


        return view('admin.tipo_captura.list',$data);
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
