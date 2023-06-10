<?php
/**
 * Validator
 * 
 * Options:
 * 
 * required
 * in:opt_1,opt_2...
 * not_in:opt_1,opt_2,...
 * numeric
 * integer
 * min:value
 * max:value
 * between:value_1,value_2
 * equal:value
 * not_equal:value
 * size:value
 * includes:value
 * not_includes:value
 * starts_with:string
 * ends_with:string
 * email
 * url
 * regex:value
 * not_regex
 * before:date
 * before_or_equal:date
 * after:date
 * after_or_equal:date
 * 
 * equal_to:parameter
 * required_if:parameter[,value]
 * prohibited_if:parameter[,value]
 * exists:vo,vo_instance,column | exists:service,service_name,parameter_name
 * unique:vo,vo_instance,column | exists:service,service_name,parameter_name
 * 
 * file_type:type
 * mime_types:opt_1[,opt_2,...]
 * file_min_size:value
 * file_max_size:value
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Library;

use DateTime;


class Validator {

    /**
     * Validation rules
     * 
     * Options:
     * 
     * required: not null
     * 
     * @var Array
     * @access protected
     */
    protected Array $validation_rules;


    /**
     * Validation erros
     * 
     * @var Array
     *@access protected
     */
    protected Array $errors;


    /**
     * Catalog of errors
     * 
     * @var Array
     *@access protected
     */
    protected Array $errorCatalog = [
        'required'        => 'El campo `:field` es requerido.',
        'in'              => 'El campo `:field` no se encuentra entre los valores permitidos.',
        'not_in'          => 'El campo `:field` se encuentra entre los valores no permitidos.',
        'numeric'         => 'El campo `:field` debe ser numérico.',
        'integer'         => 'El campo `:field` debe ser número entero.',
        'min'             => 'El campo `:field` debe ser mayor o igual a :value_1.',
        'max'             => 'El campo `:field` debe ser menor o igual a :value_1.',
        'between'         => 'El campo `:field` debe estar entre :value_1 y :value_2.',
        'equal'           => 'El campo `:field` debe ser igual a ":value_1".',
        'not_equal'       => 'El campo `:field` no debe ser igual a ":value_1".',
        'string_min'      => 'El largo del campo `:field` (:value_1) debe ser mayor o igual a :value_2.',
        'string_max'      => 'El largo del campo `:field` (:value_1) debe ser menor o igual a :value_2.',
        'string_between'  => 'El largo del campo `:field` (:value_1) debe estar entre :value_2 y :value_3.',
        'string_size'     => 'El largo del campo `:field` (:value_1) debe ser igual a :value_2.',
        'includes'        => 'El campo `:field` debe incluir ":value_1".',
        'not_includes'    => 'El campo `:field` no debe incluir ":value_1".',
        'starts_with'     => 'El campo `:field` debe comenzar con ":value_1".',
        'ends_with'       => 'El campo `:field` debe finalizar con ":value_1".',
        'email'           => 'El campo `:field` debe ser un correo válido.',
        'url'             => 'El campo `:field` debe ser una url válida.',
        'regex'           => 'El campo `:field` no cumple con la condición ":value_1".',
        'not_regex'       => 'El campo `:field` no debe tener el patrón ":value_1".',
        'before'          => 'El campo `:field` (fecha/hora) debe ser anterior a ":value_1".',
        'before_or_equal' => 'El campo `:field` (fecha/hora) debe ser anterior o igual a ":value_1".',
        'after'           => 'El campo `:field` (fecha/hora) debe ser posterior a ":value_1".',
        'after_or_equal'  => 'El campo `:field` (fecha/hora) debe ser posterior o igual a ":value_1".',
        'equal_to'        => 'El campo `:field` debe ser igual al campo `:value_1`.',
        'required_if'     => 'El campo `:field` es requerido.',
        'prohibited_if'   => 'El campo `:field` no se debe enviar.',
        'exists'          => 'El valor del campo `:field` no está registrado.',
        'unique'          => 'El valor del campo `:field` está repetido.',
        'file_type'       => 'El archivo ":value_1" del campo `:field` no es de un tipo válido (:value_2).',
        'mime_types'      => 'El archivo ":value_1" del campo `:field` no es de un mime válido (:value_2).',
        'file_min_size'   => 'El tamaño del archivo ":value_1" del campo `:field` debe ser mayor o igual a :value_2.',
        'file_max_size'   => 'El tamaño del archivo ":value_1" del campo `:field` debe ser menor o igual a :value_2.',
    ];


    /**
     * Construct
     * 
     * @param Array $newValidationRules
     */
    public function __construct(Array $newValidationRules) {
        $this->setValidationRules($newValidationRules);
        $this->setErrors();
    }


    /**
     * Sets the errors
     * 
     * @param ?Array $newErrors
     */
    private function setErrors(?Array $newErrors = null) {
        if ( empty($newErrors) ) {
            $this->errors = [];
        }

        else {
            $this->errors = $newErrors;
        }
    }


    /**
     * Adds an error to the list
     * 
     * @param String $newError
     * @param Array | String $positionKeys
     * @param Mixed $value_1
     * @param Mixed $value_2
     * @param Mixed $value_3
     */
    private function addError(String $newError, Array | String $positionKeys, Mixed $value_1 = Null, Mixed $value_2 = Null, Mixed $value_3 = Null) {
        if ( !isset($this->errorCatalog[$newError]) ) {
            $this->errors[] = $newError;
        }

        else {
            $routeKeys = implode('.',$positionKeys);
            $tags      = [':field', ':value_1', ':value_2', ':value_3'];
            $values    = [$routeKeys, $value_1, $value_2, $value_3];
            $errorMsg  = str_replace($tags, $values, $this->errorCatalog[$newError]);

            $this->errors[$routeKeys] = $errorMsg;
        }
        
    }


    /**
     * Return the errors
     * 
     * @param Bool $asHTML
     * @param String $prefix
     * @param String $suffix
     * @return Array | String
     */
    public function getErrors(Bool $asHTML = false, String $prefix = '<p class="parameter-error" data-route-keys=":routeKeys">', String $suffix = '</p>'): Array | String {
        if ( !$asHTML ) {
            return $this->errors;
        }

        else {
            $salida = '';

            foreach ( $this->errors as $routeKeys => $t_error ) {
                $salida .= str_replace(':routeKeys',$routeKeys,$prefix) . $t_error . $suffix;
            }
            return $salida;
            //return $prefix . implode($suffix.$prefix, $this->errors) . $suffix;
        }
    }


    /**
     * Sets the rules
     * 
     * @param Array $newValidationRules
     */
    private function setValidationRules(Array $newValidationRules) {
        foreach ( $newValidationRules as $param => $rules ) {
            $newRule = [
                'param' => [],
                'rules' => [],
            ];
            
            //Params
                $param_sep = str_replace('\.','~|~',$param);
                $param_sep = explode('.',$param_sep);
                $param_sep = array_map(fn($t_parameter) => str_replace('~|~','.',$t_parameter),$param_sep);

                $newRule['param'] = $param_sep;
            //Params

            //Rules
                if ( is_string($rules) ) {
                    $rules = str_replace('\|','~.~',$rules);
                    $rules = explode('|',$rules);
                    $rules = array_map(fn($t_rule) => str_replace('~.~','|',$t_rule),$rules);

                    foreach ( $rules as $t_rule ) {
                        $t_rule = explode(':',$t_rule);
                        if ( count($t_rule) > 1 ) {
                            $t_rule[1] = implode(':', array_slice($t_rule,1));
                        }

                        if ( isset($t_rule[1]) ) {
                            $newRule['rules'][strtolower($t_rule[0])] = explode(',',$t_rule[1]);
                        }

                        else {
                            $newRule['rules'][strtolower($t_rule[0])] = true;
                        }
                    }
                }

                elseif ( is_array($rules) ) {
                    foreach ( $rules as $t_rule_name => $t_rule ) {
                        $newRule['rules'][$t_rule_name] = $t_rule;
                    }
                }
            //Rules

            $this->validation_rules[] = $newRule;
        }
    }


    /**
     * Returns a parameter from an array searching by keys
     *
     * @param Array $params
     * @param Array | String $keys
     * @return Mixed
     */
    private function getParameterFromKeys(Array $params, Array | String $keys) {
        if ( is_string($keys) ) {
            $keys = str_replace('\.','~|~',$keys);
            $keys = explode('.',$keys);
            $keys = array_map(fn($t_key) => str_replace('~|~','.',$t_key),$keys);
        }

        foreach ( $keys as $key ) {
            if ( is_array($params) && array_key_exists($key,$params) ) {
                $params = $params[$key];
            }
            else {
                throw new \RuntimeException('No existe el parámetro buscado');
                return false;
            }
        }
        return $params;
    }


    /**
     * Validate the parameters
     * 
     * @param Array $parameters
     * @return Bool
     */
    public function validate(Array $parameters): Bool {
        $this->setErrors();

        foreach ( $this->validation_rules as $rules ) {
            $first = reset($rules['param']);
            $this->applyRule($parameters, $rules['param'], [$first], $rules['rules']);
        }

        if ( count($this->errors) ) {
            return false;
        }

        return true;
    }



    /**
     * Apply the rules to a parámeter
     * 
     * @param Array $parameters
     * @param Array $keys
     * @param Array $currentKeys
     * @param Array $rules
     */
    private function applyRule(Mixed $parameters, Array $keys, Array $currentKeys, Array $rules): Bool {
        try{
            $currentParameters = $this->getParameterFromKeys($parameters, $currentKeys);
        } catch( \RuntimeException $e ) {
            $currentParameters = null;
        }
        
        $countCurrentKeys  = count($currentKeys);

        if ( is_array($currentParameters) && count($keys) > $countCurrentKeys ) {
            $current = $keys[$countCurrentKeys];

            //Select all the parameters in the array in this dimension
                if ( $current == '*' ) {
                    foreach ( $currentParameters as $currentKey => $parameter ) {
                        $this->applyRule($parameters, $keys, array_merge($currentKeys,[$currentKey]), $rules);
                    }
                }
            //Select all the parameters in the array in this dimension

            //Selects one parameter in the array
                elseif ( isset($currentParameters[$current]) ) {
                    $this->applyRule($parameters, $keys, array_merge($currentKeys,[$current]), $rules);
                }
            //Selects one parameter in the array

            //The parameter doesn't exists
                else {
                    if ( isset($rules['required']) ) {
                        $this->addError('required', array_merge($currentKeys,[$current]));
                    }

                    if ( isset($rules['required_if']) ) {
                        $this->validRequiredIf(null,$parameters,array_merge($currentKeys,[$current]),$rules['required_if']);
                    }
                }
            //The parameter doesn't exists
        }

        elseif ( !is_array($currentParameters) && count($keys) == $countCurrentKeys ) {
            foreach ( $rules as $rule => $r_options ) {
                match ( $rule ) {
                    'required'        => $this->validRequired($currentParameters,$currentKeys),
                    'in'              => (!is_null($currentParameters)) ? $this->validIn($currentParameters,$currentKeys,$r_options) : true,
                    'not_in'          => (!is_null($currentParameters)) ? $this->validNotIn($currentParameters,$currentKeys,$r_options) : true,
                    'numeric'         => (!is_null($currentParameters)) ? $this->validNumeric($currentParameters,$currentKeys) : true,
                    'integer'         => (!is_null($currentParameters)) ? $this->validInteger($currentParameters,$currentKeys) : true,
                    'min'             => (!is_null($currentParameters)) ? $this->validMin($currentParameters,$currentKeys,$r_options) : true,
                    'max'             => (!is_null($currentParameters)) ? $this->validMax($currentParameters,$currentKeys,$r_options) : true,
                    'between'         => (!is_null($currentParameters)) ? $this->validBetween($currentParameters,$currentKeys,$r_options) : true,
                    'equal'           => (!is_null($currentParameters)) ? $this->validEqual($currentParameters,$currentKeys,$r_options) : true,
                    'not_equal'       => (!is_null($currentParameters)) ? $this->validNotEqual($currentParameters,$currentKeys,$r_options) : true,
                    'size'            => (!is_null($currentParameters)) ? $this->validSize($currentParameters,$currentKeys,$r_options) : true,
                    'includes'        => (!is_null($currentParameters)) ? $this->validIncludes($currentParameters,$currentKeys,$r_options) : true,
                    'not_includes'    => (!is_null($currentParameters)) ? $this->validNotIncludes($currentParameters,$currentKeys,$r_options) : true,
                    'starts_with'     => (!is_null($currentParameters)) ? $this->validStartsWith($currentParameters,$currentKeys,$r_options) : true,
                    'ends_with'       => (!is_null($currentParameters)) ? $this->validEndsWith($currentParameters,$currentKeys,$r_options) : true,
                    'email'           => (!is_null($currentParameters)) ? $this->validEmail($currentParameters,$currentKeys) : true,
                    'url'             => (!is_null($currentParameters)) ? $this->validUrl($currentParameters,$currentKeys) : true,
                    'regex'           => (!is_null($currentParameters)) ? $this->validRegex($currentParameters,$currentKeys,$r_options) : true,
                    'not_regex'       => (!is_null($currentParameters)) ? $this->validNotRegex($currentParameters,$currentKeys,$r_options) : true,
                    'before'          => (!is_null($currentParameters)) ? $this->validBefore($currentParameters,$currentKeys,$r_options) : true,
                    'before_or_equal' => (!is_null($currentParameters)) ? $this->validBeforeOrEqual($currentParameters,$currentKeys,$r_options) : true,
                    'after'           => (!is_null($currentParameters)) ? $this->validAfter($currentParameters,$currentKeys,$r_options) : true,
                    'after_or_equal'  => (!is_null($currentParameters)) ? $this->validAfterOrEqual($currentParameters,$currentKeys,$r_options) : true,
                    'equal_to'        => (!is_null($currentParameters)) ? $this->validEqualTo($currentParameters,$parameters,$currentKeys,$r_options) : true,
                    'required_if'     => (!is_null($currentParameters)) ? $this->validRequiredIf($currentParameters,$parameters,$currentKeys,$r_options) : true,
                    'prohibited_if'   => (!is_null($currentParameters)) ? $this->validProhibitedIf($currentParameters,$parameters,$currentKeys,$r_options) : true,
                    'exists'          => (!is_null($currentParameters)) ? $this->validExists($currentParameters,$currentKeys,$r_options) : true,
                    'unique'          => (!is_null($currentParameters)) ? $this->validUnique($currentParameters,$currentKeys,$r_options) : true,
                    default           => true,
                };
            }
        }

        return false;
    }



    //---------------------------  Validations  ---------------------------

        /**
         * Is required
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @return Bool
         */
        public function validRequired(Mixed $parameter, Array $keys): Bool {
            if ( empty($parameter) ) {
                $this->addError('required', $keys);

                return false;
            }

            return true;
        }


        /**
         * In
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validIn(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( !in_array($parameter,$options) ) {
                $this->addError('in', $keys);

                return false;
            }

            return true;
        }


        /**
         * Not In
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validNotIn(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( in_array($parameter,$options) ) {
                $this->addError('not_in', $keys);

                return false;
            }

            return true;
        }


        /**
         * Numeric
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @return Bool
         */
        public function validNumeric(Mixed $parameter, Array $keys): Bool {
            if ( !is_numeric($parameter) ) {
                $this->addError('numeric', $keys);

                return false;
            }

            return true;
        }


        /**
         * Integer
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @return Bool
         */
        public function validInteger(Mixed $parameter, Array $keys): Bool {
            if ( is_numeric($parameter) && (is_int($parameter) || (is_string($parameter) && strpos($parameter,'.') === false)) ) {
                return true;
            }

            $this->addError('integer', $keys);
            return false;
        }


        /**
         * Min
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validMin(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_int($parameter) || is_float($parameter) ) {
                if ( $parameter < $options[0] ) {
                    $this->addError('min', $keys, $options[0]);

                    return false;
                }
            }

            elseif ( is_string($parameter) ) {
                $str_len = strlen($parameter);
                if ( $str_len < $options[0] ) {
                    $this->addError('string_min', $keys, $str_len, $options[0]);

                    return false;
                }
            }

            return true;
        }


        /**
         * Max
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validMax(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_int($parameter) || is_float($parameter) ) {
                if ( $parameter > $options[0] ) {
                    $this->addError('max', $keys, $options[0]);

                    return false;
                }
            }

            elseif ( is_string($parameter) ) {
                $str_len = strlen($parameter);
                if ( $str_len > $options[0] ) {
                    $this->addError('string_max', $keys, $str_len, $options[0]);

                    return false;
                }
            }

            return true;
        }


        /**
         * Between
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validBetween(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_int($parameter) || is_float($parameter) ) {
                if ( $parameter < $options[0] || $parameter > $options[1] ) {
                    $this->addError('between', $keys, $options[0], $options[1]);

                    return false;
                }
            }

            elseif ( is_string($parameter) ) {
                $str_len = strlen($parameter);
                if ( $str_len < $options[0] || $str_len > $options[1] ) {
                    $this->addError('string_between', $keys, $str_len, $options[0], $options[1]);

                    return false;
                }
            }

            return true;
        }


        /**
         * Equal
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validEqual(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( $parameter != $options[0] ) {
                $this->addError('equal', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Not Equal
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validNotEqual(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( $parameter == $options[0] ) {
                $this->addError('not_equal', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Size
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validSize(Mixed $parameter, Array $keys, Array $options): Bool {
            $str_len = strlen($parameter);
            if ( $str_len != $options[0] ) {
                $this->addError('string_size', $keys, $str_len, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Includes
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validIncludes(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( stripos($parameter,$options[0]) === false ) {
                $this->addError('includes', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Not Includes
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validNotIncludes(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( stripos($parameter,$options[0]) !== false ) {
                $this->addError('not_includes', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Starts With
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validStartsWith(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( !str_starts_with($parameter,$options[0]) ) {
                $this->addError('starts_with', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Ends With
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validEndsWith(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( !str_ends_with($parameter,$options[0]) ) {
                $this->addError('ends_with', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Email
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @return Bool
         */
        public function validEmail(Mixed $parameter, Array $keys): Bool {
            if ( !filter_var($parameter, FILTER_VALIDATE_EMAIL) ) {
                $this->addError('email', $keys);

                return false;
            }

            return true;
        }


        /**
         * Url
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @return Bool
         */
        public function validUrl(Mixed $parameter, Array $keys): Bool {
            if ( !filter_var($parameter, FILTER_VALIDATE_URL) ) {
                $this->addError('url', $keys);

                return false;
            }

            return true;
        }


        /**
         * Regex
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validRegex(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( !preg_match($parameter,$options[0]) ) {
                $this->addError('regex', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Not Regex
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validNotRegex(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( preg_match($parameter,$options[0]) ) {
                $this->addError('not_regex', $keys, $options[0]);

                return false;
            }

            return true;
        }


        /**
         * Before
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validBefore(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_numeric($parameter) ) {
                $d_parameter = (new DateTime)->setTimestamp((int)$newValue);
            }
            elseif ( is_string($parameter) ) {
                $d_parameter = date_create($parameter);
            }
            if ( !$d_parameter ) {
                $this->addError('before', $keys, $options[0]);

                return false;
            }


            if ( is_numeric($options[0]) ) {
                $d_limit = (new DateTime)->setTimestamp((int)$options[0]);
            }
            elseif ( is_string($options[0]) ) {
                $d_limit = date_create($options[0]);
            }
            if ( !$d_limit ) {
                $this->addError('before', $keys, $options[0]);

                return false;
            }

            if ( $d_parameter >= $d_limit ) {
                $this->addError('before', $keys, $options[0]);

                return false;
            }


            return true;
        }


        /**
         * Before Or Equal
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validBeforeOrEqual(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_numeric($parameter) ) {
                $d_parameter = (new DateTime)->setTimestamp((int)$parameter);
            }
            elseif ( is_string($parameter) ) {
                $d_parameter = date_create($parameter);
            }
            if ( !$d_parameter ) {
                $this->addError('before_or_equal', $keys, $options[0]);

                return false;
            }


            if ( is_numeric($options[0]) ) {
                $d_limit = (new DateTime)->setTimestamp((int)$options[0]);
            }
            elseif ( is_string($options[0]) ) {
                $d_limit = date_create($options[0]);
            }
            if ( !$d_limit ) {
                $this->addError('before_or_equal', $keys, $options[0]);

                return false;
            }

            if ( $d_parameter > $d_limit ) {
                $this->addError('before_or_equal', $keys, $options[0]);

                return false;
            }


            return true;
        }


        /**
         * After
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validAfter(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_numeric($parameter) ) {
                $d_parameter = (new DateTime)->setTimestamp((int)$newValue);
            }
            elseif ( is_string($parameter) ) {
                $d_parameter = date_create($parameter);
            }
            if ( !$d_parameter ) {
                $this->addError('after', $keys, $options[0]);

                return false;
            }


            if ( is_numeric($options[0]) ) {
                $d_limit = (new DateTime)->setTimestamp((int)$options[0]);
            }
            elseif ( is_string($options[0]) ) {
                $d_limit = date_create($options[0]);
            }
            if ( !$d_limit ) {
                $this->addError('after', $keys, $options[0]);

                return false;
            }

            if ( $d_parameter <= $d_limit ) {
                $this->addError('after', $keys, $options[0]);

                return false;
            }


            return true;
        }


        /**
         * After Or Equal
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validAfterOrEqual(Mixed $parameter, Array $keys, Array $options): Bool {
            if ( is_numeric($parameter) ) {
                $d_parameter = (new DateTime)->setTimestamp((int)$newValue);
            }
            elseif ( is_string($parameter) ) {
                $d_parameter = date_create($parameter);
            }
            if ( !$d_parameter ) {
                $this->addError('after_or_equal', $keys, $options[0]);

                return false;
            }


            if ( is_numeric($options[0]) ) {
                $d_limit = (new DateTime)->setTimestamp((int)$options[0]);
            }
            elseif ( is_string($options[0]) ) {
                $d_limit = date_create($options[0]);
            }
            if ( !$d_limit ) {
                $this->addError('after_or_equal', $keys, $options[0]);

                return false;
            }

            if ( $d_parameter < $d_limit ) {
                $this->addError('after_or_equal', $keys, $options[0]);

                return false;
            }


            return true;
        }


        /**
         * Equal To
         * 
         * @param Mixed $parameter
         * @param Mixed $parameters
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validEqualTo(Mixed $parameter, Mixed $parameters, Array $keys, Array $options): Bool {
            try{
                $parameterToCompare = $this->getParameterFromKeys($parameters, $options[0]);
            } catch( \RuntimeException $e ) {
                $this->addError('required', $options[0]);

                return false;
            }

            if ( $parameter != $parameterToCompare ) {
                $this->addError('equal_to', $keys, $options[0]);

                return false;
            }


            return true;
        }


        /**
         * Required If
         * 
         * @param Mixed $parameter
         * @param Mixed $parameters
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validRequiredIf(Mixed $parameter, Mixed $parameters, Array $keys, Array $options): Bool {
            try{
                $parameterToCompare = $this->getParameterFromKeys($parameters, $options[0]);
            } catch( \RuntimeException $e ) {
                return true;
            }

            if ( !empty($parameterToCompare) && empty($parameter) && (empty($options[1]) || (!empty($options[1]) && $parameterToCompare == $options[1])) ) {
                $this->addError('required_if', $keys);

                return false;
            }


            return true;
        }


        /**
         * Prohibited If
         * 
         * @param Mixed $parameter
         * @param Mixed $parameters
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validProhibitedIf(Mixed $parameter, Mixed $parameters, Array $keys, Array $options): Bool {
            try{
                $parameterToCompare = $this->getParameterFromKeys($parameters, $options[0]);
            } catch( \RuntimeException $e ) {
                return true;
            }

            if ( !empty($parameterToCompare) && !empty($parameter) && (empty($options[1]) || (!empty($options[1]) && $parameterToCompare == $options[1])) ) {
                $this->addError('prohibited_if', $keys);

                return false;
            }


            return true;
        }


        /**
         * Exists
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validExists(Mixed $parameter, Array $keys, Array $options): Bool {
            $type = strtolower($options[0]);

            if ( $type == 'vo' && $options[1]->filter([$options[2] => $parameter])->count() == 0 ) {
                $this->addError('exists', $keys);

                return false;
            }

            elseif ( $type == 'service' ) {
                return true;
            }


            return true;
        }


        /**
         * Unique
         * 
         * @param Mixed $parameter
         * @param Array $keys
         * @param Array $options
         * @return Bool
         */
        public function validUnique(Mixed $parameter, Array $keys, Array $options): Bool {
            $type = strtolower($options[0]);

            if ( $type == 'vo' && $options[1]->filter([$options[2] => $parameter])->count() > 0 ) {
                $this->addError('unique', $keys);

                return false;
            }

            elseif ( $type == 'service' ) {
                return true;
            }


            return true;
        }

    //---------------------------  Validations  ---------------------------


}