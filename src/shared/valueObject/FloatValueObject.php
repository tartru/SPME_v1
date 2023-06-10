<?php
/**
 * FloatValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;


class FloatValueObject extends ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var Float
         * @access protected
         */
        protected ?Float $value;

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
                return (Float)$newValue;
            }

            if ( is_bool($newValue) ) {
                return ($newValue) ? 1.0 : 0.0;
            }

            if ( is_null($newValue) ) {
                return $newValue;
            }

            if ( is_string($newValue) ) {
                //$t_newValue = str_replace(["'",","," ","$","%"],'',$newValue);
                $t_newValue = filter_var($newValue, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $t_newValue = floatval($t_newValue);
                if ( is_numeric($t_newValue) ) {
                    return (Float)$t_newValue;
                }
            }

            throw new ValueObjectException('invalidTypeFloatException', value: $newValue);
        }


        /**
         * Creates a new FloatValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValue(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeFloatException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue));
        }


        /**
         * Creates a new FloatValueObject from percentage value
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromPercentage(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeFloatException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue) / 100);
        }


        public function __construct(?Float $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  IO  ---------------------------

        /**
         * Formats the number with the given parameters
         * 
         * @param Int $precision
         * @param String $dec_point
         * @param String $thousands_step
         * @return String
         */
        public function numberFormat(Int $precision = 0, String $dec_point = ".", String $thousands_step = ","): String {
            return number_format($this->value(), $precision, $dec_point, $thousands_step);
        }


        /**
         * Formats the number as percentage
         * 
         * @param ?Int $precision
         * @return String
         */
        public function percentageFormat(?Int $precision): String {
            $percentage_value = $this->value() * 100;

            if ( isset($precision) ) {
                return '% ' . number_format($percentage_value, $precision);
            }

            else {
                return '% ' . number_format($percentage_value);
            }
        }


        /**
         * Formats the number as money
         * 
         * @return String
         */
        public function moneyFormat(): String {
            return '$ ' . number_format($percentage_value, 2);
        }

    //---------------------------  IO  ---------------------------



    //---------------------------  Actions  ---------------------------

        /**
         * Round value
         * 
         * @param Int $precision
         * @return Self
         */
        public function round(Int $precision = 0): Self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            return new static( round($this->value(),$precision) );
        }


        /**
         * Ceil value
         * 
         * @return Self
         */
        public function ceil(): Self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            return new static( ceil($this->value()) );
        }


        /**
         * Floor value
         * 
         * @return Self
         */
        public function floor(): Self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            return new static( floor($this->value()) );
        }

    //---------------------------  Actions  ---------------------------



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
         * @param Float $newValue
         * @param Int | Float $minValue
         * @return Bool
         */
        protected function validMin(Float $newValue, Int | Float $minValue): Bool {
            if ( $newValue >= $minValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Max
         * 
         * @param Float $newValue
         * @param Int | Float $maxValue
         * @return Bool
         */
        protected function validMax(Float $newValue, Int | Float $maxValue): Bool {
            if ( $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Between
         * 
         * @param Float $newValue
         * @param Int | Float $minValue
         * @param Int | Float $maxValue
         * @return Bool
         */
        protected function validBetween(Float $newValue, Int | Float $minValue, Int | Float $maxValue): Bool {
            if ( $newValue >= $minValue && $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }

    //---------------------------  Validations  ---------------------------

}