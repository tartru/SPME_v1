<?php
/**
 * LaravelRepository Laravel DB conecction
 * 
 * Class to handle the connection with Laravel
 * 
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\Repository;


class LaravelRepository extends Repository {


    /**
     * List of conexions to the database
     * 
     * @var Array
     * @access private
     */
    private static Array $connections;


    /**
     * The Laravel conecction
     * 
     * @var Mixed
     * @access private
     */
    private Mixed $dbConnection;


    /**
     * The Laravel Facade
     * 
     * @var String
     * @access private
     */
    private String $connectionFC = '';


    /**
     * The connection type 
     * 
     * @var String
     * @access private
     */
    private String $connectionType = '';


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



    private function __construct(String $newConnectionFC, String $newConnectionType) {
        $this->setConnectionFC($newConnectionFC);
        $this->setConnectionType($newConnectionType);

        $this->setInsertedId(0);
        $this->setRowLimit(0);
    }


    /**
     * Set the connectionFC var
     * 
     * @param String $newConnectionFC
     * @return Void
     */
    public function setConnectionFC(String $newConnectionFC): void {
        $this->connectionFC = $newConnectionFC;
    }


    /**
     * Set the connectionType var
     * 
     * @param String $newConnectionType
     * @return Void
     */
    public function setConnectionType(String $newConnectionType): void {
        $this->connectionType = $newConnectionType;
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
            if ( empty($params['connection']) ) {
                throw new LaravelRepositoryException('connectionTypeNotValidException');
            }

            if ( !empty(self::$connections[$params['connection']]) ) {
                return self::$connections[$params['connection']];
            }

            else {
                if ( empty($params['db_facade']) ) {
                    throw new LaravelRepositoryException('facadeNotValidException');
                }

                if ( empty(self::$connections) ) {
                    self::$connections = [];
                }
                
                self::$connections[$params['connection']] = new self($params['db_facade'],$params['connection']);

                return self::$connections[$params['connection']];
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
                throw new LaravelRepositoryException('emptyQueryException');
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
                throw new LaravelRepositoryException('emptyQueryException');
            }



            $db_conn = $this->getDBConnection();

            try {
                $result = $db_conn->select($query);
            }
            catch ( Exception $e ) {
                $this->setLastQuery($query);

                if ( is_numeric($e->getCode()) ) {
                    $this->setErrorNumber((int)$e->getCode());
                }
                else {
                    $this->setErrorNumber(0);
                }
                $this->setErrorMessage($e->getMessage());

                return null;
            }


            if ( $rowLimit != 1 ) {
                $result = array_map(fn($t_result) => (array)$t_result, $result);
            }



            return $result;
        }


        /**
         * Returns all the rows
         * 
         * @return ?Array Array when success, null when error
         */
        public function getAllRows(): ?Array {
            $query = $this->getQuery(true);


            $result = $this->query($query);


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


            $result = $this->query($query,1);

            if ( !empty($result) ) {
                return (array)reset($result);
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
                throw new LaravelRepositoryException('emptyColumnException');
            }

            $this->setRowLimit(1);
            $this->addsLimitToQueryWhenNeeded();
            $query = $this->getQuery(true);
            $this->setRowLimit(0);


            $result = $this->query($query,1);

            if ( !empty($result) ) {
                $result_array = (array)reset($result);

                if ( array_key_exists($name,$result_array) ) {
                    return $result_array[$name];
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
                throw new LaravelRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();


            $result = $this->query($query);


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
                throw new LaravelRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();


            $result = $this->query($query);


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
                throw new LaravelRepositoryException('emptyColumnException');
            }

            $query    = $this->getQuery(true);
            $rowLimit = $this->getRowLimit();


            $result = $this->query($query);


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
            $result = $this->query($query,1);

            if ( !empty($result) ) {
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

                $qry = "SELECT TABLE_NAME
                    FROM
                        INFORMATION_SCHEMA.TABLES
                    WHERE
                        table_schema = DATABASE();";
                
                $this->setQuery($qry);
                return $this->getOneColumn('TABLE_NAME');
            }


            /**
             * List all the columns from a table
             * 
             * @param String $table
             * @return ?Array Array when success, null when error
             */
            public function getColumns(String $table): ?Array {
                $this->setError();

                $qry = "SELECT *
                    FROM
                        INFORMATION_SCHEMA.COLUMNS
                    WHERE
                        table_schema = DATABASE()
                        AND TABLE_NAME = '$table'";
                
                $this->setQuery($qry);
                return $this->getArrayWithColumnAsKey('COLUMN_NAME');
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
                    throw new LaravelRepositoryException('emptyColumnException');
                }

                $columns_info = $this->getColumns($table);

                if ( empty($columns_info) ) {
                    return null;
                }

                if ( empty($columns_info[$column]) ) {
                    throw new LaravelRepositoryException('columnNotValidException');
                }

                if ( stripos($columns_info[$column]['COLUMN_TYPE'],'enum') === false &&  stripos($columns_info[$column]['COLUMN_TYPE'],'set') === false  ) {
                    throw new LaravelRepositoryException('invalidColumnTypeException');
                }

                $options = explode("','", str_ireplace(["enum('","set('","')"],'',$columns_info[$column]['COLUMN_TYPE']) );

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
                    throw new LaravelRepositoryException('emptyTableException');
                }
                if ( empty($data) ) {
                    throw new LaravelRepositoryException('emptyDataException');
                }

                
                $db_conn = $this->getDBConnection();
                $result  = $db_conn->table($table)->insertGetId($data);

                if ( !empty($result) ) {
                    $this->setInsertedId($result);

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
                    throw new LaravelRepositoryException('emptyTableException');
                }
                if ( empty($data) ) {
                    throw new LaravelRepositoryException('emptyDataException');
                }

                $db_conn = $this->getDBConnection();

                if ( !empty($conditions) ) {
                    if ( is_array($conditions) ) {
                        $new_conditions = [];
                        foreach ( $conditions as $t_name_condition => $t_condition ) {
                            $t_name_condition_array = explode(' ',trim($t_name_condition));

                            if ( count($t_name_condition_array) == 1 ) {
                                $new_conditions[] = [$t_name_condition_array[0], '=', $t_condition];
                            }
                            else {
                                $new_conditions[] = [$t_name_condition_array[0], $t_name_condition_array[1], $t_condition];
                            }
                        }

                        $result  = $db_conn->table($table)->where($new_conditions)->update($data);
                    }
                    else {
                        $result  = $db_conn->table($table)->whereRaw($conditions)->update($data);
                    }
                }
                else {
                    $result  = $db_conn->table($table)->update($data);
                }
                
                if ( !empty($result) ) {
                    $this->setAffectedRows($result);

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
                    throw new LaravelRepositoryException('emptyTableException');
                }

                $db_conn = $this->getDBConnection();

                if ( !empty($conditions) ) {
                    if ( is_array($conditions) ) {
                        $new_conditions = [];
                        foreach ( $conditions as $t_name_condition => $t_condition ) {
                            $t_name_condition_array = explode(' ',trim($t_name_condition));

                            if ( count($t_name_condition_array) == 1 ) {
                                $new_conditions[] = [$t_name_condition_array[0], '=', $t_condition];
                            }
                            else {
                                $new_conditions[] = [$t_name_condition_array[0], $t_name_condition_array[1], $t_condition];
                            }
                        }

                        $result  = $db_conn->table($table)->where($new_conditions)->delete();
                    }
                    else {
                        $result  = $db_conn->table($table)->whereRaw($conditions)->delete();
                    }
                }
                else {
                    $result  = $db_conn->table($table)->delete();
                }
                
                if ( !empty($result) ) {
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
                $this->setQuery('SELECT VERSION() as version');
                $result = $this->getOneValue('version');

                if ( !empty($result) ) {
                    return $result;
                }
                
                return '';
            }

        //---------------------------  Optional functions  ---------------------------

    //---------------------------  Function implementation  ---------------------------


    //---------------------------  Auxiliary Functions  ---------------------------

        /**
         * Function that gets the connection
         * 
         * @return Mixed
         */
        private function getDBConnection(): Mixed {
            if ( empty($this->dbConnection) ) {
                $this->dbConnection = $this->connectionFC::connection($this->connectionType);
            }

            return $this->dbConnection;
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

    //---------------------------  Auxiliary Functions  ---------------------------

}