<?php
/**
 * StringValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;


class StringValueObject extends ValueObject {

    //---------------------------  Parámeters  ---------------------------

        /**
         * This is the value
         * 
         * @var String
         * @access protected
         */
        protected ?String $value;


        /**
         * Flag that indicates if this VO needs to be sanitized
         * 
         * @var Bool
         * @access protected
         */
        protected Bool $needs_sanitize = true;

    //---------------------------  Parámeters  ---------------------------


    //---------------------------  Constructors  ---------------------------

        /**
         * Transform the value to the type of the inner value
         * 
         * @param Mixed $newValue
         * @return Mixed
         */
        protected static function toInnerValueType(Mixed $newValue): Mixed {
            if ( is_string($newValue) ) {
                return trim($newValue);
            }

            if ( is_null($newValue) ) {
                return $newValue;
            }

            if ( is_bool($newValue) ) {
                return ($newValue) ? 'TRUE' : 'FALSE';
            }

            if ( is_int($newValue) || is_float($newValue) ) {
                return (String)$newValue;
            }

            if ( is_array($newValue) ) {
                return implode($newValue);
            }
            
            try {
                return (String)$newValue;
            } catch( Exception $e ) {
                throw new ValueObjectException('invalidTypeStringException', value: $newValue);
            }
            
        }


        /**
         * Creates a new StringValueObject from values
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValue(Mixed $newValue): self {
            if ( !static::isTypeValid($newValue) ) {
                throw new ValueObjectException('invalidTypeStringException', value: $newValue);
            }
            
            return new static(static::toInnerValueType($newValue));
        }


        /**
         * Creates a new StringValueObject from an Array
         * 
         * @param Array $newValue
         * @param ?String $separator
         * @return self
         */
        public static function fromArray(Array $newValue, ?String $separator = null): self {
            if ( is_null($separator) ) {
                return new static(static::toInnerValueType(implode($newValue)));
            }
            
            else {
                return new static(static::toInnerValueType(implode($separator, $newValue)));
            }
        }


        /**
         * Alias for fromArray
         * 
         * @param Array $newValue
         * @param ?String $separator
         * @return self
         */
        public static function implode(Array $newValue, ?String $separator = null): self {
            return static::fromArray($newValue, $separator);
        }


        /**
         * Creates a new StringValueObject from an email
         * 
         * @param String $email
         * @return self
         */
        public static function fromEmail(String $email): self {
            $newValue = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ( !$newValue ) {
                throw new ValueObjectException('validEmailException', value: $email);
            }

            return new static($newValue);
        }


        /**
         * Creates a new StringValueObject from a URL
         * 
         * @param String $url
         * @return self
         */
        public static function fromURL(String $url): self {
            $newValue = filter_var($url, FILTER_VALIDATE_URL);

            if ( !$newValue ) {
                throw new ValueObjectException('validUrlException', value: $url);
            }

            return new static($newValue);
        }


        /**
         * Creates a new StringValueObject from a String filtered by pattern
         * 
         * @param String $newValue
         * @param String $pattern
         * @return self
         */
        public static function fromRegEx(String $newValue, String $pattern): self {
            $newValueFormatted = filter_var($newValue, FILTER_VALIDATE_REGEXP,["options" => ["regexp" => $pattern]]);

            if ( !$newValueFormatted ) {
                throw new ValueObjectException('validRegexException', value: $newValue, refValue_1: $pattern);
            }

            return new static($newValueFormatted);
        }


        /**
         * Creates a new StringValueObject from values and cleans it
         * 
         * @param Mixed $newValue
         * @return self
         */
        public static function fromValueToCleaned(Mixed $newValue): self {
            return static::fromValue($newValue)->clean();
        }


        public function __construct(?String $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  IO  ---------------------------

        /**
         * Returns the length of the value
         * 
         * @return Int
         */
        public function length(): Int {
            if ( $this->isNull() ) {
                return 0;
            }

            return strlen($this->value());
        }


        /**
         * Cleans the value
         * 
         * @return ?String
         */
        public function cleanValue(): ?String {
            if ( $this->isNull() ) {
                return null;
            }

            //return mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x27\x5C]', '\\\0', $this->value());
            return mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]', '\\\0', $this->value());
        }

    //---------------------------  IO  ---------------------------



    //---------------------------  Actions  ---------------------------

        /**
         * Replace substring
         * 
         * @param mixed $search
         * @param mixed $replace
         * @param Bool $case_sensitive
         * @return self
         */
        public function replace(mixed $search, mixed $replace, Bool $case_sensitive = false): self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            if ( !$case_sensitive )  {
                return new static(str_ireplace($search, $replace, $this->value()));
            }

            else {
                return new static(str_replace($search, $replace, $this->value()));
            }
        }


        /**
         * split the string into an array of substrings
         * 
         * @param String $delimiter
         * @param ?Int $limit
         * @return Array
         */
        public function explode(String $delimiter, ?Int $limit = null): Array {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return null;
            }

            if ( is_null($limit) ) {
                return explode($delimiter, $this->value());
            }

            else {
                return explode($delimiter, $this->value(), $limit);
            }
        }


        /**
         * Cleans the value
         * 
         * @return self
         */
        public function clean(): Self {
            if ( $this->isNull() ) {
                //throw new ValueObjectException('actionNullException');
                return new static(null);
            }

            return new static($this->cleanValue());
        }

    //---------------------------  Actions  ---------------------------



    //---------------------------  Comparison  ---------------------------

        /**
         * Gets the position of the substring
         * 
         * @param Mixed $substring
         * @param Int $offset
         * @param Bool $case_sensitive
         * @return Mixed
         */
        public function strpos(Mixed $substring, Int $offset = 0, Bool $case_sensitive = false): Mixed {
            if ( $this->isNull() ) {
                throw new ValueObjectException('compareNullException');
            }

            if ( !$case_sensitive )  {
                return stripos($this->value(), $substring, $offset);
            }

            else {
                return strpos($this->value(), $substring, $offset);
            }
        }


        /**
         * Cheks if the value includes the substring
         * 
         * @param Mixed $substring
         * @param Int $offset
         * @param Bool $case_sensitive
         * @return Bool
         */
        public function includes(Mixed $substring, Int $offset = 0, Bool $case_sensitive = false): Bool {
            return ($this->strpos($substring, $offset, $case_sensitive) !== false) ? true : false;
        }


        /**
         * Cheks if the value not includes the substring
         * 
         * @param Mixed $substring
         * @param Int $offset
         * @param Bool $case_sensitive
         * @return Bool
         */
        public function notIncludes(Mixed $substring, Int $offset = 0, Bool $case_sensitive = false): Bool {
            return !$this->includes($substring, $offset, $case_sensitive);
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

                if ( isset($this->validation_rules['Size']) && !$this->validSize($newValue,$this->validation_rules['Size']) ) {
                    throw new ValueObjectException('validStringSizeException', value: '(' . strlen($newValue) . ') "' . $newValue . '"', refValue_1: $this->validation_rules['Size']);
                }

                if ( isset($this->validation_rules['Equals']) && !$this->validEquals($newValue,$this->validation_rules['Equals']) ) {
                    throw new ValueObjectException('validEqualsException', value: $newValue, refValue_1: $this->validation_rules['Equals']);
                }

                if ( isset($this->validation_rules['NotEquals']) && !$this->validNotEquals($newValue,$this->validation_rules['NotEquals']) ) {
                    throw new ValueObjectException('validNotEqualsException', value: $newValue, refValue_1: $this->validation_rules['NotEquals']);
                }

                if ( isset($this->validation_rules['Includes']) && !$this->validIncludes($newValue,$this->validation_rules['Includes']) ) {
                    throw new ValueObjectException('validIncludesException', value: $newValue, refValue_1: $this->validation_rules['Includes']);
                }

                if ( isset($this->validation_rules['NotIncludes']) && !$this->validNotIncludes($newValue,$this->validation_rules['NotIncludes']) ) {
                    throw new ValueObjectException('validNotIncludesException', value: $newValue, refValue_1: $this->validation_rules['NotIncludes']);
                }

                if ( isset($this->validation_rules['StartsWith']) && !$this->validStartsWith($newValue,$this->validation_rules['StartsWith']) ) {
                    throw new ValueObjectException('validStartsWithException', value: $newValue, refValue_1: $this->validation_rules['StartsWith']);
                }

                if ( isset($this->validation_rules['EndsWith']) && !$this->validEndsWith($newValue,$this->validation_rules['EndsWith']) ) {
                    throw new ValueObjectException('validEndsWithException', value: $newValue, refValue_1: $this->validation_rules['EndsWith']);
                }

                if ( isset($this->validation_rules['Email']) && !$this->validEmail($newValue) ) {
                    throw new ValueObjectException('validEmailException', value: $newValue);
                }

                if ( isset($this->validation_rules['Url']) && !$this->validUrl($newValue) ) {
                    throw new ValueObjectException('validUrlException', value: $newValue);
                }

                if ( isset($this->validation_rules['Regex']) && !$this->validRegex($newValue,$this->validation_rules['Regex']) ) {
                    throw new ValueObjectException('validRegexException', value: $newValue, refValue_1: $this->validation_rules['Regex']);
                }

                if ( isset($this->validation_rules['NotRegex']) && !$this->validNotRegex($newValue,$this->validation_rules['NotRegex']) ) {
                    throw new ValueObjectException('validNotRegexException', value: $newValue, refValue_1: $this->validation_rules['NotRegex']);
                }
            }

            return true;
        }



        /**
         * Valid required
         * 
         * @param String $newValue
         * @return Bool
         */
        protected function validRequired(Mixed $newValue): Bool {
            if ( empty($newValue) ) {
                return false;
            }

            return true;
        }


        /**
         * Valid Min
         * 
         * @param String $newValue
         * @param Int $minValue
         * @return Bool
         */
        protected function validMin(String $newValue, Int $minValue): Bool {
            if ( strlen($newValue) >= $minValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Max
         * 
         * @param String $newValue
         * @param Int $maxValue
         * @return Bool
         */
        protected function validMax(String $newValue, Int $maxValue): Bool {
            if ( strlen($newValue) <= $maxValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Between
         * 
         * @param String $newValue
         * @param Int $minValue
         * @param Int $maxValue
         * @return Bool
         */
        protected function validBetween(String $newValue, Int $minValue, Int $maxValue): Bool {
            $newLength = strlen($newValue);
            if ( $newLength >= $minValue && $newLength <= $maxValue ) {
                return true;
            }

            return false;
        }


        /**
         * Valid Size
         * 
         * @param String $newValue
         * @param Int $size
         * @return Bool
         */
        protected function validSize(String $newValue, Int $size): Bool {
            if ( strlen($newValue) == $size ) {
                return true;
            }

            return false;
        }


        /**
         * Valid includes
         * 
         * @param String $newValue
         * @param String | Int | Float | Bool $otherValue
         * @return Bool
         */
        protected function validIncludes(String $newValue, String | Int | Float | Bool $otherValue): Bool {
            if ( is_bool($otherValue) ) {
                $otherValue = ($otherValue) ? 'TRUE' : 'FALSE';
            }

            else {
                $otherValue = (String)$otherValue;
            }

            if ( stripos($newValue,$otherValue) !== false ) {
                return true;
            }

            return false;
        }


        /**
         * Valid not includes
         * 
         * @param String $newValue
         * @param String | Int | Float | Bool $otherValue
         * @return Bool
         */
        protected function validNotIncludes(String $newValue, String | Int | Float | Bool $otherValue): Bool {
            return !$this->validIncludes($newValue, $otherValue);
        }


        /**
         * Valid if starts with
         * 
         * @param String $newValue
         * @param String | Int | Float | Bool $otherValue
         * @return Bool
         */
        protected function validStartsWith(String $newValue, String | Int | Float | Bool $otherValue): Bool {
            if ( is_bool($otherValue) ) {
                $otherValue = ($otherValue) ? 'TRUE' : 'FALSE';
            }

            else {
                $otherValue = (String)$otherValue;
            }

            return str_starts_with($newValue, $otherValue);
        }


        /**
         * Valid if ends with
         * 
         * @param String $newValue
         * @param String | Int | Float | Bool $otherValue
         * @return Bool
         */
        protected function validEndsWith(String $newValue, String | Int | Float | Bool $otherValue): Bool {
            if ( is_bool($otherValue) ) {
                $otherValue = ($otherValue) ? 'TRUE' : 'FALSE';
            }

            else {
                $otherValue = (String)$otherValue;
            }

            return str_ends_with($newValue, $otherValue);
        }


        /**
         * Validates email
         * 
         * @param String $newValue
         * @return Bool
         */
        public function validEmail(String $newValue): Bool {
            if ( !filter_var($newValue, FILTER_VALIDATE_EMAIL) ) {
                return false;
            }

            return true;
        }


        /**
         * Validates url
         * 
         * @param String $newValue
         * @return Bool
         */
        public function validUrl(String $newValue): Bool {
            if ( !filter_var($newValue, FILTER_VALIDATE_URL) ) {
                return false;
            }

            return true;
        }


        /**
         * Validates Regular expression
         * 
         * @param String $newValue
         * @param String $pattern
         * @return Bool
         */
        public function validRegex(String $newValue, String $pattern): Bool {
            if ( !preg_match($pattern,$newValue) ) {
                return false;
            }

            return true;
        }


        /**
         * Validates Not Regular expression
         * 
         * @param String $newValue
         * @param String $pattern
         * @return Bool
         */
        public function validNotRegex(String $newValue, String $pattern): Bool {
            return !$this->validRegex($newValue, $pattern);
        }

    //---------------------------  Validations  ---------------------------

}