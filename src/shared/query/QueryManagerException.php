<?php
/**
 * QueryManagerException
 * 
 * QueryManager exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Query;

use Exception;
use RuntimeException;


class QueryManagerException extends RuntimeException {

    /**
     * Errors
     * 
     * @var Array
     * @access private
     */
    private Array $exception_types = [
        'emptyIdentifierException'         => 'El identificador no es válido. No puede estar vacío y solo puede ser String o Integer',
        'notValidIdentifierException'      => 'El identificador no es válido. No puede estar vacío y solo puede ser String o Integer',
        'emptyQueryListException'          => 'La lista de consultas no puede estar vacía',
        'notValidQueryListException'       => 'La lista de consultas no es válida',
        'queryConstantNotDefinedException' => 'La constante no está definida',
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