<?php
/**
 * BoolValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;


class BoolValueObject extends ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var Bool
         * @access protected
         */
        protected ?Bool $value;
    
    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        /**
         * Transform the value to the type of the inner value
         * 
         * @param Mixed $newValue
         * @return Mixed
         */
        protected static function toInnerValueType(Mixed $newValue): Mixed {
            if ( is_bool($newValue) ) {
                return $newValue;
            }

            if ( is_numeric($newValue) ) {
                $number = (Int)$newValue;

                if ( $number < 1 ) {
                    return false;
                }

                return true;
            }

            if ( is_string($newValue) ) {
                $newValue      = trim($newValue);
                $newValueLower = strtolower($newValue);
                if ( empty($newValue) || $newValueLower == 'false' || $newValueLower == 'off' || $newValueLower == 'no' ) {
                    return false;
                }

                return true;
            }

            if ( is_null($newValue) ) {
                return $newValue;
            }

            throw new ValueObjectException('invalidTypeBoolException', value: $newValue);
        }


        /**
         * Creates a new BoolValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValue(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeBoolException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue));
        }


        public function __construct(?Bool $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  IO  ---------------------------

        /**
         * To String
         * 
         * @return String
         */
        public function __toString(): String {
            if ( $this->isNull() ) {
                return 'NULL';
            }
            
            return ($this->value()) ? 'TRUE' : 'FALSE';
        }

    //---------------------------  IO  ---------------------------



    //---------------------------  Actions  ---------------------------

        /**
         * Toggle the value
         * 
         * @return self
         */
        public function toggle(): self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            return new static(!$this->value());
        }

    //---------------------------  Actions  ---------------------------



    //---------------------------  Validations  ---------------------------

        /**
         * Valid the data type
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        static protected function isTypeValid(Mixed $newValue): Bool {
            if ( !is_int($newValue) && !is_string($newValue) && !is_bool($newValue) && !is_null($newValue) ) {
                return false;
            }

            return true;
        }


        /**
         * Valid the value according to the rules
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        protected function isValid(Mixed $newValue): Bool {
            if ( isset($this->validation_rules['Required']) && !$this->validRequired($newValue) ) {
                throw new ValueObjectException('validRequiredException');
            }

            return true;
        }

    //---------------------------  Validations  ---------------------------

}