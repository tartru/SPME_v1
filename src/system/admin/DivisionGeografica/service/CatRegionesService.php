<?php
/**
 * CatRegionesService
 * 
 * Service for cat_regions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\DivisionGeografica\Service;

use SPME\Shared\Service\Service;
use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Service\ServiceResponse;
use SPME\Shared\Service\ServiceException;
use SPME\System\Admin\DivisionGeografica\Entity\CatRegion;
use SPME\System\Admin\DivisionGeografica\query\DivisionGeograficaQueryManager;


class CatRegionesService extends Service {

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


        $rows = CatRegion::getWithFilter($repository,['deleted !=' => true],'id','ASC')->getAllRows();


        return $this->response($rows, 200);
    }


    /**
     * Lista los registros para un select
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function getForSelect(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        $rows = CatRegion::getWithFilter($repository,['deleted !=' => true],'id','ASC')->getArrayPair('id','nombre');

        return $this->response($rows, 200);
    }


    /**
     * Lista los registros con la cantidad de entidados
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function getWithCantidadEntidades(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        $rows = CatRegion::getWithBindedQuery($repository, DivisionGeograficaQueryManager::getQueryManager(), 'regiones_cant_entidades')->getAllRows();


        return $this->response($rows, 200);
    }


    /**
     * Lista los registros con las entidados
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function getWithEntidadesForSelect(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        $rows = CatRegion::getWithBindedQuery($repository, DivisionGeograficaQueryManager::getQueryManager(), 'regiones_con_entidades_para_select')->getAllRows();

        $new_rows = [];

        foreach ( $rows as $row ) {
            if ( !isset($new_rows[$row['reg_id']]) ) {
                $new_rows[$row['reg_id']] = [
                    'id'        => $row['reg_id'],
                    'region'    => $row['region'],
                    'entidades' => [],
                ];
            }

            $new_rows[$row['reg_id']]['entidades'][$row['ef_id']] = [
                'id'                 => $row['ef_id'],
                'entidad_federativa' => $row['entidad_federativa'],
            ];
        }


        return $this->response($new_rows, 200);
    }

}