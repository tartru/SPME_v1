<?php
/**
 * CatEstatus
 * 
 * Entidad que maneja el catálogo de estatus
 * 
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\CatEstatus\Entity;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;
use SPME\Shared\Entity\Entity;



class CatEstatus extends Entity {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        /**
         * Search user by name
         * 
         * @param String $name
         * @param Bool $all
         * @param Repository $newRepository
         * @param ?QueryManager $newQueryManager
         * @return ?self
         */
        public static function getByName(String $name, Bool $all, Repository $newRepository, ?QueryManager $newQueryManager = null): ?self {
            $filter = [
                'nombre'  => $name,
                'deleted' => 0,
            ];

            if ( !$all ) {
                $filter['active'] = true;
            }

            if ( !is_null($newQueryManager) ) {
                return static::getWithFilter($newRepository, $filter, newQueryManager: $newQueryManager)->first();
            }
            else {
                return static::getWithFilter($newRepository, $filter)->first();
            }
        }

    //---------------------------  Constructors  ---------------------------



    public function __construct(Repository $repository, ?Array $params = null, ?QueryManager $newQueryManager = null) {
        $this->setTable('cat_estatus');
        
        $this->withActiveFlag();
        $this->withSoftDelete();
        $this->withTimestamp();

        $this->setDataTypes([
            'id'          => 'SPME\Shared\ValueObject\IntValueObject',
            'valor'       => 'SPME\Shared\ValueObject\IntValueObject',
            'nombre'      => 'SPME\Shared\ValueObject\StringValueObject',
            'descripcion' => 'SPME\Shared\ValueObject\StringValueObject',
        ]);


        if ( !is_null($newQueryManager) ) {
            parent::__construct($repository, $params, $newQueryManager);
        }
        else {
            parent::__construct($repository, $params);
        }
    }


}