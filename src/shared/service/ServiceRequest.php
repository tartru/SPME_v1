<?php
/**
 * ServiceRequest
 * 
 * This classs helps to send the request from the controller to the service
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Service;

use SPME\Shared\Library\Validator;


class ServiceRequest {

    //---------------------------  Parámeters  ---------------------------

        /**
         * Validator
         * 
         * @var Validator
         * @access private
         */
        private Validator $validator;

    //---------------------------  Parámeters  ---------------------------



    /**
     * Constructor
     * 
     * @param Array $newParameters
     * @param Array $newHeaders
     */
    public function __construct (
        /**
         * Array with the parameters 
         * 
         * @var Array
         * @access private
         */
        private Array $parameters = [],

        /**
         * Array with dependencies
         * 
         * @var Array
         * @access private
         */
        private Array $dependencies = [],

        /**
         * Array with the header info
         * 
         * @var Array
         * @access private
         */
        private Array $headers = []
    ) {}


    /**
     * Gets the parameters
     * 
     * @param Array | String | Null $keys
     * @return Mixed
     */
    public function getParameters($keys = null): Mixed {
        if ( empty($keys) ) {
            return $this->parameters;
        }
        
        else {
            try {
                return $this->getFromKeys($this->parameters,$keys);
            }
            catch ( \RuntimeException $e ) {
                return null;
            }
        }
    }


    /**
     * Gets only the parameters in the list and return them as array
     * 
     * @param Array | String | Null $only
     * @return Mixed
     */
    public function getOnlyThisParameters($only = null): Mixed {
        if ( empty($only) ) {
            return $this->parameters;
        }

        elseif ( is_string($only) ) {
            try {
                return $this->getFromKeys($this->parameters,$only);
            }
            catch ( \RuntimeException $e ) {
                return null;
            }
        }
        
        else {
            try {
                $data = [];

                foreach ( $only as $keys ) {
                    $data[$keys] = $this->getFromKeys($this->parameters,$keys);
                }

                return $data;
            }
            catch ( \RuntimeException $e ) {
                return null;
            }
        }
    }


    /**
     * Gets the dependencies
     * 
     * @param Array | String | Null $keys
     * @return Mixed
     */
    public function getDependencies($keys = null): Mixed {
        if ( empty($keys) ) {
            return $this->dependencies;
        }
        
        else {
            try {
                return $this->getFromKeys($this->dependencies,$keys);
            }
            catch ( \RuntimeException $e ) {
                return null;
            }
        }
    }


    /**
     * Gets the headers
     * 
     * @param Array | String | Null $keys
     * @return Mixed
     */
    public function getHeaders($keys = null): Mixed {
        if ( empty($keys) ) {
            return $this->headers;
        }
        
        else {
            try {
                return $this->getFromKeys($this->headers,$keys);
            }
            catch ( \RuntimeException $e ) {
                return null;
            }
        }
    }


    /**
     * Validates the parameters
     * 
     * @param Array $newValidationRules
     * @return Bool
     */
    public function validate(Array $newValidationRules): Bool {
        $this->validator = new Validator($newValidationRules);

        return $this->validator->validate($this->parameters);
    }


    /**
     * Returns the erros from the validation
     * 
     * @param Bool $asHTML
     * @param String $prefix
     * @param String $suffix
     * @return Array | String
     */
    public function getErrors(Bool $asHTML = false, String $prefix = '<p class="parameter-error" data-route-keys=":routeKeys">', String $suffix = '</p>'): Array | String {
        if ( empty($this->validator) ) {
            throw new ServiceException('undefinedValidatorException');
        }

        return $this->validator->getErrors($asHTML,$prefix,$suffix);
    }


    /**
     * Validate the dependencies
     * 
     * @param Array | String $dependencies
     * @return Bool
     */
    public function validateDependencies(Array | String $dependencies): Bool {
        if ( is_string($dependencies) ) {
            $dependencies = [$dependencies];
        }

        if ( count(array_intersect_key($this->dependencies, array_flip($dependencies))) != count($dependencies) ) {
            throw new ServiceException('dependencyMissingException');
        }

        return true;
    }



    //---------------------------  Auxiliary functions  ---------------------------

        /**
         * Returns an element, list, table or tensor by keys
         * 
         * @param Array $data
         * @param Array | String $keys
         * @return Mixed
         */
        private function getFromKeys(Array $data, Array | String $keys): Mixed {
            if ( is_string($keys) ) {
                $keys = str_replace('\.','~|~',$keys);
                $keys = explode('.',$keys);
                $keys = array_map(fn($t_key) => str_replace('~|~','.',$t_key),$keys);
            }
    
            foreach ( $keys as $key ) {
                if ( is_array($data) && array_key_exists($key,$data) ) {
                    $data = $data[$key];
                }
                else {
                    throw new \RuntimeException('Elemento no encontrado');
                }
            }

            return $data;
        }

    //---------------------------  Auxiliary functions  ---------------------------

}