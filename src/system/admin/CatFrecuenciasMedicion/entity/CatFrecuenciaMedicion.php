<?php
/**
 * CatFrecuenciaMedicion
 * 
 * Entidad que maneja el catálogo de frecuencias de medición
 * 
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Admin\CatFrecuenciasMedicion\Entity;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;
use SPME\Shared\Entity\Entity;



class CatFrecuenciaMedicion extends Entity {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        

    //---------------------------  Constructors  ---------------------------



    public function __construct(Repository $repository, ?Array $params = null, ?QueryManager $newQueryManager = null) {
        $this->setTable('cat_frecuencias_medicion');
        
        $this->withActiveFlag();
        $this->withSoftDelete();
        $this->withTimestamp();

        $this->setDataTypes([
            'id'          => 'SPME\Shared\ValueObject\IntValueObject',
            'valor'       => 'SPME\Shared\ValueObject\FloatValueObject',
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