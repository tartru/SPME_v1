<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Persistence\Repository\CnfDbApiRepository;
use SPME\Shared\Persistence\Repository\LaravelRepository;
use SPME\System\Admin\CatOrigenesPresupuestales\Service\CatOrigenesPresupuestalesService;

class CatOrigenesPresupuestalesController extends Controller
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

        $result = CatOrigenesPresupuestalesService::execute('get', new ServiceRequest($request->input(), $dependencias, $request->header()));


        $data = [
            'menu_active' => 'admin_origenes_presupuestales',
            'breadcrumb'  => ['Administrar' => route('admin_index'), 'Orígenes presupuestales' => route('admin_origenes_presupuestales')],
            'rows'        => $result->getResponse(),
        ];


        return view('admin.origenes_presupuestales.list',$data);
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
