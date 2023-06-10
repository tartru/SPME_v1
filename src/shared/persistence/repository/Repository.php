<?php
/**
 * Repository
 * 
 * This abstract class help to standarize the functions for the repository
 * 
 * TODO: Analyze potential missing functions / features
 * 
 * ? Does the update, create and delete functions needs to be mandatory or optionals?
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\Repository;


abstract class Repository {

    /**
     * Gets the reopsitory new or old.
     * 
     * @param Array $params
     * @return Self
     */
    abstract public static function getRepository(Array $params): Self;




    /**
     * Sets the new query to be executed
     * 
     * @param String $qry
     * @return Void
     */
    abstract public function setQuery(String $qry): void;


    /**
     * Gets the query to be excecuted
     * 
     * @return String
     */
    abstract public function getQuery(): String;


    /**
     * Gets the executed query
     * 
     * @return String
     */
    abstract public function getLastQuery(): String;


    /**
     * Gets the last autoincremental (Id)
     * 
     * @return Int
     */
    abstract public function getInsertedId(): Int;


    /**
     * Gets the affected rows
     * 
     * @return Int
     */
    abstract public function getAffectedRows(): Int;


    /**
     * Returns all the rows
     * 
     * @return ?Array Array when success, null when error
     */
    abstract public function getAllRows(): ?Array;


    /**
     * Returns one row
     * 
     * @return ?Array Array when success, null when error
     */
    abstract public function getOneRow(): ?Array;


    /**
     * Returns one value
     * 
     * @param String $name
     * @return Mixed
     */
    abstract public function getOneValue(String $name): Mixed;


    /**
     * Returns one column
     * 
     * @param String $column
     * @return ?Array Array when success, null when error
     */
    abstract public function getOneColumn(String $column): ?Array;


    /**
     * Returns an array with 2 columns type key => value
     * 
     * @param String $key Key column
     * @param String $value Value column
     * @return ?Array Array when success, null when error
     */
    abstract public function getArrayPair(String $key, String $value): ?Array;


    /**
     * Similar to getAllRows but use one column as the key for the array
     * 
     * @param String $key Key column
     * @return ?Array Array when success, null when error
     */
    abstract public function getArrayWithColumnAsKey(String $key): ?Array;


    /**
     * Execute simple query
     * 
     * @param String $query
     * @return Bool 
     */
    abstract public function simpleQuery(String $query): Bool;


    /**
     * Gets the errors
     * 
     * @return Mixed
     */
    abstract public function error(): Mixed;



    //---------------------------  Optional functions  ---------------------------

        /**
          * Returns all the rows in json
          * 
          * @return String
          */
        public function getAllRowsAsJson(): String {
            return json_encode($this->getAllRows());
        }


        /**
          * Returns one row in json
          * 
          * @return String
          */
        public function getOneRowAsJson(): String {
            return json_encode($this->getOneRow());
        }


        /**
          * Returns one value in json
          * 
          * @param String $name
          * @return String
          */
        public function getOneValueAsJson(String $name): String {
            return json_encode($this->getOneValue($name));
        }


        /**
          * Returns one column in json
          * 
          * @param String $column
          * @return String
          */
        public function getOneColumnAsJson(String $column): String {
            return json_encode($this->getOneColumn($column));
        }


        /**
          * Returns an array with 2 columns type key => value, in json
          * 
          * @param String $key Key column
          * @param String $value Value column
          * @return String
          */
        public function getArrayPairAsJson(String $key, String $value): String {
            return json_encode($this->getArrayPair($key,$value));
        }


        /**
          * Similar to getAllRows but use one column as the key for the array in json
          * 
          * @param String $key Key column
          * @return String
          */
        public function getArrayWithColumnAsKeyAsJson(String $key): String {
            return json_encode($this->getArrayKeyColumn($key));
        }


        /**
         * List all the tables
         * 
         * @return ?Array Array when success, null when error
         */
        public function getTables(): ?Array {
            return [];
        }


        /**
         * List all the columns from a table
         * 
         * @param String $table
         * @return ?Array Array when success, null when error
         */
        public function getColumns(String $table): ?Array {
            return [];
        }


        /**
         * List all the options for a column
         * 
         * @param String $table
         * @param String $column
         * @return ?Array Array when success, null when error
         */
        public function getColumnOptions(String $table, String $column): ?Array {
            return [];
        }


        /**
         * Returns the number of rows
         * 
         * @return ?Int
         */
        public function count(): ?Int {
            $original_qry = $this->getQuery();
            $new_qry      = "SELECT COUNT(*) as cant FROM ($original_qry) as t";

            $this->setQuery($new_qry);

            $result = $this->getOneValue('cant');

            $this->setQuery($original_qry);
            
            return (is_null($result)) ? null : (Int)$result;
        }


        /**
         * Inserts new row
         * 
         * @param String $table
         * @param Array $data
         * @return Bool | Int
         */
        public function insert(String $table, Array $data): Bool | Int {
            return false;
        }


        /**
         * Update Rows
         * 
         * @param String $table
         * @param Array $data
         * @param Array | String $conditions Array or String
         * @return Bool | Int
         */
        public function update(String $table, Array $data, Array | String $conditions): Bool | Int {
            return false;
        }


        /**
         * Delete Rows
         * 
         * @param String $table
         * @param Array | String $conditions Array or String
         * @return Bool
         */
        public function delete(String $table, Array | String $conditions): Bool {
            return false;
        }


        /**
         * Gets the db version
         * 
         * @return Sring
         */
        public function getVersion(): String {
            return '';
        }


        /**
         * Clean the value or values to protect the db
         * 
         * 00 = \0 (NUL)
         * 0A = \n
         * 0D = \r
         * 1A = ctl-Z
         * 22 = "
         * 27 = '
         * 5C = \
         * 25 = %
         * 5F = _
         * 
         * @param Mixed $value
         * @param Bool $for_like
         * @return Mixed
         */
        public function cleanValue(Mixed $value, Bool $for_like = false): Mixed {
            if ( is_array($value) ) {
                $clean_value = array_map(fn ($t_value) => $this->cleanValue($t_value,$for_like), $value);
            }
            
            elseif ( is_null($value) ) {
                $clean_value = 'NULL';
            }

            elseif ( is_bool($value) ) {
                $clean_value = ($value) ? 'TRUE' : 'FALSE';
            }

            elseif ( is_numeric($value) ) {
                $clean_value = $value;//"'" . $value . "'";
            }

            elseif ( is_string($value) ) {
                if ( strtoupper($value) == 'NULL' ) {
                    $clean_value = 'NULL';
                }

                elseif ( strtoupper($value) == 'TRUE' || strtoupper($value) == 'FALSE' ) {
                    $clean_value =(strtoupper($value) == 'TRUE') ? 'TRUE' : 'FALSE';
                }

                elseif ( $for_like ) {
                    $clean_value = "'" . mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x27\x5C]', '\\\0', $value) . "'";
                }

                else {
                    $clean_value = "'" . mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]', '\\\0', $value) . "'";
                }
            }

            else {
                $clean_value = 'NULL';
            }
            
            return $clean_value;
        }

    //---------------------------  Optional functions  ---------------------------

}