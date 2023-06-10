<?php
/**
 * CatEntidadesFederativasService
 * 
 * Service for cat_entidades_federativas
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
use SPME\System\Admin\DivisionGeografica\Entity\CatEntidadFederativa;
use SPME\System\Admin\DivisionGeografica\query\DivisionGeograficaQueryManager;


class CatEntidadesFederativasService extends Service {

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


        $rows = CatEntidadFederativa::getWithFilter($repository,['deleted !=' => true],'CVE_ENTIDAD','ASC')->getAllRows();


        return $this->response($rows, 200);
    }


    /**
     * Lista los registros con la cantidad de entidados
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function getWithCantidadMunicipios(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        //Validaciones de parámetros del usuario
            $vResult = $request->validate([
                'cat_regione_id' => 'integer',
            ]);

            if ( !$vResult ) {
                return $this->error('Ocurrieron algunos errores.', response: $request->getErrors());
            }
        //Validaciones de parámetros del usuario

        $values  = [];
        $bloques = [];
        $region  = $request->getParameters('cat_regione_id');
        if ( !empty($region) ) {
            $values  = ['regione_id' => $region];
            $bloques = ['filtro_por_region'];
        }


        $rows = CatEntidadFederativa::getWithBindedQuery($repository, DivisionGeograficaQueryManager::getQueryManager(), 'entidades_cant_municipios',$values,$bloques)->getAllRows();


        return $this->response($rows, 200);
    }

}