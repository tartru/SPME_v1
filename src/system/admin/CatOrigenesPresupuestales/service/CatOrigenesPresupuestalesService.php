<?php
/**
 * CatOrigenesPresupuestalesService
 * 
 * Service for cat_origenes_presupuestales
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\CatOrigenesPresupuestales\Service;

use SPME\Shared\Service\Service;
use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Service\ServiceResponse;
use SPME\Shared\Service\ServiceException;
use SPME\System\Admin\CatOrigenesPresupuestales\Entity\CatOrigenPresupuestal;


class CatOrigenesPresupuestalesService extends Service {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------




    public function __construct() {}


    
    /**
     * Lista los registros
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function get(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        $rows = CatOrigenPresupuestal::getWithFilter($repository,['deleted !=' => true],'position','ASC')->getAllRows();


        return $this->response($rows, 200);
    }

}