<?php
/**
 * ValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;


abstract class ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var Bool
         * @access protected
         */
        private $value;


        /**
         * Validation rules
         * 
         * Options:
         * 
         * Required: not null
         * In: In list
         * NotIn: Not in list
         * Equals: Equal to value
         * NotEquals: Not equal to value
         * 
         * @var Array
         * @access protected
         */
        protected Array $validation_rules;


        /**
         * Flag that indicates if this VO needs to be sanitized
         * 
         * @var Bool
         * @access protected
         */
        protected Bool $needs_sanitize = false;

    //---------------------------  Parámeters  ---------------------------


    
    //---------------------------  Constructors  ---------------------------

        /**
         * Transform the value to the type of the inner value
         * 
         * @param Mixed $newValue
         * @return Mixed
         */
        abstract protected static function toInnerValueType(Mixed $newValue):Mixed;


        /**
         * Creates a new ValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        abstract public static function fromValue(Mixed $newValue): self;


        /**
         * Creates a new ValueObject from repoValues
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromRepository(Mixed $newValue):self {
            return new static(static::toInnerValueType($newValue));
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  IO  ---------------------------

        /**
         * Sets the value
         * 
         * @param Mixed $newValue
         */
        protected function setValue(Mixed $newValue) {
            if ( $this->isValid($newValue) ) {
                $this->value = $newValue;
            }
        }


        /**
         * Returns the value
         * 
         * @return Mixed
         */
        public function value(): Mixed {
            return $this->value;
        }


        /**
         * To String
         * 
         * @return String
         */
        public function __toString(): String {
            if ( $this->isNull() ) {
                return 'NULL';
            }

            return (String)$this->value();
        }


        /**
         * To repository
         * 
         * @return Mixed
         */
        public function toRepository(): Mixed {
            if ( $this->isNull() ) {
                return null;
            }

            return $this->value();
        }

    //---------------------------  IO  ---------------------------



    //---------------------------  Comparison  ---------------------------

        /**
         * Is null?
         * 
         * @return Bool
         */
        public function isNull(): Bool {
            if ( is_null($this->value()) ) {
                return true;
            }

            return false;
        }


        /**
         * Is not null?
         * 
         * @return Bool
         */
        public function isNotNull(): Bool {
            return !$this->isNull();
        }


        /**
         * Equal?
         * 
         * @param Mixed $otherValue
         * @return Bool
         */
        public function equals(Mixed $otherValue): Bool {
            if ( $this->value() == $this->getPrimitiveValue($otherValue) ) {
                return true;
            }

            return false;
        }


        /**
         * In list?
         * 
         * @param Array $list
         * @return Bool
         */
        public function in(Array $list): Bool {
            if ( in_array($this->value(),$list) ) {
                return true;
            }

            return false;
        }


        /**
         * Not in list?
         * 
         * @param Array $list
         * @return Bool
         */
        public function notIn(Array $list): Bool {
            if ( !in_array($this->value(),$list) ) {
                return true;
            }

            return false;
        }


        /**
         * Returns the "primitive" value for actions
         * 
         * @param Mixed $otherValue
         * @return Mixed
         */
        public function getPrimitiveValue(Mixed $otherValue): Mixed {
            if ( is_a($otherValue,get_class($this)) ) {
                $otherValue = $otherValue->value();
            }

            if ( gettype($otherValue) != gettype($this->value()) ) {
                throw new ValueObjectException('invalidTypeException', value: $otherValue);
            }

            return $otherValue;
        }

    //---------------------------  Comparison  ---------------------------



    //---------------------------  Validations  ---------------------------

        /**
         * Valid the data type
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        abstract static protected function isTypeValid(Mixed $newValue): Bool;


        /**
         * Valid the value according to the rules
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        abstract protected function isValid(Mixed $newValue): Bool;



        
        /**
         * Valid required
         * 
         * @param Mixed $newValue
         * @return Bool
         */
        protected function validRequired(Mixed $newValue): Bool {
            if ( is_null($newValue) ) {
                return false;
            }

            return true;
        }


        /**
         * Valid in list
         * 
         * @param Mixed $newValue
         * @param Array $list
         */
        protected function validIn(Mixed $newValue, Array $list): Bool {
            if ( in_array($newValue,$list) ) {
                return true;
            }

            return false;
        }


        /**
         * Valid not in list
         * 
         * @param Mixed $newValue
         * @param Array $list
         */
        protected function validNotIn(Mixed $newValue, Array $list): Bool {
            if ( !in_array($newValue,$list) ) {
                return true;
            }

            return false;
        }


        /**
         * Valid size
         * 
         * @param Mixed $newValue
         * @param Mixed $otherValue
         * @return Bool
         */
        protected function validEquals(Mixed $newValue, Mixed $otherValue): Bool {
            if ( $newValue == $otherValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Not equal to
         * 
         * @param Mixed $newValue
         * @param Mixed $otherValue
         * @return Bool
         */
        protected function validNotEquals(Mixed $newValue, Mixed $otherValue): Bool {
            if ( $newValue != $otherValue ) {
                return true;
            }

            return false;
        }

    //---------------------------  Validations  ---------------------------



    //---------------------------  Auxiliary functions  ---------------------------

        /**
         * Tells if this vo needs to be clean for repository
         * 
         * @return Bool
         */
        public function needsSanitize(): Bool {
            return $this->needs_sanitize;
        }

    //---------------------------  Auxiliary functions  ---------------------------

}