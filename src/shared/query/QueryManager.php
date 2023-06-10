<?php
/**
 * QueryManager
 * 
 * This abstract class help to standarize the functions for the query managers
 * 
 * A query manager is a tool that helps magage, construct, clean, prepare etc. queries.
 * 
 * This are the special simbols:
 * "?" the ? means that the param in that position is gonna be cleaned
 * "@" The @ means that the param in that position is not gonna be cleaned (raw content)
 * "?:<param_name>" or ":<param_name>" similar to "?", the only difference is that the param is gonna be selected by the key and not the position in the params array
 * "@:<param_name>" similar to "@", the only difference is that the param is gonna be selected by the key and not the position in the params array
 * 
 * The position of the constants is defined: ":<queryConstant_name>"
 * 
 * 
 * "#<subquery_name>" With this simbol (#) the subquery is identified
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Query;


class QueryManager {

    /**
     * The QueryManager
     * 
     * @var Array
     * @access private
     */
    private static Array $queryManagers;


    /**
     * List of queries
     * 
     * @var Array
     * @access private
     */
    private Array $_queries;


    /**
     * List of variables that allways will be inserted en the queries, when the tags ask for then then
     * 
     * @var Array
     * @access private
     */
    private Array $_queryConstants;


    private function __construct(Array $newQueries, Array $newQueryConstants = []) {
        $this->setQueries($newQueries);
        $this->setQueryConstants($newQueryConstants);
    }



    
    /**
     * Static function for getting the manager from an array of queries
     * 
     * @param Array $newQueries
     * @param Array $newQueryConstants
     * @return static
     */
    public static function fromQueries(Array $newQueries = []): static {
        if ( empty($newQueries) ) {
            throw new QueryManagerException('emptyQueryListException');
        }

        $class = get_called_class();
        self::$queryManagers[$class] = new static($newQueries, []);

        return self::$queryManagers[$class];
    }


    /**
     * Static function for getting the manager from an array of queries and array of "query constants"
     * 
     * @param Array $newQueryConstants
     * @param Array $newQueries
     * @return static
     */
    public static function fromQueryConstantsAndQueries(Array $newQueryConstants = [], Array $newQueries = []): static {
        if ( empty($newQueries) ) {
            throw new QueryManagerException('emptyQueryListException');
        }

        $class = get_called_class();
        self::$queryManagers[$class] = new static($newQueries, $newQueryConstants);

        return self::$queryManagers[$class];
    }


    /**
     * Static function for singletone
     * 
     * @return static
     */
    public static function getQueryManager(): static {
        $class = get_called_class();

        if ( empty(self::$queryManagers[$class]) ) {
            self::$queryManagers[$class] = new static([]);
        }

        return self::$queryManagers[$class];
    }


    public static function getQueryManagers(): Array {
        return self::$queryManagers;
    }




    /**
     * Set the queries
     * 
     * @param Array $newQueries
     * @return Void
     */
    public function setQueries(Array $newQueries): void {
        $this->_queries = $newQueries;
    }


    /**
     * Set a single query
     * 
     * @param String | Int $identifier this can only be String or Integer
     * @param String $newQuery
     * @return Void
     */
    public function setQuery(String | Int $identifier, String | Array $newQuery): void {
        if ( empty($identifier) ) {
            throw new QueryManagerException('emptyIdentifierException');
        }
        if ( !is_string($identifier) && !is_integer($identifier) ) {
            throw new QueryManagerException('notValidIdentifierException');
        }

        $this->_queries[$identifier] = $newQuery;
    }


    /**
     * Gets the queries
     * 
     * @return Array
     */
    public function getQueries(): Array {
        return $this->_queries;
    }


    /**
     * Gets Single query
     * 
     * @param String | Int $identifier The identifier or a query
     * @return String | Array
     */
    public function getQuery(String | Int $identifier): String | Array {
        if ( empty($identifier) ) {
            throw new QueryManagerException('emptyIdentifierException');
        }
        if ( !is_string($identifier) && !is_integer($identifier) ) {
            throw new QueryManagerException('notValidIdentifierException');
        }

        if ( isset($this->_queries[$identifier]) ) {
            return $this->_queries[$identifier];
        }

        return $identifier;
    }


    /**
     * Set the queryConstants
     * 
     * @param Array $newQueryConstants
     * @return Void
     */
    public function setQueryConstants(Array $newQueryConstants): void {
        $identifiers = array_keys($newQueryConstants);
        usort($identifiers,fn ($a,$b) => strlen($b) - strlen($a));

        $this->_queryConstants = [];
        foreach ( $identifiers as $t_identifier ) {
            $this->_queryConstants[$t_identifier] = $newQueryConstants[$t_identifier];
        }
    }


    /**
     * Set a single queryConstant
     * 
     * @param String $identifier
     * @param Mixed $newQueryConstant
     * @return Void
     */
    public function setQueryConstant(String $identifier, Mixed $newQueryConstant): void {
        if ( empty($identifier) ) {
            throw new QueryManagerException('emptyIdentifierException');
        }
        if ( !is_string($identifier) ) {
            throw new QueryManagerException('notValidIdentifierException');
        }

        $newQueryConstants = [];
        $n_length          = strlen($identifier);
        $grabado           = false;
        foreach ( $this->_queryConstants as $t_identifier => $t_queryConstant ) {
            $t_length = strlen($t_identifier);
            if ( $t_length >= $n_length || ($t_length < $n_length && $grabado) ) {
                $newQueryConstants[$t_identifier] = $t_queryConstant;
            }
            else {
                $newQueryConstants[$identifier]   = $newQueryConstant;
                $newQueryConstants[$t_identifier] = $t_queryConstant;

                $grabado = true;
            }
        }

        if ( !$grabado ) {
            $newQueryConstants[$identifier] = $newQueryConstant;//$this->cleanValue($newQueryConstant);
        }

        $this->_queryConstants = $newQueryConstants;
    }


    /**
     * Gets the queryConstants
     * 
     * @return Array
     */
    public function getQueryConstants(): Array {
        return $this->_queryConstants;
    }


    /**
     * Gets Single queryConstant
     * 
     * @param String $identifier
     * @return Mixed
     */
    public function getQueryConstant(String $identifier): Mixed {
        if ( empty($identifier) ) {
            throw new QueryManagerException('emptyIdentifierException');
        }
        if ( !is_string($identifier) ) {
            throw new QueryManagerException('notValidIdentifierException');
        }

        if ( !isset($this->_queryConstants[$identifier]) ) {
            throw new QueryManagerException('queryConstantNotDefinedException');
        }

        return $this->_queryConstants[$identifier];
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


    /**
     * Assembles the query with the selected blocks
     * 
     * @param String | Int $identifier The identifier or a query
     * @param Array $blocks
     * @return String
     */
    public function assembleQueryBlocks(String | Int $identifier, Array $blocks): String {
        $qry = $this->getQuery($identifier);

        if ( is_string($qry) ) {
            return $qry;
        }

        if ( isset($qry['query']) ) {
            $main = $qry['query'];
        }
        else {
            $main = reset($qry);
        }

        usort($blocks,fn ($a,$b) => strlen($b) - strlen($a));
        foreach ( $blocks as $key ) {
            if ( isset($qry[$key]) ) {
                $main = str_ireplace("#$key",$qry[$key],$main);
            }
        }

        foreach ( $qry as $b_name => $blq ) {
            $main = str_ireplace("#$b_name",'',$main);
        }

        return $main;
    }


    /**
     * Insert the queryConstants in the query
     * 
     * @param String | Int $identifier The identifier or a query
     * @return String
     */
    public function bindQueryConstants(String | Int $identifier): String {
        $qry = $this->getQuery($identifier);

        foreach ( $this->getQueryConstants() as $id_QC => $queryConstant ) {
            if ( is_array($queryConstant) ) {
                $qry = str_replace(":$id_QC", implode(',',$queryConstant), $qry);
            }
            else {
                $qry = str_replace(":$id_QC", (String)$queryConstant, $qry);
            }
        }

        return $qry;
    }


    /**
     * Insert the values in the query
     * 
     * @param String | Int $identifier The identifier or a query
     * @param Array $values
     * @param Array $blocks
     * @param Bool $for_like
     * @return String
     */
    public function bind(String | Int $identifier, Array $values = [], Array $blocks = [], Bool $for_like = false): String {
        //First assemble the query if it is a special query
            $qry = $this->assembleQueryBlocks($identifier, $blocks);
        //First assemble the query if it is a special query

        //Second bind the queryConstants
            $qry = $this->bindQueryConstants($qry);
        //Second bind the queryConstants

        if ( !empty($values) ) {
            //Next replace the tagged values
                $keys = array_keys($values);
                $keys = array_filter($keys,fn ($key) => is_string($key));
                if ( count($keys) ) {
                    usort($keys,fn ($a,$b) => strlen($b) - strlen($a));
                    foreach ( $keys as $key ) {
                        //Direct values
                            if ( strpos($qry,"@:$key") !== false ) {
                                if ( is_array($values[$key]) ) {
                                    $qry = str_replace("@:$key", implode(',',$values[$key]), $qry);
                                }
                                else {
                                    $qry = str_replace("@:$key", (String)$values[$key], $qry);
                                }
                            }
                        //Direct values

                        //Clean values for Like
                            if ( strpos($qry,"%:$key") !== false ) {
                                $value = $this->cleanValue($values[$key],true);
                                
                                if ( is_array($value) ) {
                                    $qry = str_replace("%:$key", implode(',',$value), $qry);
                                }
                                else {
                                    $qry = str_replace("%:$key", (String)$value, $qry);
                                }
                            }
                        //Clean values for Like

                        //Clean values
                            if ( strpos($qry,"?:$key") !== false || strpos($qry,":$key") !== false ) {
                                $value = $this->cleanValue($values[$key]);

                                if ( is_array($value) ) {
                                    $qry = str_replace("?:$key", implode(',',$value), $qry);
                                    $qry = str_replace(":$key", implode(',',$value), $qry);
                                }
                                else {
                                    $qry = str_replace("?:$key", (String)$value, $qry);
                                    $qry = str_replace(":$key", (String)$value, $qry);
                                }
                            }
                        //Clean values
                    }
                }
            //Next replace the tagged values
            
            //Replace the rest of the values (not tagged)
                $result = "";
                $key    = 0;
                for ( $x = 0; $x < strlen($qry); $x++ ) {
                    //Direct value
                        if ( $qry[$x] == "@" && array_key_exists($key, $values) ) {
                            if ( is_array($values[$key]) ) {
                                $result .= implode(',',$values[$key]);
                            }
                            else {
                                $result .= $values[$key];
                            }

                            $key++;
                        }
                    //Direct value

                    //Clean values for Like
                        elseif ( $qry[$x] == "%" && array_key_exists($key, $values) ) {
                            $value = $this->cleanValue($values[$key],true);

                            if ( is_array($value) ) {
                                $result .= implode(',',$value);
                            }
                            else {
                                $result .= $value;
                            }

                            $key++;
                        }
                    //Clean values for Like

                    //Clean value
                        elseif ( $qry[$x] == "?" && array_key_exists($key, $values) ) {
                            $value = $this->cleanValue($values[$key]);

                            if ( is_array($value) ) {
                                $result .= implode(',',$value);
                            }
                            else {
                                $result .= $value;
                            }

                            $key++;
                        }
                    //Clean values

                    //Normal char
                        else {
                            $result .= $qry[$x];
                        }
                    //Normal char
                }

                $qry = $result;
            //Replace the rest of the values (not tagged)
        }
        

        return $qry;
    }


    /**
     * Alias for bind
     * 
     * @param String | Int $identifier The identifier or a query
     * @param Array $values
     * @param Array $blocks
     * @param Bool $for_like
     * @return String
     */
    public function query(String | Int $identifier, Array $values = [], Array $blocks = [], Bool $for_like = false): String {
        return $this->bind($identifier,$values,$blocks,$for_like);
    }


}