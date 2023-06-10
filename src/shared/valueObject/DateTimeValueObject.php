<?php
/**
 * DateTimeValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;

use DateTime;


class DateTimeValueObject extends ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var DateTime
         * @access protected
         */
        protected ?DateTime $value;

    //---------------------------  Parámeters  ---------------------------

    

    //---------------------------  Constructors  ---------------------------

        /**
         * Transform the value to the type of the inner value
         * 
         * @param Mixed $newValue
         * @return Mixed
         */
        protected static function toInnerValueType(Mixed $newValue): Mixed {
            if ( is_a($newValue,'DateTime') || is_null($newValue) ) {
                return $newValue;
            }

            if ( is_int($newValue) ) {
                return DateTime::setTimestamp($newValue);
            }

            if ( is_string($newValue) ) {
                $newDateTime = date_create($newValue);

                if ( !$newDateTime ) {
                    throw new ValueObjectException('invalidDateTimeFormatException', value: $newValue);
                }

                return $newDateTime;
            }

            throw new ValueObjectException('invalidTypeDateTimeException', value: $newValue);
        }


        /**
         * Creates a new DateTimeValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValue(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeDateTimeException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue));
        }


        /**
         * Creates a new DateTimeValueObject from mow
         * 
         * @return self
         */
        public static function now(): self {
            return new static(static::toInnerValueType('now'));
        }


        public function __construct(?DateTime $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  IO  ---------------------------

        /**
         * Formats the output
         * 
         * @param String $format
         * @return String
         */
        public function format(String $format = 'Y-m-d H:i:s'): String {
            if ( $this->isNull() ) {
                return 'NULL';
            }

            return $this->value()->format($format);
        }


        /**
         * Formats the output for better human reading
         * 
         * @return String
         */
        public function beautify(): String {
            return $this->format('d / m / Y  h:i:s a');
        }


        /**
         * Returns the date part
         * 
         * @return String
         */
        public function date(): String {
            return $this->format('Y-m-d');
        }


        /**
         * Returns the date part
         * 
         * @return String
         */
        public function beautyDate(): String {
            return $this->format('d / m / Y');
        }


        /**
         * Returns the time part
         * 
         * @return String
         */
        public function time(): String {
            return $this->format('H:i:s');
        }


        /**
         * Returns the time part
         * 
         * @return String
         */
        public function beautyTime(): String {
            return $this->format('h:i:s a');
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
            
            return $this->value()->format('Y-m-d H:i:s');
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

            return $this->value()->format('Y-m-d H:i:s');
        }

    //---------------------------  IO  ---------------------------



    //---------------------------  Actions  ---------------------------

        /**
         * Adds some time to a date
         * 
         * @param String | DateInterval $dateInterval
         * @param Bool $fromDateString
         * @return self
         */
        public function add(String | DateInterval $dateInterval, Bool $fromDateString = false): self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            if ( is_a($dateInterval,'DateInterval') ) {
                return new static($this->value()->add($dateInterval));
            }

            elseif ( !$fromDateString ) {
                return new static($this->value()->add( new DateInterval($dateInterval) ));
            }

            else {
                return new static($this->value()->add( DateInterval::createFromDateString($dateInterval) ));
            }
        }


        /**
         * Substract some time to a date
         * 
         * @param String | DateInterval $dateInterval
         * @param Bool $fromDateString
         * @return self
         */
        public function sub(String | DateInterval $dateInterval, Bool $fromDateString = false): self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            if ( is_a($dateInterval,'DateInterval') ) {
                return new static($this->value()->sub($dateInterval));
            }

            elseif ( !$fromDateString ) {
                return new static($this->value()->sub( new DateInterval($dateInterval) ));
            }

            else {
                return new static($this->value()->sub( DateInterval::createFromDateString($dateInterval) ));
            }
        }

    //---------------------------  Actions  ---------------------------



    //---------------------------  Comparison  ---------------------------

        /**
         * Gets the interval between datetimes
         * 
         * @param Int | String | DateTime $otherDateTime
         * @return DateInterval
         */
        public function diff(Int | String | DateTime $otherDateTime): DateInterval {
            if ( $this->isNull() ) {
                throw new ValueObjectException('compareNullException');
            }

            $otherDateTime = static::toInnerValueType($otherDateTime);

            return $this->value()->diff($otherDateTime);
        }


        /**
         * Gets the interval between datetimes as string
         * 
         * @param Int | String | DateTime $otherDateTime
         * @param String $format
         * @return String
         */
        public function formattedDiff(Int | String | DateTime $otherDateTime, String $format): String {
            $diff = $this->diff($otherDateTime);

            return $diff->format($format);
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
            if ( !is_int($newValue) && !is_string($newValue) && !is_a($newValue,'DateTime') && !is_null($newValue) ) {
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
                throw new ValueObjectException('validStringRequiredException');
            }

            if ( !is_null($newValue) ) {
                if ( isset($this->validation_rules['In']) && !$this->validIn($newValue,$this->validation_rules['In']) ) {
                    throw new ValueObjectException('validInException', value: $newValue);
                }
    
                if ( isset($this->validation_rules['NotIn']) && !$this->validNotIn($newValue,$this->validation_rules['NotIn']) ) {
                    throw new ValueObjectException('validNotInException', value: $newValue);
                }

                if ( isset($this->validation_rules['Min']) && !$this->validMin($newValue,$this->validation_rules['Min']) ) {
                    throw new ValueObjectException('validStringMinException', value: '(' . strlen($newValue) . ') "' . $newValue . '"', refValue_1: $this->validation_rules['Min']);
                }
    
                if ( isset($this->validation_rules['Max']) && !$this->validMax($newValue,$this->validation_rules['Max']) ) {
                    throw new ValueObjectException('validStringMaxException', value: '(' . strlen($newValue) . ') "' . $newValue . '"', refValue_1: $this->validation_rules['Max']);
                }
    
                if ( isset($this->validation_rules['Between']) && !$this->validBetween($newValue,$this->validation_rules['Between'][0],$this->validation_rules['Between'][1]) ) {
                    throw new ValueObjectException('validStringBetweenException', value: '(' . strlen($newValue) . ') "' . $newValue . '"', refValue_1: $this->validation_rules['Between'][0], refValue_2: $this->validation_rules['Between'][1]);
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
         * @param DateTime $newValue
         * @param Int | String | DateTime $minValue
         * @return Bool
         */
        protected function validMin(DateTime $newValue, Int | String | DateTime $minValue): Bool {
            $minValue = static::toInnerValueType($minValue);

            if ( $newValue >= $minValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Max
         * 
         * @param DateTime $newValue
         * @param Int | String | DateTime $maxValue
         * @return Bool
         */
        protected function validMax(DateTime $newValue, Int | String | DateTime $maxValue): Bool {
            $maxValue = static::toInnerValueType($maxValue);

            if ( $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Between
         * 
         * @param DateTime $newValue
         * @param Int | String | DateTime $minValue
         * @param Int | String | DateTime $maxValue
         * @return Bool
         */
        protected function validBetween(DateTime $newValue, Int | String | DateTime $minValue, Int | String | DateTime $maxValue): Bool {
            $minValue = static::toInnerValueType($minValue);
            $maxValue = static::toInnerValueType($maxValue);

            if ( $newValue >= $minValue && $newValue <= $maxValue ) {
                return true;
            }

            return false;
        }

    //---------------------------  Validations  ---------------------------

}