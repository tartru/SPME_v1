<?php
/**
 * Entity
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Entity;

use SPME\Shared\Persistence\Repository\Repository;
use SPME\Shared\Query\QueryManager;


class Entity {

    //---------------------------  Parámeters  ---------------------------

        /**
         * Class name
         * 
         * @var String
         * @access protected
         */
        protected String $_class_name = '';


        /**
         * The repository
         * 
         * @var Repository
         * @access protected
         */
        protected Repository $_repository;


        /**
         * A QueryManager
         * 
         * @var QueryManager
         * @access public
         */
        public ?QueryManager $_queryManager;


        /**
         * Table name
         * 
         * @var String
         * @access protected
         */
        protected String $_table = '';


        /**
         * Nombre de la llave.
         *
         * @var Array
         * @access protected
         */
        protected Array $_id = ['id'];


        /**
         * Columns
         * 
         * @var Array
         * @access protected
         */
        protected Array $_data = array();


        /**
         * Data types (for valueobjects)
         * 
         * @var Array
         * @access protected
         */
        protected Array $_data_types = array();


        /**
         * Indicates if this entity has timestamps
         * 
         * @var Bool
         * @access protected
         */
        protected Bool $_timestamps = false;


        /**
         * Indicates if this entity use a soft delete (logical delete)
         * 
         * @var Bool
         * @access protected
         */
        protected Bool $_soft_delete = false;


        /**
         * Indicates if this entity has an active flag
         * 
         * @var Bool
         * @access protected
         */
        protected Bool $_active_flag = false;


        /**
         * Extra flags
         * 
         * @var Array
         * @access protected
         */
        protected Array $_extra_flags = [];


        /**
         * Indicates if this entity has version control and indicates the colums to compare
         * 
         * @var Array
         * @access protected
         */
        protected Array $_version_control_columns = [];


        /**
         * Indicates if this entity has order and indicates the colums to compare
         * 
         * @var Array | Bool
         * @access protected
         */
        protected Array | Bool $_order_control_columns = [];

    //---------------------------  Parámeters  ---------------------------



    //---------------------------  Constructors  ---------------------------

        /**
         * find row by id or ids
         * 
         * @param Array | String | Int | Float | ValueObject $ids
         * @param Repository $newRepository
         * @param ?QueryManager $newQueryManager
         * @return ?self
         */
        public static function getById(Array | String | Int | Float | ValueObject $ids, Repository $newRepository, ?QueryManager $newQueryManager = null): ?self {
            if ( !is_null($newQueryManager) ) {
                $nEntity = new static($newRepository, newQueryManager: $newQueryManager);
            }

            else {
                $nEntity = new static($newRepository);
            }

            return $nEntity->find($ids);
        }


        /**
         * Adds where conditions, order and pagination to the query
         * 
         * @param Repository $newRepository
         * @param Array | String $conditions
         * @param String $order_by
         * @param String $order_type
         * @param ?Int $page
         * @param ?Int $cant_page
         * @param String $select
         * @param ?QueryManager $newQueryManager
         * @return self
         */
        public static function getWithFilter(Repository $newRepository, Array | String $conditions = [], String $order_by = '', String $order_type = '', ?Int $page = null, ?Int $cant_page = 100, String $select = '*', ?QueryManager $newQueryManager = null): self {
            if ( !is_null($newQueryManager) ) {
                $nEntity = new static($newRepository, newQueryManager: $newQueryManager);
            }

            else {
                $nEntity = new static($newRepository);
            }

            return $nEntity->filter($conditions, $order_by, $order_type, $page, $cant_page, $select);
        }


        /**
         * Adds the query and return it self
         * 
         * @param Repository $newRepository
         * @param String $query
         * @param ?QueryManager $newQueryManager
         * @return self
         */
        public static function getWithQuery(Repository $newRepository, String $query, ?QueryManager $newQueryManager = null): self {
            if ( !is_null($newQueryManager) ) {
                $nEntity = new static($newRepository, newQueryManager: $newQueryManager);
            }

            else {
                $nEntity = new static($newRepository);
            }

            return $nEntity->query($query);
        }


        /**
         * Binds the query, then adds it and return it self
         * 
         * @param Repository $newRepository
         * @param QueryManager $newQueryManager
         * @param String | Int $identifier The identifier or a query
         * @param Array $values
         * @param Array $blocks
         * @return self
         */
        public static function getWithBindedQuery(Repository $newRepository, QueryManager $newQueryManager, String | Int $identifier, Array $values = [], Array $blocks = []): self {
            $nEntity = new static($newRepository, newQueryManager: $newQueryManager);

            return $nEntity->bindQuery($identifier,$values,$blocks);
        }


        /**
         * Saves entity(s)
         * 
         * @param Array | Self $params
         * @param Repository $newRepository
         * @param ?QueryManager $newQueryManager
         * @return Bool | Self | Int | Array
         */
        public static function saveEntity(Array | Self $params, Repository $newRepository, ?QueryManager $newQueryManager = null): Bool | Self | Int | Array {
            if ( !is_null($newQueryManager) ) {
                $nEntity = new static($newRepository, newQueryManager: $newQueryManager);
            }

            else {
                $nEntity = new static($newRepository);
            }

            return $nEntity->save($params);
        }

    //---------------------------  Constructors  ---------------------------



    //---------------------------  Overloading  ---------------------------

        /**
         * Construct
         * 
         * @param Repository $newRepository
         * @param ?Array $newParams
         */
        public function __construct(Repository $newRepository, ?Array $newParams, ?QueryManager $newQueryManager = null) {
            $this->setRepository($newRepository);
            $this->setQueryManager($newQueryManager);

            if ( !empty($newParams) ) {
                $this->fill($newParams);
            }
        }
    

        /**
         * Returns parameters
         * 
         * @param String $name
         * @return Mixed
         */
        public function __get(String $name): Mixed {
            //My data
                if ( isset($this->_data[$name]) ) {
                    return $this->_data[$name];
                }
            //My data

            //Repository
                elseif ( $name == 'repository' ) {
                    return $this->_repository;
                }
            //Repository

            return null;
        }


        /**
         * Set a parameter
         * 
         * @param String $name
         * @param Mixed $value
         */
        public function __set(String $name, Mixed $value) {
            if ( isset($this->_data_types[$name]) && $this->_data_types[$name] && !is_a($value,$this->_data_types[$name]) ) {
                $this->_data[$name] = $this->_data_types[$name]::fromValue($value);
            }

            else {
                $this->_data[$name] = $value;
            }
        }


        /**
         * Validate if the param is set
         * 
         * @param String $name
         * @return Bool
         */
        public function __isset(String $name): Bool {
            if ( isset($this->_data[$name]) ) {
                return true;
            }

            return false;
        }


        /**
         * Unsets parameter
         * 
         * @param String $name
         */
        public function __unset($name) {
            if ( isset($this->_data[$name]) ) {
                unset($this->_data[$name]);
                return true;
            }

            return false;
        }
    
    
        /**
         * Execute the functions that where not defined
         * 
         * @param String $name The name of the function
         * @param ?Array $params The params
         * @return Mixed
         */
        public function __call(String $name, $params): Mixed {
            if ( stripos($name,'set') === 0 ) {
                $t_name = strtolower(str_ireplace('set','',$name));
                if ( in_array($t_name,$this->_extra_flags) ) {
                    return $this->_setExtraFlag($t_name,...$params);
                }
            }

            if ( method_exists($this->_repository,$name) ) {
                return $this->_repository->$name(...$params);
            }

            if ( !is_null($this->_queryManager) && method_exists($this->_queryManager,$name) ) {
                return $this->_queryManager->$name(...$params);
            }

            throw new EntityException('functionNotDefinedException');
        }


        /**
         * Prints the object
         */
        public function __toString() {
            $return = $this->className() . " => {";
                foreach ( $this->_data as $name => $val ) {
                    $return .= match ( gettype($val) ) {
                        'object' => (!is_null($val->value())) ? "$name => (" . gettype($val->value()) . ") $val, " : "$name => NULL, ",
                        'NULL'   => "$name => NULL, ",
                        'Array'  => "$name => " .print_r($val,true) . ", ",
                        default  => "$name => (" . gettype($val) . ") $val, "
                    };
                }
            $return .= "}";

            return $return;
        }

    //---------------------------  Overloading  ---------------------------



    //---------------------------  Query functions (R from CRUD)  ---------------------------

        /**
         * Sets the new query
         * 
         * @param String $newQuery
         * @return self
         */
        public function query(String $newQuery): self {
            $this->_repository->setQuery($newQuery);

            return $this;
        }


        /**
         * Gets the query result as an array of this class
         * 
         * @return Array
         */
        public function get(): Array {
            $this->ifDontHaveQuerySetBasic();

            $rows = $this->_repository->getAllRows();

            if ( empty($rows) ) {
                return [];
            }

            else {
                $result    = [];
                $className = $this->className();
                foreach ( $rows as $row ) {
                    $n_row = $this->getEmpty();
                    $n_row->fillFromRepository($row);
                    $result[] = $n_row;
                }

                return $result;
            }
        }


        /**
         * find row by id or ids
         * 
         * @param Array | String | Int | Float | ValueObject $ids
         * @return ?self
         */
        public function find(Array | String | Int | Float | ValueObject $ids): ?self {
            //Valid ids
                $cant_ids = count($this->_id);
                if ( ($cant_ids > 1 && !is_array($ids)) || (is_array($ids) && count($ids) != $cant_ids) ) {
                    throw new EntityException('idsMismatchException');
                }
            //Valid ids

            //Prepare ids
                $params = [];

                if ( !is_array($ids) ) {
                    $params[] = " {$this->_id[0]} = " . $this->processIfValueObject($ids) . " ";
                }

                else {
                    foreach ( $this->_id as $id_name ) {
                        if ( !isset($ids[$id_name]) ) {
                            throw new EntityException('idsMismatchException');
                        }

                        else {
                            $params[] = " {$id_name} = " . $this->processIfValueObject($ids[$id_name]) . " ";
                        }
                    }
                }
            //Prepare ids
            
            //Query
                $this->query("SELECT * FROM {$this->_table} WHERE " . implode(" AND ",$params));
            //Query

            return $this->first();
        }


        /**
         * Return the first element
         * 
         * @return ?self
         */
        public function first(): ?self {
            $this->ifDontHaveQuerySetBasic();
            $row = $this->_repository->getOneRow();

            if ( empty($row) ) {
                return null;
            }

            else {
                $n_row = $this->getEmpty();
                $n_row->fillFromRepository($row);

                return $n_row;
            }
        }


        /**
         * Adds where conditions, order and pagination to the query
         * 
         * @param Array | String $conditions
         * @param String $order_by
         * @param String $order_type
         * @param ?Int $page
         * @param ?Int $cant_page
         * @param String $select
         * @return self
         */
        public function filter(Array | String $conditions = [], String $order_by = '', String $order_type = '', ?Int $page = null, ?Int $cant_page = 100, String $select = '*'): self {
            //WHERE
                if ( !empty($conditions) ) {
                    if ( is_array($conditions) ) {
                        $t_conditions = [];
                        foreach ( $conditions as $name_condition => $value_condition ) {
                            if ( is_a($value_condition, 'SPME\Shared\ValueObject\ValueObject') ) {
                                if ( strpos($name_condition,' ') === false ) {
                                    $name_condition = "`{$name_condition}` =";
                                }
                                $t_conditions[] = " {$name_condition} '" . $value_condition->toRepository() . "' ";
                            }
                            else {
                                if ( is_int($name_condition) ) {
                                    $t_conditions[] = " {$value_condition} ";
                                }
                                else {
                                    if ( strpos($name_condition,' ') === false ) {
                                        $name_condition = "`{$name_condition}` =";
                                    }

                                    $t_conditions[] = " {$name_condition} " . $this->processIfValueObject($value_condition,true,true) . " ";
                                }
                            }
                        }

                        $conditions = " WHERE " . implode(' AND ', $t_conditions) . " ";
                    }
                    else {
                        $conditions = " WHERE $conditions ";
                    }
                }
                else {
                    $conditions = '';
                }
            //WHERE
            
            //ORDER BY
                if ( !empty($order_by) ) {
                    $order = " ORDER BY $order_by ";

                    if ( !empty($order_type) ) {
                        $order .= " " . $order_type . " ";
                    }
                }
                else {
                    $order = '';
                }
            //ORDER BY

            //Pagination
                if ( !empty($page) ) {
                    $init  = ($page > 0) ? (($page-1)*$cant_page) : 0;
                    $limit = " LIMIT {$init},{$cant_page} ";
                }
                else {
                    $limit = '';
                }
            //Pagination

            $qry = "SELECT $select FROM {$this->_table} $conditions $order $limit";

            $this->query($qry);

            return $this;
        }


        /**
         * Insert the values in the query with the query manager
         * 
         * @param String | Int $identifier The identifier or a query
         * @param Array $values
         * @param Array $blocks
         * @return String
         */
        public function bindQuery(String | Int $identifier, Array $values = [], Array $blocks = []): self {
            if ( empty($this->_queryManager) ) {
                throw new EntityException('QueryManagerNullException');
            }

            $qry = $this->_queryManager->bind($identifier,$values,$blocks);

            $this->query($qry);

            return $this;
        }


        /**
         * Count the rows in the query
         * 
         * @return ?Int
         */
        public function count(): ?Int {
            $this->ifDontHaveQuerySetBasic();

            $cant = $this->_repository->count();

            return $cant;
        }

    //---------------------------  Query functions (R from CRUD)  ---------------------------



    //---------------------------  CRUD functions (CUD from CRUD)  ---------------------------

        /**
         * Create
         * 
         * @param Array | Self $params
         * @return Bool | Self | Array
         */
        public function create(Array | Self $params = []): Bool | Self | Array {
            //Create my self
                if ( empty($params) ) {
                    if ( $this->_timestamps ) {
                        $today = date('Y-m-d H:i:s');
                        $this->created_at = $today;
                        $this->updated_at = $today;
                    }

                    $n_id = $this->_repository->insert($this->_table,$this->getDataForRepository());

                    if ( $n_id ) {
                        $id_name        = $this->getIdName();
                        $this->$id_name = $n_id;

                        return $this;
                    }
                    
                    else {
                        return false;
                    }
                }
            //Create my self

            //It's an instance of my class
                if ( is_a($params,$this->className()) ) {
                    return $params->create();
                }
            //It's an instance of my class

            //It's an array
                if ( is_array($params) ) {
                    $first = reset($params);
                    $empty = $this->getEmpty();

                    //Received parameters
                        if ( !is_array($first) && !is_a($first,$this->className()) ) {
                            $empty->fill($params);
                            return $empty->create();
                        }
                    //Received parameters

                    else {
                        $result  = [];
                        $id_name = $this->getIdName();
                        foreach ( $params as $row ) {
                            //Received an array of array of parameters
                                if ( is_array($row) ) {
                                    $empty->refill($row);
                                    $res = $empty->create();

                                    if ( !$res ) {
                                        return false;
                                    }

                                    $result[$res->value($id_name)] = $res;
                                }
                            //Received an array of array of parameters

                            //Received an array of instances of this class
                                else {
                                    $res = $row->create();

                                    if ( !$res ) {
                                        return false;
                                    }

                                    $result[$res->value($id_name)] = $res;
                                }
                            //Received an array of instances of this class
                        }

                        return $result;
                    }
                }
            //It's an array
        }


        /**
         * Update
         * 
         * @param Array | Self $params
         * @return Bool | Int | Array
         */
        public function update(Array | Self $params = []): Bool | Int | Array {
            //Update my self
                if ( empty($params) ) {
                    if ( $this->_timestamps ) {
                        $today = date('Y-m-d H:i:s');
                        $this->updated_at = $today;
                    }

                    $id_c = $this->getIdName();
                    $ra   = $this->_repository->update($this->_table,$this->getDataForRepository([$id_c]),[$id_c => $this->_data[$id_c]->toRepository()]);

                    return ($ra === false) ? false : true;
                }
            //Update my self

            //It's an instance of my class
                if ( is_a($params,$this->className()) ) {
                    return $params->update();
                }
            //It's an instance of my class

            //It's an array
                if ( is_array($params) ) {
                    $first = reset($params);
                    $empty = $this->getEmpty();

                    //Received parameters
                        if ( !is_array($first) && !is_a($first,$this->className()) ) {
                            $empty->fill($params);
                            return $empty->update();
                        }
                    //Received parameters

                    else {
                        $result  = [];
                        $id_name = $this->getIdName();
                        foreach ( $params as $row ) {
                            //Received an array of array of parameters
                                if ( is_array($row) ) {
                                    $empty->refill($row);
                                    $res = $empty->update();

                                    if ( $res === false ) {
                                        return false;
                                    }

                                    if ( isset($row[$id_name]) ) {
                                        $result[$this->processIfValueObject($row[$id_name],false)] = true;
                                    }
                                }
                            //Received an array of array of parameters

                            //Received an array of instances of this class
                                else {
                                    $res = $row->update();

                                    if ( $res === false ) {
                                        return false;
                                    }

                                    $result[$row->value($id_name)] = true;
                                }
                            //Received an array of instances of this class
                        }

                        return $result;
                    }
                }
            //It's an array
        }


        /**
         * Save
         * 
         * @param Array | Self $params
         * @return Bool | Self | Int | Array
         */
        public function save(Array | Self $params = []): Bool | Self | Int | Array {
            //Save my self
                if ( empty($params) ) {
                    $id_c = $this->getIdName();

                    //Create
                        if ( empty($this->_data[$id_c]) ) {
                            if ( $this->_timestamps ) {
                                $today = date('Y-m-d H:i:s');
                                $this->created_at = $today;
                                $this->updated_at = $today;
                            }
            
                            $n_id = $this->_repository->insert($this->_table,$this->getDataForRepository());
            
                            if ( $n_id ) {
                                $this->$id_c = $n_id;
            
                                return $this;
                            }
                            
                            else {
                                return false;
                            }
                        }
                    //Create

                    //Update
                        else {
                            if ( $this->_timestamps ) {
                                $today = date('Y-m-d H:i:s');
                                $this->updated_at = $today;
                            }
                            
                            $ra = $this->_repository->update($this->_table,$this->getDataForRepository([$id_c]),[$id_c => $this->_data[$id_c]->toRepository()]);

                            return ($ra === false) ? false : true;
                        }
                    //Update
                }
            //Save my self

            //It's an instance of my class
                if ( is_a($params,$this->className()) ) {
                    return $params->save();
                }
            //It's an instance of my class

            //It's an array
                if ( is_array($params) ) {
                    $first = reset($params);
                    $empty = $this->getEmpty();

                    //Received parameters
                        if ( !is_array($first) && !is_a($first,$this->className()) ) {
                            $empty->fill($params);
                            return $empty->save();
                        }
                    //Received parameters

                    else {
                        $result  = [];
                        $id_name = $this->getIdName();
                        foreach ( $params as $row ) {
                            //Received an array of array of parameters
                                if ( is_array($row) ) {
                                    $empty->refill($row);
                                    $res = $empty->save();

                                    if ( $res === false ) {
                                        return false;
                                    }

                                    $result[$empty->value($id_name)] = $res;
                                }
                            //Received an array of array of parameters

                            //Received an array of instances of this class
                                else {
                                    $res = $row->save();

                                    if ( $res === false ) {
                                        return false;
                                    }

                                    $result[$row->value($id_name)] = $res;
                                }
                            //Received an array of instances of this class
                        }

                        return $result;
                    }
                }
            //It's an array
        }


        /**
         * Delete, soft delete when its config
         * 
         * @param Array | Self $params
         * @return Bool | Array
         */
        public function delete(Array | Self $params = []): Bool | Array {
            //Delete my self
                if ( empty($params) ) {
                    $id_c = $this->getIdName();

                    if ( $this->_soft_delete ) {
                        $today            = date('Y-m-d H:i:s');
                        $this->deleted_at = $today;
                        $this->deleted    = true;
                        $toUpdate         = [
                            'deleted'    => 1,
                            'deleted_at' => $today
                        ];
                        
                        if ( $this->_timestamps ) {
                            $this->updated_at = $today;

                            $toUpdate['updated_at'] = $today;
                        }

                        $ra = $this->_repository->update($this->_table, $toUpdate, [$id_c => $this->_data[$id_c]->toRepository()]);
                    }
                    
                    else {
                        $ra = $this->_repository->delete($this->_table,[$id_c => $this->_data[$id_c]->toRepository()]);
                    }

                    return ($ra === false) ? false : true;
                }
            //Delete my self

            //It's an instance of my class
                if ( is_a($params,$this->className()) ) {
                    return $params->delete();
                }
            //It's an instance of my class

            //It's an array
                if ( is_array($params) ) {
                    $result  = [];
                    $id_name = $this->getIdName();
                    $empty   = $this->getEmpty();

                    foreach ( $params as $row ) {
                        $is_array = is_array($row);
                        $is_a     = is_a($row,$this->className());

                        //Received an array of ids
                            if ( !$is_array && !$is_a ) {
                                $processed_row_id = $this->processIfValueObject($row);
                                $empty->refill([$id_name => $processed_row_id]);
                                $res = $empty->delete();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$processed_row_id] = $res;
                            }
                        //Received an array of ids

                        //Received an array of instances of this class
                            elseif ( $is_a ) {
                                $res = $row->delete();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$row->value($id_name)] = $res;
                            }
                        //Received an array of instances of this class

                        //Received an array of array of parameters
                            elseif ( $is_array && isset($row[$id_name]) ) {
                                $processed_row_id = $this->processIfValueObject($row[$id_name]);
                                $empty->refill([$id_name => $processed_row_id]);
                                $res = $empty->delete();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$processed_row_id] = $res;
                            }
                        //Received an array of array of parameters
                    }

                    return $result;
                }
            //It's an array
        }


        /**
         * Destroy, hard delete.
         * 
         * @param Array | Self $params
         * @return Bool | Array
         */
        public function destroy(Array | Self $params = []): Bool | Array {
            //Destroy my self
                if ( empty($params) ) {
                    $id_c = $this->getIdName();

                    $ra = $this->_repository->delete($this->_table,[$id_c => $this->_data[$id_c]->toRepository()]);

                    return ($ra === false) ? false : true;
                }
            //Destroy my self

            //It's an instance of my class
                if ( is_a($params,$this->className()) ) {
                    return $params->destroy();
                }
            //It's an instance of my class

            //It's an array
                if ( is_array($params) ) {
                    $result  = [];
                    $id_name = $this->getIdName();
                    $empty   = $this->getEmpty();

                    foreach ( $params as $row ) {
                        $is_array = is_array($row);
                        $is_a     = is_a($row,$this->className());

                        //Received an array of ids
                            if ( !$is_array && !$is_a ) {
                                $processed_row_id = $this->processIfValueObject($row);
                                $empty->refill([$id_name => $processed_row_id]);
                                $res = $empty->destroy();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$processed_row_id] = $res;
                            }
                        //Received an array of ids

                        //Received an array of instances of this class
                            elseif ( $is_a ) {
                                $res = $row->destroy();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$row->value($id_name)] = $res;
                            }
                        //Received an array of instances of this class

                        //Received an array of array of parameters
                            elseif ( $is_array && isset($row[$id_name]) ) {
                                $processed_row_id = $this->processIfValueObject($row[$id_name]);
                                $empty->refill([$id_name => $processed_row_id]);
                                $res = $empty->destroy();

                                if ( $res === false ) {
                                    return false;
                                }

                                $result[$processed_row_id] = $res;
                            }
                        //Received an array of array of parameters
                    }

                    return $result;
                }
            //It's an array
        }


        /**
         * Updates data where conditions
         * 
         * $data and $conditions needs to be sanitized before pasing to this function
         * 
         * @param Array $data
         * @param Array $conditions
         * @return Bool
         */
        public function updateWhere(Array $data, Array | String $conditions): Bool {
            if ( $this->_timestamps && empty($data['updated_at']) ) {
                $today = date('Y-m-d H:i:s');
                $data['updated_at'] = $today;
            }

            $conditions = (is_array($conditions)) ? $this->processIfValueObject($conditions) : $conditions;
            $ra = $this->_repository->update($this->_table, $this->processIfValueObject($data), $conditions);

            return ($ra === false) ? false : true;
        }


        /**
         * Deletes softly data where conditions
         * 
         * $data and $conditions needs to be sanitized before pasing to this function
         * 
         * @param Array $conditions
         * @return Bool
         */
        public function deleteWhere(Array | String $conditions): Bool {
            $conditions = (is_array($conditions)) ? $this->processIfValueObject($conditions) : $conditions;

            if ( $this->_soft_delete ) {
                $today = date('Y-m-d H:i:s');
                $data  = [
                    'deleted_at' => $today,
                    'deleted'    => 1,
                ];
                
                if ( $this->_timestamps ) {
                    $data['updated_at'] = $today;
                }

                $ra = $this->_repository->update($this->_table, $data, $conditions);

                return ($ra === false) ? false : true;
            }

            else {
                $ra = $this->_repository->delete($this->_table, $conditions);

                return ($ra === false) ? false : true;
            }
        }


        /**
         * Destroy, hard deletes data where conditions
         * 
         * $data and $conditions needs to be sanitized before pasing to this function
         * 
         * @param Array $conditions
         * @return Bool
         */
        public function destroyWhere(Array | String $conditions): Bool {
            $conditions = (is_array($conditions)) ? $this->processIfValueObject($conditions) : $conditions;
            $ra = $this->_repository->delete($this->_table, $conditions);

            return ($ra === false) ? false : true;
        }

    //---------------------------  CRUD functions (CUD from CRUD)  ---------------------------



    //---------------------------  Actions  ---------------------------

        /**
         * Activate
         * 
         * @return Bool
         */
        public function activate() {
            $today = date('Y-m-d H:i:s');

            $this->active       = true;
            $this->activated_at = $today;

            return $this->save();
        }


        /**
         * Deactivate
         * 
         * @return Bool
         */
        public function deactivate() {
            $today = date('Y-m-d H:i:s');

            $this->active       = false;
            $this->activated_at = $today;

            return $this->save();
        }


        /**
         * Set extra flag
         * 
         * @param String $extra_flag
         * @param Bool $value
         * @return Bool
         */
        protected function _setExtraFlag(String $extra_flag, Bool $value = true): Bool {
            $today = date('Y-m-d H:i:s');

            $this->$extra_flag = $value;
            $extra_flag_at .= '_at';
            $this->$extra_flag_at  = $today;

            return $this->save();
        }


        /**
         * Creates a new version
         * 
         * @param Array $modified_data
         * @return Self
         */
        public function createNewVersion(Array $modified_data = []): Self {
            //Clone the entity
                $newVersion = clone $this;
            //Clone the entity

            //Unset the ids
                $ids = $this->getIdName();
                if ( is_array($ids) ) {
                    foreach ( $ids as $t_id ) {
                        unset($newVersion->$t_id);
                    }
                }
                else {
                    unset($newVersion->$ids);
                }
            //Unset the ids

            //Change the columns
                $version_control_columns = $newVersion->getDataForRepository(only: $newVersion->_version_control_columns);

                if ( $newVersion->_soft_delete ) {
                    $version_control_columns[] = " (`deleted` != 1) ";
                }

                $next_version             = $newVersion->filter($version_control_columns, select: "MAX(version) as maxim")->getOneValue('maxim') + 1;
                $modified_data['version'] = $next_version;
                $modified_data['vpos']    = -1;
                $newVersion->fill($modified_data);
            //Change the columns

            //Saves / creates the entity
                $newVersion->create();
            //Saves / creates the entity

            //Changes the vpos
                $t_conditions = [];
                foreach ( $version_control_columns as $name_col => $value_col ) {
                    if ( !is_int($name_col) ) {
                        $t_conditions[] = " `{$name_col}` = \'{$value_col}\' ";
                    }
                    else {
                        $t_conditions[] = " {$value_col} ";
                    }
                }

                $qry = "CALL forceUpdate('" . $newVersion->getTable() . "', '`vpos` = `vpos`+1', '" . implode(' AND ',$t_conditions) . "', @affectedRows)";
                $newVersion->query($qry);
                $newVersion->_repository->simpleQuery();
            //Changes the vpos

            return $newVersion;
        }


        /**
         * Change the position UP
         * 
         * @return Bool
         */
        public function positionUp(): Bool {
            if ( is_array($this->_order_control_columns) ) {
                $order_control_columns  = $this->getDataForRepository(only: $this->_order_control_columns);
            }
            else {
                $order_control_columns  = [];
            }

            $next_position = $this->value('position') + 1;
            $order_control_columns['position'] = $next_position;
            
            if ( $this->_soft_delete ) {
                $order_control_columns[] = " (`deleted` != 1) ";
            }

            $next = $this->filter($order_control_columns)->first();

            if ( !empty($next) ) {
                $next->position = $this->position;
                $this->position = $next_position;

                $next->save();
                $this->save();

                return true;
            }

            else {
                return false;
            }
        }

        
        /**
         * Change the position Down
         * 
         * @return Bool
         */
        public function positionDown(): Bool {
            if ( is_array($this->_order_control_columns) ) {
                $order_control_columns  = $this->getDataForRepository(only: $this->_order_control_columns);
            }
            else {
                $order_control_columns  = [];
            }

            $next_position = $this->value('position') - 1;
            $order_control_columns['position'] = $next_position;
            
            if ( $this->_soft_delete ) {
                $order_control_columns[] = " (`deleted` != 1) ";
            }

            $next = $this->filter($order_control_columns)->first();

            if ( !empty($next) ) {
                $next->position = $this->position;
                $this->position = $next_position;

                $next->save();
                $this->save();

                return true;
            }

            else {
                return false;
            }
        }


        /**
         * Change the position to new value
         * 
         * @param Int $newPosition
         * @return Bool
         */
        public function positionChangeTo(Int $newPosition): Bool {
            $myPosition = $this->value('position');
            if ( $newPosition == $myPosition ) {
                return true;
            }

            if ( is_array($this->_order_control_columns) ) {
                $order_control_columns  = $this->getDataForRepository(only: $this->_order_control_columns);
            }
            else {
                $order_control_columns  = [];
            }

            if ( $this->_soft_delete ) {
                $order_control_columns[] = " (`deleted` != 1) ";
            }

            $limites = $this->filter($order_control_columns, select: 'MIN(position) as minim,MAX(position) as maxim')->_repository->getOneRow();

            if ( empty($limites) ) {
                return false;
            }
            elseif ( $newPosition < $limites['minim'] || $newPosition > $limites['maxim'] ) {
                return false;
            }

            //Changes the positions
                $t_conditions = [];
                foreach ( $order_control_columns as $name_col => $value_col ) {
                    if ( !is_int($name_col) ) {
                        $t_conditions[] = " `{$name_col}` = \'{$value_col}\' ";
                    }
                    else {
                        $t_conditions[] = " {$value_col} ";
                    }
                }

                if ( $newPosition < $myPosition ) {
                    $t_conditions[] = " `position` >= \'$newPosition\' ";
                    $t_conditions[] = " `position` < \'$myPosition\' ";
                    $qry = "CALL forceUpdate('" . $this->getTable() . "', '`position` = `position`+1', '" . implode(' AND ',$t_conditions) . "', @affectedRows)";
                }
                else {
                    $t_conditions[] = " `position` <= \'$newPosition\' ";
                    $t_conditions[] = " `position` > \'$myPosition\' ";
                    $qry = "CALL forceUpdate('" . $this->getTable() . "', '`position` = `position`-1', '" . implode(' AND ',$t_conditions) . "', @affectedRows)";
                }

                $this->query($qry);
                $this->_repository->simpleQuery();
            //Changes the positions

            //Saves the new position
                $this->position = $newPosition;

                return $this->save();
            //Saves the new position
        }

    //---------------------------  Actions  ---------------------------



    //---------------------------  getters and setters  ---------------------------

        /**
         * Gets the repository
         * 
         * @return Repository
         */
        public function getRepository(): Repository {
            return $this->_repository;
        }


        /**
         * Sets the repository
         * 
         * @param Repository $repository
         */
        public function setRepository(Repository $repository) {
            $this->_repository = $repository;
        }


        /**
         * Sets the queryManager
         * 
         * @param ?QueryManager $qm
         */
        public function setQueryManager(?QueryManager $qm) {
            $this->_queryManager = $qm;
        }


        /**
         * Gets the table name
         * 
         * @return String
         */
        public function getTable(): String {
            return $this->_table;
        }


        /**
         * Sets the table
         * 
         * @param String $table
         */
        public function setTable(String $table) {
            $this->_table = $table;
        }


        /**
         * Gets the id names
         * 
         * @return Array | String
         */
        public function getIdName(): Array | String {
            if ( count($this->_id) == 1 ) {
                return $this->_id[0];
            }

            else {
                return $this->_id;
            }
        }


        /**
         * Sets the id names
         * 
         * @param Array | String $idNames
         */
        public function setIdName(Array | String $idNames) {
            if ( is_string($idNames) ) {
                $this->_id[0] = $idNames;
            }

            else {
                $this->_id = $idNames;
            }
        }


        /**
         * Returns the primitive value of a value object
         * 
         * @param String $name
         * @return Mixed
         */
        public function value(String $name): Mixed {
            if ( isset($this->_data[$name]) ) {
                return $this->_data[$name]->value();
            }
        }


        /**
         * Returns the primitive values of the value objects
         * 
         * @param Array $notIncluded
         * @param ?Array $only
         * @return Array
         */
        public function getValues(Array $notIncluded = [], ?Array $only = null): Array {

            $return = [];

            if ( empty($only) ) {
                foreach ( $this->_data as $name => $value ) {
                    if ( !in_array($name,$notIncluded) ) {
                        $return[$name] = (!is_null($this->_data[$name])) ? $this->_data[$name]->value() : null;
                    }
                }
            }
            
            else {
                foreach ( $only as $name ) {
                    if ( array_key_exists($name, $this->_data) ) {
                        $return[$name] = (!is_null($this->_data[$name])) ? $this->_data[$name]->value() : null;
                    }
                }
            }

            return $return;
        }


        /**
         * Sets a value from repository
         * 
         * @param String $name
         * @param Mixed $value
         */
        public function setFromRepository(String $name, Mixed $value) {
            if ( isset($this->_data_types[$name]) && $this->_data_types[$name] ) { // && !is_a($value,$this->_data_types[$name]) 
                $this->_data[$name] = $this->_data_types[$name]::fromRepository($value);
            }

            else {
                $this->_data[$name] = $value;
            }
        }


        /**
         * Sets the data types
         * 
         * @param Array $dataTypes
         */
        protected function setDataTypes(Array $dataTypes) {
            $this->_data_types = [];

            foreach ( $dataTypes as $name => $value ) {
                if ( is_int($name) ) {
                    $this->_data_types[$value] = false;
                }

                else {
                    $this->_data_types[$name] = $value;
                }
            }

            if ( $this->_timestamps ) {
                if ( !isset($this->_data_types['created_at']) ) {
                    $this->_data_types['created_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }

                if ( !isset($this->_data_types['updated_at']) ) {
                    $this->_data_types['updated_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }

            if ( $this->_soft_delete ) {
                if ( !isset($this->_data_types['deleted']) ) {
                    $this->_data_types['deleted'] = 'SPME\Shared\ValueObject\BoolValueObject';
                }

                if ( !isset($this->_data_types['deleted_at']) ) {
                    $this->_data_types['deleted_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }

            if ( $this->_active_flag ) {
                if ( !isset($this->_data_types['active']) ) {
                    $this->_data_types['active'] = 'SPME\Shared\ValueObject\BoolValueObject';
                }

                if ( !isset($this->_data_types['activated_at']) ) {
                    $this->_data_types['activated_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }

            if ( !empty($this->_extra_flags) ) {
                foreach ( $this->_extra_flags as $t_extra_flag ) {
                    if ( !isset($this->_data_types[$t_extra_flag]) ) {
                        $this->_data_types[$t_extra_flag] = 'SPME\Shared\ValueObject\BoolValueObject';
                    }

                    if ( !isset($this->_data_types[$t_extra_flag . '_at']) ) {
                        $this->_data_types[$t_extra_flag . '_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                    }
                }
            }

            if ( !empty($this->_version_control_columns) ) {
                if ( !isset($this->_data_types['version']) ) {
                    $this->_data_types['version'] = 'SPME\Shared\ValueObject\IntValueObject';
                }

                if ( !isset($this->_data_types['vpos']) ) {
                    $this->_data_types['vpos'] = 'SPME\Shared\ValueObject\IntValueObject';
                }
            }

            if ( !empty($this->_order_control_columns) ) {
                if ( !isset($this->_data_types['position']) ) {
                    $this->_data_types['position'] = 'SPME\Shared\ValueObject\IntValueObject';
                }
            }
        }


        /**
         * Sets the timestamps
         * 
         * @param Bool $with_timestamp
         */
        protected function withTimestamp(Bool $with_timestamp = true) {
            $this->_timestamps = $with_timestamp;

            if ( $this->_timestamps ) {
                if ( !isset($this->_data_types['created_at']) ) {
                    $this->_data_types['created_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }

                if ( !isset($this->_data_types['updated_at']) ) {
                    $this->_data_types['updated_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }
        }


        /**
         * Sets the $_soft_delete var
         * 
         * @param Bool $with_soft_delete
         */
        protected function withSoftDelete(Bool $with_soft_delete = true) {
            $this->_soft_delete = $with_soft_delete;

            if ( $this->_soft_delete ) {
                if ( !isset($this->_data_types['deleted']) ) {
                    $this->_data_types['deleted'] = 'SPME\Shared\ValueObject\BoolValueObject';
                }

                if ( !isset($this->_data_types['deleted_at']) ) {
                    $this->_data_types['deleted_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }
        }


        /**
         * Sets the $_active_flag var
         * 
         * @param Bool $with_active_flag
         */
        protected function withActiveFlag(Bool $with_active_flag = true) {
            $this->_active_flag = $with_active_flag;

            if ( $this->_active_flag ) {
                if ( !isset($this->_data_types['active']) ) {
                    $this->_data_types['active'] = 'SPME\Shared\ValueObject\BoolValueObject';
                }

                if ( !isset($this->_data_types['activated_at']) ) {
                    $this->_data_types['activated_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                }
            }
        }


        /**
         * Sets the $_extra_flags var
         * 
         * @param Array $extra_flags
         */
        protected function withExtraFlags(Array $extra_flags = []) {
            $this->_extra_flags = $extra_flags;

            if ( !empty($this->_extra_flags) ) {
                foreach ( $this->_extra_flags as $t_extra_flag ) {
                    if ( !isset($this->_data_types[$t_extra_flag]) ) {
                        $this->_data_types[$t_extra_flag] = 'SPME\Shared\ValueObject\BoolValueObject';
                    }

                    if ( !isset($this->_data_types[$t_extra_flag . '_at']) ) {
                        $this->_data_types[$t_extra_flag . '_at'] = 'SPME\Shared\ValueObject\DateTimeValueObject';
                    }
                }
            }
        }


        /**
         * Sets the $_version_control_columns var
         * 
         * @param Array $version_control_columns
         */
        protected function withVersionControl(Array $version_control_columns = []) {
            $this->_version_control_columns = $version_control_columns;

            if ( !empty($this->_version_control_columns) ) {
                if ( !isset($this->_data_types['version']) ) {
                    $this->_data_types['version'] = 'SPME\Shared\ValueObject\IntValueObject';
                }

                if ( !isset($this->_data_types['vpos']) ) {
                    $this->_data_types['vpos'] = 'SPME\Shared\ValueObject\IntValueObject';
                }
            }
        }


        /**
         * Sets the $_order_control_columns var
         * 
         * @param Array $order_control_columns
         */
        protected function withOrder(Array $order_control_columns = []) {
            $this->_order_control_columns = (!empty($order_control_columns)) ? $order_control_columns : true;

            if ( !empty($this->_order_control_columns) ) {
                if ( !isset($this->_data_types['position']) ) {
                    $this->_data_types['position'] = 'SPME\Shared\ValueObject\IntValueObject';
                }
            }
        }

    //---------------------------  getters and setters  ---------------------------



    //---------------------------  Auxiliary functions  ---------------------------

        /**
         * Returns the class name
         * 
         * @return String
         */
        public function className(): String {
            if ( empty($this->_class_name) ) {
                $this->_class_name = get_class($this);
            }
            return $this->_class_name;
        }


        /**
         * Return the data array
         * 
         * @param Array $notIncluded
         * @param ?Array $only
         * @return Array
         */
        public function getData(Array $notIncluded = [], ?Array $only = null): Array {
            $emptyOnly = empty($only);

            if ( empty($notIncluded) && $emptyOnly ) {
                return $this->_data;
            }
            
            $return = [];

            if ( empty($only) ) {
                foreach ( $this->_data as $name => $value ) {
                    if ( !in_array($name,$notIncluded) ) {
                        $return[$name] = $this->_data[$name];
                    }
                }
            }
            
            else {
                foreach ( $only as $name ) {
                    if ( array_key_exists($name, $this->_data) ) {
                        $return[$name] = $this->_data[$name];
                    }
                }
            }

            return $return;
        }


        /**
         * Returns the data for repository
         * 
         * @param Array $notIncluded
         * @param ?Array $only
         * @return Array
         */
        public function getDataForRepository(Array $notIncluded = [], ?Array $only = null): Array {

            $return = [];

            if ( empty($only) ) {
                foreach ( $this->_data_types as $name => $type ) {
                    if ( !in_array($name,$notIncluded) && array_key_exists($name, $this->_data) ) {
                        $return[$name] = (!is_null($this->_data[$name])) ? $this->_data[$name]->toRepository() : null;
                    }
                }
            }
            
            else {
                foreach ( $only as $name ) {
                    if ( isset($this->_data_types[$name]) && array_key_exists($name, $this->_data) ) {
                        $return[$name] = (!is_null($this->_data[$name])) ? $this->_data[$name]->toRepository() : null;
                    }
                }
            }

            return $return;
        }


        /**
         * Sets the data
         * 
         * @param Array $newData
         */
        public function setData(Array $newData = []) {
            $this->_data = $newData;
        }


        /**
         * Empty the data
         */
        public function emptyData() {
            $this->_data = [];
        }


        /**
         * Gets an instance of this class without data
         * 
         * @return self
         */
        public function getEmpty(): self {
            $className = $this->className();

            if ( !is_null($this->_queryManager) ) {
                return new $className($this->_repository, newQueryManager: $this->_queryManager);
            }

            else {
                return new $className($this->_repository);
            }
            
        }


        /**
         * Sets the data from array transforming in value objects
         * 
         * @param Array $newData
         */
        public function fill(Array $newData = []) {
            foreach ( $newData as $name => $value ) {
                $this->$name = $value;
            }
        }


        /**
         * Empty the data and refill
         * 
         * @param Array $newData
         */
        public function refill(Array $newData = []) {
            $this->emptyData();
            $this->fill($newData);
        }


        /**
         * Sets the data from array transforming in value objects
         * 
         * @param Array $newData
         */
        public function fillFromRepository(Array $newData = []) {
            foreach ( $newData as $name => $value ) {
                $this->setFromRepository($name, $value);
            }
        }


        /**
         * Empty the data and refill
         * 
         * @param Array $newData
         */
        public function refillFromRepository(Array $newData = []) {
            $this->emptyData();
            $this->fillFromRepository($newData);
        }


        /**
         * Gets the names of the columns
         * 
         * @return ?Array
         */
        public function getColumns(): ?Array {
            return $this->_repository->getColumns($this->_table);
        }


        /**
         * Gets the options of the column
         * 
         * @param String $column
         * @return ?Array
         */
        public function getColumnOptions(String $column): ?Array {
            return $this->_repository->getColumnOptions($this->_table, $column);
        }


        /**
         * Process array from ValueObject array
         * 
         * @param Mixed $data
         * @param Bool $toRepository
         * @param Bool $cleanIfNotValueObject
         * @return Mixed
         */
        public function processIfValueObject($data, Bool $toRepository = true, Bool $cleanIfNotValueObject = false): Mixed {
            if ( is_array($data) ) {
                $result = [];

                if ( $toRepository ) {
                    foreach ( $data as $name => $value ) {
                        if ( is_a($value, 'SPME\Shared\ValueObject\ValueObject') ) {
                            $result[$name] = $value->toRepository();
                        }
                        elseif ( $cleanIfNotValueObject ) {
                            $result[$name] = $this->_repository->cleanValue($value);
                        }
                        else {
                            $result[$name] = $value;
                        }
                    }
                }

                else {
                    foreach ( $data as $name => $value ) {
                        if ( is_a($value, 'SPME\Shared\ValueObject\ValueObject') ) {
                            $result[$name] = $value->value();
                        }
                        elseif ( $cleanIfNotValueObject ) {
                            $result[$name] = $this->_repository->cleanValue($value);
                        }
                        else {
                            $result[$name] = $value;
                        }
                    }
                }

                return $result;
            }

            else {
                if ( is_a($data, 'SPME\Shared\ValueObject\ValueObject') ) {
                    return ($toRepository) ? $data->toRepository() : $data->value();
                }
                elseif ( $cleanIfNotValueObject ) {
                    return $this->_repository->cleanValue($data);
                }
                else {
                    return $data;
                }
            }
        }


        /**
         * If the repository doesn't have a query, then sets a basic query
         * 
         * @param ?String $newBasicQuery
         */
        protected function ifDontHaveQuerySetBasic(String $newBasicQuery = null) {
            $t_query = $this->_repository->getQuery();
            if ( empty($t_query) ) {
                $this->query(((empty($newBasicQuery)) ? "SELECT * FROM {$this->_table}" : $newBasicQuery));
            }
        }

    //---------------------------  Auxiliary functions  ---------------------------

}