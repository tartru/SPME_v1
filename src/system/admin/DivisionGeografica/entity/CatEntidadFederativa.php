<?php
/**
 * CatEntidadFederativa
 * 
 * Entidad que maneja el catálogo de las entidades federativas
 * 
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\DivisionGeografica\Entity;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;
use SPME\Shared\Entity\Entity;



class CatEntidadFederativa extends Entity {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        /**
         * Get all with sum states
         * 
         * @param Repository $newRepository
         * @param ?QueryManager $newQueryManager
         * @return ?self
         */
        public static function getByName(Repository $newRepository, ?QueryManager $newQueryManager = null): ?self {
            if ( !is_null($newQueryManager) ) {
                $temp = new static($newRepository, newQueryManager: $newQueryManager);
            }
            else {
                $temp = new static($newRepository);
            }

            $filter = [
                'nombre'  => $name,
                'deleted' => 0,
            ];

            if ( !is_null($newQueryManager) ) {
                return static::getWithFilter($newRepository, $filter, newQueryManager: $newQueryManager)->first();
            }
            else {
                return static::getWithFilter($newRepository, $filter)->first();
            }

            return $temp->first();
        }

    //---------------------------  Constructors  ---------------------------



    public function __construct(Repository $repository, ?Array $params = null, ?QueryManager $newQueryManager = null) {
        $this->setTable('cat_entidades_federativas');
        
        $this->withSoftDelete();
        $this->withTimestamp();

        $this->setDataTypes([
            'id'            => 'SPME\Shared\ValueObject\IntValueObject',
            'CVE_ENTIDAD'   => 'SPME\Shared\ValueObject\StringValueObject',
            'nombre'        => 'SPME\Shared\ValueObject\StringValueObject',
            'abreviacion'   => 'SPME\Shared\ValueObject\StringValueObject',
            'cat_regione_id' => 'SPME\Shared\ValueObject\IntValueObject',
        ]);


        if ( !is_null($newQueryManager) ) {
            parent::__construct($repository, $params, $newQueryManager);
        }
        else {
            parent::__construct($repository, $params);
        }
    }


}