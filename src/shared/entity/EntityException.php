<?php
/**
 * EntityException
 * 
 * Entity exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Entity;

use Exception;
use RuntimeException;


class EntityException extends RuntimeException {

    /**
     * Errors
     * 
     * @var Array
     * @access private
     */
    private Array $exception_types = [
        'functionNotDefinedException' => 'La función no está definida',
        'idsMismatchException'        => 'El id o los ids no concuerdan',
        'QueryManagerNullException'   => 'El manejador de consultas (QueryManager) es nulo',
    ];


    public function __construct($message, $code = 0, Exception $previous = null) {
        
        if ( !empty($this->exception_types[$message]) ) {
            $finalMessage = "{$message}: {$this->exception_types[$message]}";
        }
        else {
            $finalMessage = $message;
        }

        parent::__construct($finalMessage, $code, $previous);
    }

}