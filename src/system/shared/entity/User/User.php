<?php
/**
 * User
 * 
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Shared\Entity\User;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;
use SPME\Shared\Entity\Entity;



class User extends Entity {

    //---------------------------  Parámeters  ---------------------------
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        /**
         * Search user by name
         * 
         * @param String $name
         * @param Repository $newRepository
         * @param ?QueryManager $newQueryManager
         * @return ?self
         */
        public static function getByName(String $name, Repository $newRepository, ?QueryManager $newQueryManager = null): ?self {
            $filter = [
                'name'    => $name,
                'deleted' => 0,
            ];

            if ( !is_null($newQueryManager) ) {
                return static::getWithFilter($newRepository, $filter, newQueryManager: $newQueryManager)->first();
            }
            else {
                return static::getWithFilter($newRepository, $filter)->first();
            }

        }

    //---------------------------  Constructors  ---------------------------



    public function __construct(Repository $repository, ?Array $params = null, ?QueryManager $newQueryManager = null) {
        $this->setTable('users');
        
        $this->withActiveFlag();
        $this->withSoftDelete();
        $this->withTimestamp();
        $this->withExtraFlags(['bloqued']);

        $this->setDataTypes([
            'id'                 => 'SPME\Shared\ValueObject\IntValueObject',
            'name'               => 'SPME\Shared\ValueObject\StringValueObject',
            'password'           => 'SPME\Shared\ValueObject\StringValueObject',
            'email'              => 'SPME\Shared\ValueObject\StringValueObject',
            'full_name'          => 'SPME\Shared\ValueObject\StringValueObject',
            'puesto'             => 'SPME\Shared\ValueObject\StringValueObject',
            'area'               => 'SPME\Shared\ValueObject\StringValueObject',
            'last_ip'            => 'SPME\Shared\ValueObject\StringValueObject',
            'last_login_attempt' => 'SPME\Shared\ValueObject\DateTimeValueObject',
            'login_attempts'     => 'SPME\Shared\ValueObject\IntValueObject',
            'ban_reason'         => 'SPME\Shared\ValueObject\StringValueObject',
            'logged_at'          => 'SPME\Shared\ValueObject\DateTimeValueObject',
        ]);


        if ( !is_null($newQueryManager) ) {
            parent::__construct($repository, $params, $newQueryManager);
        }
        else {
            parent::__construct($repository, $params);
        }
    }


}