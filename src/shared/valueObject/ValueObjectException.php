<?php
/**
 * ValueObjectException
 * 
 * ValueObject exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;

use Exception;
use InvalidArgumentException;


class ValueObjectException extends InvalidArgumentException {

    /**
     * Errors
     * 
     * @var Array
     * @access private
     */
    private Array $exception_types = [
        'invalidTypeException' => 'El tipo de dato no es válido. Se recibió ({type}) "{value}"',

        'compareNullException' => 'No se pueden realizar comparaciones con el valor por que es NULL',
        'actionNullException'  => 'No se pueden realizar acciones sobre el valor por que es NULL',

        'invalidTypeBoolException'       => 'El dato no es válido. Se esperaba Bool y se recibió ({type}) "{value}"',
        'invalidTypeIntException'        => 'El dato no es válido. Se esperaba Int y se recibió ({type}) "{value}"',
        'invalidTypeFloatException'      => 'El dato no es válido. Se esperaba Float o Double y se recibió ({type}) "{value}"',
        'invalidTypeStringException'     => 'El dato no es válido. Se esperaba String y se recibió ({type}) "{value}"',
        'invalidTypeDateTimeException'   => 'El dato no es válido. Se esperaba DateTime y se recibió ({type}) "{value}"',
        'invalidDateTimeFormatException' => '"{value}" No tiene un formato de fecha - hora válido',

        'validRequiredException'       => 'El dato no puede ser nulo',
        'validInException'             => 'El valor "{value}" no se encuentra entre los valores permitidos',
        'validNotInException'          => 'El valor "{value}" se encuentra entre los valores no permitidos',
        'validMinException'            => 'El valor "{value}" es menor a {refValue_1}',
        'validMaxException'            => 'El valor "{value}" es mayor a {refValue_1}',
        'validBetweenException'        => 'El valor "{value}" no está entre {refValue_1} y {refValue_2}',
        'validStringRequiredException' => 'El dato no puede ser nulo ni vacío',
        'validStringMinException'      => 'El largo de {value} es menor a {refValue_1}',
        'validStringMaxException'      => 'El largo de {value} es mayor a {refValue_1}',
        'validStringBetweenException'  => 'El largo de {value} no está entre {refValue_1} y {refValue_2}',
        'validStringSizeException'     => 'El largo de {value} no es igual a {refValue_1}',
        'validEqualsException'         => 'El valor "{value}" no es igual a "{refValue_1}"',
        'validNotEqualsException'      => 'El valor "{value}" no puede ser igual a "{refValue_1}"',
        'validIncludesException'       => 'El valor "{value}" debe incluir "{refValue_1}"',
        'validNotIncludesException'    => 'El valor "{value}" no debe incluir "{refValue_1}"',
        'validStartsWithException'     => 'El valor "{value}" debe iniciar con "{refValue_1}"',
        'validEndsWithException'       => 'El valor "{value}" debe finalizar con "{refValue_1}"',
        'validEmailException'          => 'El valor "{value}" no es un correo válido',
        'validUrlException'            => 'El valor "{value}" no es una URL válida',
        'validRegexException'          => 'El valor "{value}" no cumple con la condición "{refValue_1}"',
        'validNotRegexException'       => 'El valor "{value}" no debe tener el patrón "{refValue_1}"',
    ];


    public function __construct($message, $code = 0, Exception $previous = null, Mixed $value = null, Mixed $refValue_1 = null, Mixed $refValue_2 = null) {
        
        //Mensaje predefinido?
            if ( !empty($this->exception_types[$message]) ) {
                $finalMessage = "{$message}: {$this->exception_types[$message]}";
            }
            else {
                $finalMessage = $message;
            }
        //Mensaje predefinido?

        //Manda valor
            if ( !is_null($value) ) {
                $finalMessage = str_replace("{type}",gettype($value),$finalMessage);
                $finalMessage = str_replace("{value}",(String)$value,$finalMessage);
            }
        //Manda valor

        //Manda referencia
            if ( !is_null($refValue_1) ) {
                $finalMessage = str_replace("{type_ref_1}",gettype($refValue_1),$finalMessage);
                $finalMessage = str_replace("{refValue_1}",(String)$refValue_1,$finalMessage);
            }

            if ( !is_null($refValue_2) ) {
                $finalMessage = str_replace("{type_ref_2}",gettype($refValue_2),$finalMessage);
                $finalMessage = str_replace("{refValue_2}",(String)$refValue_2,$finalMessage);
            }
        //Manda referencia

        parent::__construct($finalMessage, $code, $previous);
    }

}