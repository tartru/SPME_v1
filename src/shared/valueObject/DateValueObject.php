<?php
/**
 * DateValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;

use DateTime;


class DateValueObject extends DateTimeValueObject {


    //---------------------------  Constructors  ---------------------------

        public function __construct(?DateTime $newValue) {
            $this->setValue($newValue);
        }

    //---------------------------  Constructors  ---------------------------


    //---------------------------  IO  ---------------------------

        /**
         * Formats the output for better human reading
         * 
         * @return String
         */
        public function beautify(): String {
            return $this->beautyDate();
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
            
            return $this->value()->format('Y-m-d');
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

            return $this->value()->format('Y-m-d');
        }

    //---------------------------  IO  ---------------------------


}