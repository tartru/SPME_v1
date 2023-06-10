<?php
/**
 * CnfDbApiRepositoryException
 * 
 * CnfDbApiRepository exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\Repository;


class CnfDbApiRepositoryException extends RepositoryException {

    /**
     * Errors
     * 
     * @var Array
     * @access private
     */
    private Array $exception_types = [
        'urlNotValidException'       => 'La url no es válida',
        'ephyloneNotValidException'  => 'El valor de Ephylone no es válido',
        'emptyQueryException'        => 'La cadena de consulta no puede estar vacía',
        'emptyTableException'        => 'El nombre de la tabla no puede estar vacío',
        'tableNotValidException'     => 'El nombre de la tabla no es válido',
        'emptyColumnException'       => 'El nombre de la columna no puede estar vacío',
        'columnNotValidException'    => 'El nombre de la columna no es válido',
        'invalidColumnTypeException' => 'El tipo de la columna no es válido',
        'emptyDataException'         => 'No se recibió información a registrar',
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