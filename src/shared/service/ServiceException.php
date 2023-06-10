<?php
/**
 * ServiceException
 * 
 * Service exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Service;

use Exception;
use RuntimeException;


class ServiceException extends RuntimeException {

    /**
     * Errors
     * 
     * @var Array
     * @access private
     */
    private Array $exception_types = [
        'commandNotDefinedException'  => 'El comando no está definido',
        'paramMissingException'       => 'Faltan parámetros necesarios para este servicio',
        'headerMissingException'      => 'Falta información de la cabecera necesaria para este servicio',
        'dependencyMissingException'  => 'Faltan dependencias necesarias para este servicio',
        'undefinedValidatorException' => 'El validador no se ha generado',
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