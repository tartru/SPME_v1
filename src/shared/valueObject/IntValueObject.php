<?php
/**
 * IntValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;


class IntValueObject extends ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var Int
         * @access protected
         */
        protected ?Int $value;

    //---------------------------  Parámeters  ---------------------------

    

    //---------------------------  Constructors  ---------------------------

        /**
         * Transform the value to the type of the inner value
         * 
         * @param Mixed $newValue
         * @return Mixed
         */
        protected static function toInnerValueType(Mixed $newValue): Mixed {
            if ( is_numeric($newValue) ) {
                return (Int)$newValue;
            }

            if ( is_bool($newValue) ) {
                return ($newValue) ? 1 : 0;
            }

            if ( is_null($newValue) ) {
                return $newValue;
            }

            if ( is_string($newValue) ) {
                //$t_newValue = str_replace(["'",","," ","$","%"],'',$newValue);
                $t_newValue = filter_var($newValue, FILTER_SANITIZE_NUMBER_INT);
                $t_newValue = intval($t_newValue);
                if ( is_numeric($t_newValue) ) {
                    return (Int)$t_newValue;
                }
            }

            throw new ValueObjectException('invalidTypeIntException', value: $newValue);
        }


        /**
         * Creates a new IntValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValue(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeIntException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue));
        }


        public function __construct(?Int $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  Comparison  ---------------------------

        /**
         * Greater than or equal to
         * 
         * @param self | Int | Float $otherValue
         * @return Bool
         */
        public function min(self | Int | Float $otherValue): Bool {
            if ( $this->isNull() ) {
                throw new ValueObjectException('compareNullException');
            }

            $otherValue = ( is_int($otherValue) || is_float($otherValue) ) ? $otherValue : $otherValue->value();

            if ( $this->value() >= $otherValue ) {
                return true;
            }

            return false;
        }


        /**
         * Less than or equal to
         * 
         * @param self | Int | Float $otherValue
         * @return Bool
         */
        public function max(self | Int | Float $otherValue): Bool {
            if ( $this->isNull() ) {
                throw new ValueObjectException('compareNullException');
            }

            $otherValue = ( is_int($otherValue) || is_float($otherValue) ) ? $otherValue : $otherValue->value();

            if ( $this->value() <= $otherValue ) {
                return true;
            }

            return false;
        }


        /**
         * Between two numbers
         * 
         * @param self | Int | Float $min
         * @param self | Int | Float $max
         * @return Bool
         */
        public function between(self | Int | Float $min, self | Int | Float $max): Bool {
            if ( $this->isNull() ) {
                throw new ValueObjectException('compareNullException');
            }

            $min = ( is_int($min) || is_float($min) ) ? $min : $min->value();
            $max = ( is_int($max) || is_float($max) ) ? $max : $max->value();

            if ( $this->value() >= $min && $this->value() <= $max ) {
                return true;
            }

            return false;
        }

    //---------------------------  Comparison  ---------------------------



    //---------------------------  Validations  ---------------------------

        /**
         * Valid the data type
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        static protected function isTypeValid(Mixed $newValue): Bool {
            if ( !is_int($newValue) && !is_float($newValue) && !is_string($newValue) && !is_bool($newValue) && !is_null($newValue) ) {
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

            if ( !is_null($newValue) ) {
                if ( isset($this->validation_rules['In']) && !$this->validIn($newValue,$this->validation_rules['In']) ) {
                    throw new ValueObjectException('validInException', value: $newValue);
                }
    
                if ( isset($this->validation_rules['NotIn']) && !$this->validNotIn($newValue,$this->validation_rules['NotIn']) ) {
                    throw new ValueObjectException('validNotInException', value: $newValue);
                }
    
                if ( isset($this->validation_rules['Min']) && !$this->validMin($newValue,$this->validation_rules['Min']) ) {
                    throw new ValueObjectException('validMinException', value: $newValue, refValue_1: $this->validation_rules['Min']);
                }
    
                if ( isset($this->validation_rules['Max']) && !$this->validMax($newValue,$this->validation_rules['Max']) ) {
                    throw new ValueObjectException('validMaxException', value: $newValue, refValue_1: $this->validation_rules['Max']);
                }
    
                if ( isset($this->validation_rules['Between']) && !$this->validBetween($newValue,$this->validation_rules['Between'][0],$this->validation_rules['Between'][1]) ) {
                    throw new ValueObjectException('validBetweenException', value: $newValue, refValue_1: $this->validation_rules['Between'][0], refValue_2: $this->validation_rules['Between'][1]);
                }

                if ( isset($this->validation_rules['Equals']) && !$this->validEquals($newValue,$this->validation_rules['Equals']) ) {
                    throw new ValueObjectException('validEqualsException', value: $newValue, refValue_1: $this->validation_rules['Equals']);
                }

                if ( isset($this->validation_rules['NotEquals']) && !$this->validNotEquals($newValue,$this->validation_rules['NotEquals']) ) {
                    throw new ValueObjectException('validNotEqualsException', value: $newValue, refValue_1: $this->validation_rules['NotEquals']);
                }
            }

            return true;
        }



        /**
         * Valid Min
         * 
         * @param Int $newValue
         * @param Int $minValue
         * @return Bool
         */
        protected function validMin(Int $newValue, Int $minValue): Bool {
            if ( $newValue >= $minValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Max
         * 
         * @param Int $newValue
         * @param Int $maxValue
         * @return Bool
         */
        protected function validMax(Int $newValue, Int $maxValue): Bool {
            if ( $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Between
         * 
         * @param Int $newValue
         * @param Int $minValue
         * @param Int $maxValue
         * @return Bool
         */
        protected function validBetween(Int $newValue, Int $minValue, Int $maxValue): Bool {
            if ( $newValue >= $minValue && $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }

    //---------------------------  Validations  ---------------------------

}