<?php
/**
 * CatMunicipiosService
 * 
 * Service for cat_municipios
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
use SPME\System\Admin\DivisionGeografica\Entity\CatMunicipio;
use SPME\System\Admin\DivisionGeografica\query\DivisionGeograficaQueryManager;


class CatMunicipiosService extends Service {

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


        $rows = CatMunicipio::getWithFilter($repository,['deleted !=' => true],'CVE_ENT_MUN','ASC')->getAllRows();


        return $this->response($rows, 200);
    }


    /**
     * Lista los registros con su entidad y región a la que pertenecen
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function getWithEntidadAndRegion(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            $request->validateDependencies(['repository']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        //Validaciones de parámetros del usuario
            $vResult = $request->validate([
                'cat_entidades_federativa_id' => 'integer',
                'offset'                    => 'integer',
                'limit'                     => 'integer',
                'order_by'                  => 'in:mun.nombre,mun.CVE_MUN,mun.CVE_ENT_MUN,ef.nombre,reg.nombre',
                'order_type'                => 'in:asc,desc',
            ]);

            if ( !$vResult ) {
                return $this->error('Ocurrieron algunos errores.', response: $request->getErrors());
            }
        //Validaciones de parámetros del usuario

        $values     = [];
        $bloques    = [];
        $entidad    = $request->getParameters('cat_entidades_federativa_id');
        $order_by   = $request->getParameters('order_by');
        $order_type = $request->getParameters('order_type');
        $offset     = $request->getParameters('offset');
        $limit      = $request->getParameters('limit');
        $params     = $request->getParameters('params');
        $search     = $request->getParameters('search');

        //Filtrado por entidad_id
            if ( !empty($entidad) ) {
                $values['entidad_id'] = $entidad;
                $bloques[] = 'filtro_por_entidad';
            }
        //Filtrado por entidad_id

        //Ordenamiento
            if ( $order_by ) {
                $values['order_by']   = $order_by;
                $values['order_type'] = $order_type;

                $bloques[] = 'order';
            }
            else {
                $values['order_by']   = 'mun.CVE_ENT_MUN';
                $values['order_type'] = 'ASC';

                $bloques[] = 'order';
            }
        //Ordenamiento

        //Fitrado
            if ( !empty($params) ) {
                if ( isset($params['nombre']) ) {
                    $values['nombre'] = "%{$params['nombre']}%";

                    $bloques[] = 'filtro_nombre';
                }
                if ( isset($params['CVE_MUN']) ) {
                    $values['CVE_MUN'] = "%{$params['CVE_MUN']}%";

                    $bloques[] = 'filtro_CVE_MUN';
                }
                if ( isset($params['CVE_ENT_MUN']) ) {
                    $values['CVE_ENT_MUN'] = "%{$params['CVE_ENT_MUN']}%";

                    $bloques[] = 'filtro_CVE_ENT_MUN';
                }
                if ( isset($params['region']) ) {
                    $values['region'] = $params['region'];

                    $bloques[] = 'filtro_region';
                }
                if ( isset($params['entidad']) ) {
                    $values['entidad'] = $params['entidad'];

                    $bloques[] = 'filtro_entidad';
                }
            }

            if ( !empty($search) ) {
                $values['search'] = "%{$search}%";

                $bloques[] = 'filtro_search';
            }
        //Fitrado

        $cant = CatMunicipio::getWithBindedQuery($repository, DivisionGeograficaQueryManager::getQueryManager(), 'municipios',$values,$bloques)->count();

        //Límite
            if ( $offset || $offset === 0 || $offset == '0' ) {
                $values['offset'] = $offset;
                $values['limit']  = $limit;
                $bloques[] = 'limit';
            }
        //Límite

        $rows  = CatMunicipio::getWithBindedQuery($repository, DivisionGeograficaQueryManager::getQueryManager(), 'municipios',$values,$bloques)->getAllRows();
        $total = CatMunicipio::getWithFilter($repository,['deleted !=' => true])->count();


        return $this->response(['rows' => $rows,'cant' => $cant,'total' => $total], 200);
    }


    /**
     * Regresa los catálogos
     */

}