<?php
/**
 * CatOrigenPresupuestal
 * 
 * Entidad que maneja el catálogo de los orígenes presupuestales
 * 
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\CatOrigenesPresupuestales\Entity;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;
use SPME\Shared\Entity\Entity;



class CatOrigenPresupuestal extends Entity {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        

    //---------------------------  Constructors  ---------------------------



    public function __construct(Repository $repository, ?Array $params = null, ?QueryManager $newQueryManager = null) {
        $this->setTable('cat_origenes_presupuestales');
        
        $this->withActiveFlag();
        $this->withSoftDelete();
        $this->withTimestamp();
        $this->withOrder();

        $this->setDataTypes([
            'id'          => 'SPME\Shared\ValueObject\IntValueObject',
            'nombre'      => 'SPME\Shared\ValueObject\StringValueObject',
            'descripcion' => 'SPME\Shared\ValueObject\StringValueObject',
            'nota'        => 'SPME\Shared\ValueObject\StringValueObject',
        ]);


        if ( !is_null($newQueryManager) ) {
            parent::__construct($repository, $params, $newQueryManager);
        }
        else {
            parent::__construct($repository, $params);
        }
    }


}