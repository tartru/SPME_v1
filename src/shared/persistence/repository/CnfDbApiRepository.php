<?php
/**
 * CnfDbApiRepository (CONAFOR DataBase API)
 * 
 * Class to handle the connection to the CONAFOR databases
 * 
 * * This class extends ths Repository class and implement its methods
 * * This class use the library "RestClient" from tcdent/php-restclient. So it needs to be included
 * * composer require tcdent/php-restclient
 * 
 *
    DROP PROCEDURE IF EXISTS forceUpdate;

    delimiter |

    CREATE PROCEDURE forceUpdate(IN myTable VARCHAR(255), IN myChanges VARCHAR(1024), IN conditions VARCHAR(1024), OUT affectedRows INT) 
        BEGIN
            SET @Expression = CONCAT("UPDATE ", myTable, " SET ", myChanges, " WHERE ", conditions, ";");
            PREPARE myquery FROM @Expression;
            EXECUTE myquery;

            SET affectedRows = ROW_COUNT();
        END|

    delimiter ;
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\Repository;


class CnfDbApiRepository extends Repository {

    //---------------------------  Parámeters  ---------------------------

        /**
         * List of conexions to the database
         * 
         * @var Array
         * @access private
         */
        private static Array $connections;


        /**
         * The RestClient
         * 
         * @var RestClient
         * @access private
         */
        private \RestClient $dbRestClient;


        /**
         * The url for the API
         * 
         * @var String
         * @access private
         */
        private String $url = '';


        /**
         * The DB identifier 
         * 
         * @var String
         * @access private
         */
        private String $ephylone = '';


        /**
         * The Query 
         * 
         * @var String
         * @access private
         */
        private String $query = '';


        /**
         * Last Query 
         * 
         * @var String
         * @access private
         */
        private String $lastQuery = '';


        /**
         * Inserted Id
         * 
         * @var Int
         * @access private
         */
        private Int $insertedId;


        /**
         * Affected Rows
         * 
         * @var Int
         * @access private
         */
        private Int $affectedRows;


        /**
         * The row limit that the service is going to return.
         * 
         * 0 means the default limit in the API
         * 
         * @var Int | String
         * @access private
         */
        private Int | String $rowLimit;


        /**
         * The error number
         * 
         * @var Int
         * @access private
         */
        private Int $errorNumber;


        /**
         * The error message
         * 
         * @var Array
         * @access private
         */
        private Array $errorMessage = [];


        /**
         * Generic message error
         * 
         * @var String
         * @access private
         */
        private String $genericErrorMessage = "Ocurrió un error al ejecutar la consulta, lamentamos las molestias";

    //---------------------------  Parámeters  ---------------------------



    private function __construct(String $newUrl, String $newEphylone) {
        $this->setUrl($newUrl);
        $this->setEphylone($newEphylone);

        $this->setInsertedId(0);
        $this->setRowLimit(0);
    }



    /**
     * Set the url var
     * 
     * @param String $newUrl
     * @return Void
     */
    public function setUrl(String $newUrl): void {
        $this->url = $newUrl;
    }


    /**
     * Set the ephylone var
     * 
     * @param String $newEphylone
     * @return Void
     */
    public function setEphylone(String $newEphylone): void {
        $this->ephylone = $newEphylone;
    }


    /**
     * Set the rowLimit var
     * 
     * @param Int $newRowLimit
     * @param ?Int $newOffset
     */
    public function setRowLimit(Int $newRowLimit, ?Int $newOffset = null): void {
        if ( !isset($newOffset) ) {
            $this->rowLimit = $newRowLimit;
        }
        
        else {
            $this->rowLimit = "{$newOffset}, {$newRowLimit}";
        }
    }


    /**
     * Gets the rowLimit var
     * 
     * @return Int | String
     */
    public function getRowLimit(): Int | String {
        return $this->rowLimit;
    }


    /**
     * Set the errorNumber var
     * 
     * @param Int $newErrorNumber 
     */
    private function setErrorNumber(Int $newErrorNumber): void {
        $this->errorNumber = $newErrorNumber;
    }


    /**
     * Set the errorMessage var
     * 
     * @param Array $errorMessage 
     */
    private function setErrorMessage(Array $newErrorMessage): void {
        $this->errorMessage = $newErrorMessage;
    }


    /**
     * Sets the error
     * 
     * @param Array | Bool $response Array when error, false when initialize
     */
    private function setError(Array | Bool $response = false): void {
        if ( is_array($response) ) {
            if ( !empty($response['error']) ) {
                $this->setErrorNumber((Int)$response['error']);
            }
            else {
                $this->setErrorNumber(1);
            }

            if ( !empty($response['messages']) ) {
                $this->setErrorMessage((Array)$response['messages']);
            }
            else {
                $this->setErrorMessage([$this->genericErrorMessage]);
            }
        }

        else {
            $this->setErrorNumber(0);
            $this->setErrorMessage([]);
        }
    }


    /**
     * Get the errorNumber var
     * 
     * @return Int
     */
    public function getErrorNumber(): Int {
        return $this->errorNumber;
    }


    /**
     * Get the errorMessage var
     * 
     * @return Array
     */
    public function getErrorMessage(): Array {
        return $this->errorMessage;
    }


    /**
     * Get the error
     * 
     * @return Array
     */
    public function getError(): Array {
        return [
            'errorNumber'  => $this->getErrorNumber(),
            'errorMessage' => $this->getErrorMessage(),
        ];
    }


    //---------------------------  Function implementation  ---------------------------

        /**
         * Static function for singletone
         * 
         * @param Array $params
         * @return Self
         */
        public static function getRepository(Array $params): Self {
            if ( empty($params['ephylone']) ) {
                throw new CnfDbApiRepositoryException('ephyloneNotValidException');
            }

            if ( !empty(self::$connections[$params['ephylone']]) ) {
                return self::$connections[$params['ephylone']];
            }

            else {
                if ( empty($params['url']) ) {
                    throw new CnfDbApiRepositoryException('urlNotValidException');
                }

                if ( empty(self::$connections) ) {
                    self::$connections = [];
                }
                
                self::$connections[$params['ephylone']] = new self($params['url'], $params['ephylone']);

                return self::$connections[$params['ephylone']];
            }
        }


        /**
         * Set the new query to be excecuted
         * 
         * @param String $newQuery
         */
        public function setQuery(String $newQuery): void {
            $newQuery = trim((String)$newQuery);

            if ( empty($newQuery) ) {
                throw new CnfDbApiRepositoryException('emptyQueryException');
            }

            else {
                $this->query = $newQuery;
            }
        }


        /**
         * Get the new query to be excecuted
         * 
         * @param Bool $clean_query Cleans the query
         * @return String
         */
        public function getQuery(Bool $clean_query = false): String {
            $return = $this->query;

            if ( $clean_query ) {
                $this->query = '';
            }

            return $return;
        }


        /**
         * Set the excecuted query
         * 
         * @param String $query
         */
        public function setLastQuery(String $query): void {
            $this->lastQuery = trim((String)$query);
        }


        /**
         * Get the excecuted query
         * 
         * @return String
         */
        public function getLastQuery(): String {
            return $this->lastQuery;
        }


        /**
         * Set the last inserted id
         * 
         * @param Int $insertedId
         */
        public function setInsertedId(Int $insertedId): void {
            $this->insertedId = $insertedId;
        }


        /**
         * Get the last inserted id
         * 
         * @return Int
         */
        public function getInsertedId(): Int {
            return $this->insertedId;
        }


        /**
         * Set the affected rows
         * 
         * @param Int $affectedRows
         */
        public function setAffectedRows(Int $affectedRows): void {
            $this->affectedRows = $affectedRows;
        }


        /**
         * Get the affected rows
         * 
         * @return Int
         */
        public function getAffectedRows(): Int {
            return $this->affectedRows;
        }


        /**
         * Execute a query and return the result as array
         * 
         * @param String $newQuery
         * @param Int | String $rowLimit
         * @return ?Array Array when success, null when error
         */
        public function query(String $newQuery = '', Int | String $rowLimit = 0): ?Array {
            $this->setError();

            $query = (empty($newQuery)) ? $this->getQuery(true) : $newQuery;
            
            if ( empty($query) ) {
                throw new CnfDbApiRepositoryException('emptyQueryException');
            }

            $db_rc = $this->getDbRestClient();

            $params = [
                'query' => $query,
            ];

            if ( !empty($rowLimit) ) {
                $params['limit'] = $rowLimit;
            }

            $result = $db_rc->post('query',$params);
            if ( empty($result->response) ) {
                $this->setLastQuery($query);
                $this->setError(['messages' => $result->error]);

                return null;
            }

            return $this->processResult($result->response, $query);
        }


        /**
         * Returns all the rows
         * 
         * @return ?Array Array when success, null when error
         */
        public function getAllRows(): ?Array {
            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();

            $result = $this->query($query,$rowLimit);

            return $result;
        }


        /**
         * Returns one row
         * 
         * @return ?Array Array when success, null when error
         */
        public function getOneRow(): ?Array {
            $this->setRowLimit(1);
            $this->addsLimitToQueryWhenNeeded();
            $query = $this->getQuery(true);
            $this->setRowLimit(0);

            $result = $this->query($query);
            
            if ( is_null($result) ) {
                return null;
            }

            if ( !empty($result) ) {
                return reset($result);
            }

            return [];
        }


        /**
         * Returns one value
         * 
         * @param String $name
         * @return Mixed
         */
        public function getOneValue(String $name): Mixed {
            if ( empty($name) ) {
                throw new CnfDbApiRepositoryException('emptyColumnException');
            }

            $this->setRowLimit(1);
            $this->addsLimitToQueryWhenNeeded();
            $query = $this->getQuery(true);
            $this->setRowLimit(0);

            $result = $this->query($query,1);

            if ( is_null($result) ) {
                return null;
            }

            if ( !empty($result) ) {
                $row = reset($result);

                if ( !empty($row) && is_array($row) && isset($row[$name]) ) {
                    return $row[$name];
                }
            }

            return null;
        }


        /**
         * Returns one column
         * 
         * @param String $column
         * @return ?Array Array when success, null when error
         */
        public function getOneColumn(String $column): ?Array {
            if ( empty($column) ) {
                throw new CnfDbApiRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();

            $result = $this->query($query,$rowLimit);

            if ( is_null($result) ) {
                return null;
            }

            if ( !empty($result) ) {
                return array_column($result, $column);
            }

            return [];
        }


        /**
         * Returns an array with 2 columns type key => value
         * 
         * @param String $key Key column
         * @param String $value Value column
         * @return ?Array Array when success, null when error
         */
        public function getArrayPair(String $key, String $value): ?Array {
            if ( empty($key) || empty($value) ) {
                throw new CnfDbApiRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();

            $result = $this->query($query,$rowLimit);

            if ( is_null($result) ) {
                return null;
            }

            if ( !empty($result) ) {
                return array_column($result, $value, $key);
            }

            return [];
        }


        /**
         * Similar to getAllRows but use one column as the key for the array
         * 
         * @param String $key Key column
         * @return ?Array Array when success, null when error
         */
        public function getArrayWithColumnAsKey(String $key): ?Array {
            if ( empty($key) ) {
                throw new CnfDbApiRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();

            $result = $this->query($query,$rowLimit);

            if ( is_null($result) ) {
                return null;
            }

            if ( !empty($result) ) {
                return array_column($result, null, $key);
            }

            return [];
        }


        /**
         * Execute simple query
         * 
         * @param String $newQuery
         * @return Bool 
         */
        public function simpleQuery(String $newQuery = ''): Bool {
            $this->setError();

            $query = (empty($newQuery)) ? $this->getQuery(true) : $newQuery;
            
            if ( empty($query) ) {
                throw new CnfDbApiRepositoryException('emptyQueryException');
            }

            $db_rc = $this->getDbRestClient();

            $params = [
                'query' => $query,
            ];

            $result = $db_rc->post('query',$params);
            
            $processed_reponse = $this->processResult($result->response, $query);

            if ( !empty($processed_reponse) ) {
                return true;
            }

            return false;
        }


        /**
         * Gets the errors
         * 
         * @return Mixed
         */
        public function error(): Mixed {
            return $this->getError();
        }


        //---------------------------  Optional functions  ---------------------------

            /**
             * List all the tables
             * 
             * @return ?Array Array when success, null when error
             */
            public function getTables(): ?Array {
                $this->setError();

                $db_rc = $this->getDbRestClient();

                $result = $db_rc->post('listatablas');

                return $this->processResult($result->response, 'listatablas');
            }


            /**
             * List all the columns from a table
             * 
             * @param String $table
             * @return ?Array Array when success, null when error
             */
            public function getColumns(String $table): ?Array {
                $this->setError();

                if ( empty($table) ) {
                    throw new CnfDbApiRepositoryException('emptyTableException');
                }

                $db_rc = $this->getDbRestClient();

                $result = $db_rc->post('listacampos',['tabla' => $table]);

                $processed_result = $this->processResult($result->response, 'listacampos');

                if ( !empty($processed_result) ) {
                    return array_column($processed_result, null, 'Field');
                }
    
                return $result;
            }


            /**
             * List all the options for a column
             * 
             * @param String $table
             * @param String $column
             * @return ?Array Array when success, null when error
             */
            public function getColumnOptions(String $table, String $column): ?Array {
                if ( empty($column) ) {
                    throw new CnfDbApiRepositoryException('emptyColumnException');
                }

                $columns_info = $this->getColumns($table);

                if ( empty($columns_info) ) {
                    return null;
                }

                if ( empty($columns_info[$column]) ) {
                    throw new CnfDbApiRepositoryException('columnNotValidException');
                }

                if ( stripos($columns_info[$column]['Type'],'enum') === false &&  stripos($columns_info[$column]['Type'],'set') === false  ) {
                    throw new CnfDbApiRepositoryException('invalidColumnTypeException');
                }

                $options = explode("','", str_ireplace(["enum('","set('","')"],'',$columns_info[$column]['Type']) );

                return $options;
            }


            /**
             * Inserts new row
             * 
             * @param String $table
             * @param Array $data
             * @return Bool | Int
             */
            public function insert(String $table, Array $data): Bool | Int {
                $this->setError();

                if ( empty($table) ) {
                    throw new CnfDbApiRepositoryException('emptyTableException');
                }
                if ( empty($data) ) {
                    throw new CnfDbApiRepositoryException('emptyDataException');
                }

                $db_rc = $this->getDbRestClient();

                $result = $db_rc->post("insertar/{$table}",$data);

                $processed_reponse = $this->processResult($result->response, 'insertar');

                if ( !empty($processed_reponse) ) {
                    $this->setInsertedId($processed_reponse);

                    return $this->getInsertedId();
                }

                return false;
            }


            /**
             * Update Rows
             * 
             * The conditions can be a string (where string) or an array with the structure:
             * 
             * $conditions = [
             *  'column_name' => value
             * ]
             * 
             * or
             * 
             * $conditions = [
             *  'column_name comparison_operator' => value
             * ]
             * 
             * @param String $table
             * @param Array $data
             * @param Array | String $conditions Array or String
             * @return Bool | Int
             */
            public function update(String $table, Array $data, Array | String $conditions = []): Bool | Int {
                $this->setError();

                if ( empty($table) ) {
                    throw new CnfDbApiRepositoryException('emptyTableException');
                }
                if ( empty($data) ) {
                    throw new CnfDbApiRepositoryException('emptyDataException');
                }

                $db_rc = $this->getDbRestClient();

                $params = ['datos' => $data];
                if ( !empty($conditions) ) {
                    $params['condicion'] = $conditions;
                }
                
                $result = $db_rc->post("actualizar/{$table}",$params);

                $processed_reponse = $this->processResult($result->response, 'actualizar');
                
                if ( !empty($processed_reponse) ) {
                    $this->setAffectedRows($processed_reponse);

                    return $this->getAffectedRows();
                }

                return false;
            }


            /**
             * Delete Rows
             * 
             * The conditions can be a string (where string) or an array with the structure:
             * 
             * $conditions = [
             *  'column_name' => value
             * ]
             * 
             * or
             * 
             * $conditions = [
             *  'column_name comparison_operator' => value
             * ]
             * 
             * @param String $table
             * @param Array | String $conditions Array or String
             * @return Bool
             */
            public function delete(String $table, Array | String $conditions = []): Bool {
                $this->setError();

                if ( empty($table) ) {
                    throw new CnfDbApiRepositoryException('emptyTableException');
                }

                $db_rc = $this->getDbRestClient();

                $params = [];

                if ( !empty($conditions) ) {
                    $params['condicion'] = $conditions;
                }

                $result = $db_rc->post("eliminar/{$table}",$params);
                
                $processed_reponse = $this->processResult($result->response, 'eliminar');

                if ( !empty($processed_reponse) ) {
                    return true;
                }

                return false;
            }


            /**
             * Gets the db version
             * 
             * @return Sring
             */
            public function getVersion(): String {
                $this->setError();

                $db_rc = $this->getDbRestClient();

                $result = $db_rc->post("version");

                if ( !empty($result->response) ) {
                    return $result->response;
                }
                
                return '';
            }

        //---------------------------  Optional functions  ---------------------------

    //---------------------------  Function implementation  ---------------------------


    //---------------------------  Auxiliary Functions  ---------------------------

        /**
         * Function that gets the RestClient
         * 
         * @return \RestClient
         */
        private function getDbRestClient(): \RestClient {
            if ( empty($this->dbRestClient) ) {
                $this->dbRestClient = new \RestClient([
                    'base_url' => $this->url,
                    'headers'  => ['Ephylone' => $this->ephylone],
                ]);
            }

            return $this->dbRestClient;
        }


        /**
         * If has rowLimit then adds the limit to the query
         */
        private function addsLimitToQueryWhenNeeded() {
            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();

            if ( !empty($rowLimit) && !empty($query) && stripos($query,'LIMIT') === false ) {
                $query .= " LIMIT {$rowLimit} ";
            }

            $this->setQuery($query);
        }


        /**
         * Process the result
         * 
         * @param Mixed $response
         * @param String $query
         * @return Mixed Array when success, null when error
         */
        private function processResult($response, $query): Mixed {
            $response_array = json_decode($response,true);
            
            //Error
                if ( empty($response_array) ) {
                    $this->setLastQuery($query);
                    $this->setError(['messages' => 'Respuesta vacía o no procesable']);

                    return null;
                }
                elseif ( $response_array['status'] < 200 || $response_array['status'] > 299 ) {
                    $this->setLastQuery($query);
                    $this->setError($response_array);

                    return null;
                }
            //Error

            if ( isset($response_array['query_ejecutada']) ) {
                $this->setLastQuery($response_array['query_ejecutada']);
            }
            else {
                $this->setLastQuery($query);
            }

            //Select
                if ( isset($response_array['resultado']) ) {
                    return (!empty($response_array['resultado'])) ? $response_array['resultado'] : [];
                }
            //Select

            //Insert
                elseif ( isset($response_array['lastid']) ) {
                    return $response_array['lastid'];
                }
            //Insert

            //Update
                elseif ( isset($response_array['registrosafectados']) ) {
                    return $response_array['registrosafectados'];
                }
            //Update

            //Delete
                elseif ( isset($response_array['msg']) ) {
                    return $response_array['msg'];
                }
            //Delete

            //Error
                else {
                    return null;
                }
            //Error
        }

    //---------------------------  Auxiliary Functions  ---------------------------

}