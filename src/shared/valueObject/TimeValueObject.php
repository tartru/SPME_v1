<?php
/**
 * TimeValueObject
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\ValueObject;

use DateTime;


class TimeValueObject extends DateTimeValueObject {


    //---------------------------  IO  ---------------------------

        /**
         * Formats the output for better human reading
         * 
         * @return String
         */
        public function beautify(): String {
            return $this->beautyTime();
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
            
            return $this->value()->format('H:i:s');
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

            return $this->value()->format('H:i:s');
        }

    //---------------------------  IO  ---------------------------


}