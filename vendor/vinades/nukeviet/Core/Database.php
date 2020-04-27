<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 12 Sep 2013 04:07:53 GMT
 */

namespace NukeViet\Core;

use PDO;
use PDOStatement;
use PDOException;

/**
 * extends for PDO
 */
class Database extends PDO
{
    public $connect = 0;
    public $server = '';
    public $dbname = '';
    public $user = '';
    public $dbtype = '';

    private $_select = '';
    private $_from = '';
    private $_join = '';
    private $_where = '';
    private $_group = '';
    private $_having = '';
    private $_order = '';
    private $_limit = 0;
    private $_offset = 0;

    private $sqls = [];
    private $debug = false;
    private $allowedDebug = false;

    /**
     * @param array $config
     */
    public function __construct($config)
    {
        $_alldbtype = array( 'mysql', 'pgsql', 'mssql', 'sybase', 'dblib' );

        $driver_options = array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => $config['persistent'],
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        if (in_array($config['dbtype'], $_alldbtype)) {
            $dsn = $config['dbtype'] . ':dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';charset=' . $config['charset'];
            if (!empty($config['dbport'])) {
                $dsn .= ';port=' . $config['dbport'];
            }
            $driver_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        } elseif ($config['dbtype'] == 'oci') {
            $dsn = 'oci:dbname=//' . $config['dbhost'] . ':' . $config['dbport'] . '/' . $config['dbname'] . ';charset=AL32UTF8';
            $driver_options[PDO::ATTR_STRINGIFY_FETCHES] = true;
        } elseif ($config['dbtype'] == 'sqlite') {
            $dsn = 'sqlite:' . $config['dbname'];
        } else {
            trigger_error($config['dbtype'] . ' is not supported', 256);
        }

        $this->server = $config['dbhost'];
        $this->dbtype = $config['dbtype'];
        $this->dbname = $config['dbname'];
        $this->user = $config['dbuname'];

        try {
            parent::__construct($dsn, $config['dbuname'], $config['dbpass'], $driver_options);
            parent::exec("SET SESSION time_zone='" . NV_SITE_TIMEZONE_GMT_NAME . "'");
            if (empty($config['persistent'])) {
                $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, ['\NukeViet\Core\NukeVietPDOStatement', [$this]]);
                $this->allowedDebug = true;
            }
            $this->connect = 1;
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
    }

    /**
     * Insert a row into the database return primary key column
     *
     * @param string $query
     * @param string $column The name of the primary key column
     * @param array $data
     * @return integer|false
     */
    public function insert_id($_sql, $column = '', $data = array())
    {
        try {
            if ($this->dbtype == 'oci') {
                $_sql .= ' RETURNING ' . $column . ' INTO :primary_key';
            }
            $stmt = $this->prepare($_sql);
            if(!empty($data)) {
                foreach (array_keys($data) as $key) {
                    $stmt->bindParam(':' . $key, $data[$key], PDO::PARAM_STR, strlen($data[$key]));
                }
            }
            if ($this->dbtype == 'oci') {
                $stmt->bindParam(':primary_key', $primary_key, PDO::PARAM_INT, 11);
            }
            $stmt->execute();

            if ($this->dbtype == 'oci') {
                return $primary_key;
            } else {
                return $this->lastInsertId();
            }
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        return false;
    }

    /**
     * Database::affected_rows_count()
     * Get the number of affected rows by the last INSERT, UPDATE, REPLACE or DELETE query
     *
     * @param mixed $_sql
     * @param mixed $data
     * @return
     */
    public function affected_rows_count($_sql, $data = array())
    {
        try {
            $stmt = $this->prepare($_sql);
            if (!empty($data)) {
                foreach (array_keys($data) as $key) {
                    $stmt->bindParam(':' . $key, $data[$key], PDO::PARAM_STR, strlen($data[$key]));
                }
            }
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            trigger_error($e->getMessage());
        }
        return false;
    }

    /**
     *
     * @param string $table
     * @return array
     */
    public function columns_array($table)
    {
        //Array: field 	type 	null 	key 	default 	extra
        $return = array();
        if ($this->dbtype == 'mysql') {
            $sql = 'SHOW COLUMNS FROM ' . $table;
            $result = $this->query($sql);
            while ($row = $result->fetch()) {
                $return[$row['field']] = $row;
            }
        } elseif ($this->dbtype == 'oci') {
            $sql = "SELECT column_name, data_type, nullable, data_default, char_length FROM all_tab_columns WHERE table_name = '" . strtoupper($table) . "' ORDER BY column_id";
            $result = $this->query($sql);
            while ($row = $result->fetch()) {
                if ($row['char_length']) {
                    $row['data_type'] .= '(' .$row['char_length']. ')';
                }
                $column_name = strtolower($row['column_name']);

                $_tmp = array();
                $_tmp['field'] = $column_name;
                $_tmp['type'] = $row['data_type'];
                $_tmp['null'] = ($row['nullable'] =='N') ? 'NO' : 'YES';
                $_tmp['key'] = '';
                $_tmp['default'] = $row['data_default'];
                $_tmp['extra'] = '';
                $return[$column_name] = $_tmp;
            }
        }
        return $return;
    }

    /**
     * @param string $table
     * @param string $column
     * @param string $type
     * @param integer $length
     * @param boolean $null
     * @param string $default
     * @return
     */
    public function columns_add($table, $column, $type, $length = null, $null = true, $default = null)
    {
        //'type' => 'string|integer
        if ($this->dbtype == 'mysql') {
            if ($type == 'integer') {
                $length = $length ? $length : 2147483647;
                if ($length <= 127) {
                    $type = 'TINYINT';
                } elseif ($length <= 32767) {
                    $type = 'SMALLINT';
                } elseif ($length <= 8388607) {
                    $type = 'MEDIUMINT';
                } elseif ($length <= 2147483647) {
                    $type = 'INT';
                } else {
                    $type = 'BIGINT';
                }
            } else {
                $length = $length ? $length : 65535;
                if ($length <= 255) {
                    $type = 'VARCHAR(' . $length . ')';
                } elseif ($length <= 65535) {
                    $type = 'TEXT';
                } elseif ($length <= 16777215) {
                    $type = 'MEDIUMTEXT';
                } else {
                    $type = 'LONGTEXT';
                }
            }
            $sql = 'ALTER TABLE ' . $table . ' ADD ' . $column . ' ' . $type;
            if ($default !== null) {
                $sql .= ' DEFAULT ';
                if (is_bool($default)) {
                    $sql .= $default ? 'true' : 'false';
                }
                if (is_string($default)) {
                    $sql .= "'" . $default . "'";
                } else {
                    $sql .= $default;
                }
            }
            if (! $null) {
                $sql .= ' NOT NULL';
            }
        } elseif ($this->dbtype == 'oci') {
            if ($type == 'integer') {
                $length = $length ? $length : 2147483647;
                if ($length <= 127) {
                    $type = 'NUMBER(3,0)';
                } elseif ($length <= 32767) {
                    $type = 'NUMBER(5,0)';
                } elseif ($length <= 8388607) {
                    $type = 'NUMBER(8,0)';
                } elseif ($length <= 2147483647) {
                    $type = 'NUMBER(11,0)';
                } else {
                    $type = 'NUMBER(22,0)';
                }
            } else {
                $length = $length ? $length : 65535;
                if ($length <= 4000) {
                    $type = 'VARCHAR2(' . $length . ' CHAR)';
                } else {
                    $type = 'CLOB';
                }
            }
            $sql = 'ALTER TABLE ' . $table . ' ADD (' . $column . ' ' . $type;
            if ($default !== null) {
                $sql .= ' DEFAULT ';
                if (is_bool($default)) {
                    $sql .= $default ? 'true' : 'false';
                }
                if (is_string($default)) {
                    $sql .= "'" . $default . "'";
                } else {
                    $sql .= $default;
                }
            }
            if (! $null) {
                $sql .= ' NOT NULL ENABLE';
            }
            $sql .= ')';
        } else {
            return false;
        }

        try {
            return $this->query($sql);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     *
     * @param mixed $value
     * @return
     */
    public function dblikeescape($value)
    {
        if (is_array($value)) {
            $value = array_map(array( $this, __function__ ), $value);
        } else {
            $value = trim($this->quote($value), "'");
            $value = addcslashes($value, '_%');
        }
        return $value;
    }

    /**
     * reset query.
     *
     * @return Database $this
     */
    public function sqlreset()
    {
        $this->_select = '';
        $this->_from = '';
        $this->_join = '';
        $this->_where = '';
        $this->_group = '';
        $this->_having = '';
        $this->_order = '';
        $this->_limit = 0;
        $this->_offset = 0;

        return $this;
    }

    /**
     * select for the query.
     *
     * @param string $select
     * @return Database $this
     */
    public function select($select = '')
    {
        $this->_select = $select;

        return $this;
    }

    /**
     * from for the query.
     *
     * @param string $from
     * @return Database $this
     */
    public function from($from = '')
    {
        $this->_from = $from;

        return $this;
    }

    /**
     * join for the query.
     *
     * @param string join_table_on
     * @return Database $this
     */
    public function join($join_table_on)
    {
        $this->_join = $join_table_on;

        return $this;
    }

    /**
     * where for the query.
     *
     * @param string $where
     * @return Database $this
     */
    public function where($where = '')
    {
        $this->_where = $where;

        return $this;
    }

    /**
     * group for the query.
     *
     * @param string $group
     * @return Database $this
     */
    public function group($group = '')
    {
        $this->_group = $group;

        return $this;
    }

    /**
     * having for the query.
     *
     * @param string $having
     * @return Database $this
     */
    public function having($having = '')
    {
        $this->_having = $having;

        return $this;
    }

    /**
     * order for the query.
     *
     * @param string $order
     * @return Database $this
     */
    public function order($order = '')
    {
        $this->_order = $order;

        return $this;
    }

    /**
     * sets the limit for the query.
     *
     * @param int $limit
     * @return Database $this
     */
    public function limit($limit)
    {
        $this->_limit = (int)$limit;

        return $this;
    }

    /**
     * sets the offset for the query.
     *
     * @param int $offset
     * @return Database $this
     */
    public function offset($offset)
    {
        $this->_offset = (int)$offset;

        return $this;
    }

    public function sql()
    {
        $return = 'SELECT ' . $this->_select;
        if ($this->dbtype == 'oci' and $this->_offset) {
            $return .= ', ROWNUM oci_rownum ';
        }
        $return .= ' FROM ' . $this->_from;

        if ($this->_join) {
            $return .= ' ' . $this->_join;
        }

        if ($this->_where) {
            $return .= ' WHERE ' . $this->_where;
            if ($this->dbtype == 'oci' and $this->_limit > 0) {
                $return .= ' AND ROWNUM <= ' . ($this->_limit + $this->_offset);
            }
        } elseif ($this->dbtype == 'oci' and $this->_limit > 0) {
            $return .= ' WHERE ROWNUM <= ' . ($this->_limit + $this->_offset);
        }
        if ($this->_group) {
            $return .= ' GROUP BY ' . $this->_group;
        }
        if ($this->_having) {
            $return .= ' HAVING ' . $this->_having;
        }
        if ($this->_order) {
            $return .= ' ORDER BY ' . $this->_order;
        }

        if ($this->dbtype == 'mysql') {
            if ($this->_limit) {
                $return .= ' LIMIT ' . $this->_limit;
            }
            if ($this->_offset) {
                $return .= ' OFFSET ' . $this->_offset;
            }
        } elseif ($this->dbtype == 'oci' and $this->_offset > 0) {
            $return = 'SELECT ' . $this->_select . ' FROM (' . $return . ') WHERE oci_rownum >= ' . ($this->_offset + 1);
        }

        return $return;
    }

    /**
     * {@inheritDoc}
     * @see PDO::query()
     */
    public function query($statement)
    {
        if ($this->debug) {
            $this->sqls[] = $statement;
        }
        return parent::query($statement);
    }

    /**
     * {@inheritDoc}
     * @see PDO::exec()
     */
    public function exec($statement)
    {
        if ($this->debug) {
            $this->sqls[] = $statement;
        }
        return parent::exec($statement);
    }

    /**
     * {@inheritDoc}
     * @see PDO::prepare()
     */
    public function prepare($statement, $driver_options = [])
    {
        //if ($this->debug) {
        //    $this->sqls[] = $statement;
        //}

        return parent::prepare($statement, $driver_options);
    }

    /**
     *
     */
    public function enableDebug()
    {
        if (!$this->allowedDebug) {
            trigger_error('Could not enable debugger because DB Persistent is on!', 256);
        }
        $this->debug = true;
        $this->sqls = [];
    }

    /**
     *
     */
    public function disableDebug()
    {
        $this->debug = false;
        $this->sqls = [];
    }

    /**
     * @return array
     */
    public function debugListSQL()
    {
        return $this->sqls;
    }

    /**
     * @return integer
     */
    public function getNumQueries()
    {
        return sizeof($this->sqls);
    }

    /**
     * @param string $sql
     */
    public function addDebugListSql($sql)
    {
        $this->sqls[] = $sql;
    }

    /**
     * @param string $sql
     */
    public function appendLastDebugSql($sql) {
        end($this->sqls);
        $key = key($this->sqls);
        if (isset($this->sqls[$key])) {
            $this->sqls[$key] .= "\n\n" . $sql;
        } else {
            $this->sqls[] = $sql;
        }
    }

    /**
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug;
    }
}

/**
 * @author VINADES.,JSC
 *
 */
class NukeVietPDOStatement extends PDOStatement {
    protected $pdo;

    /**
     * @param PDO $pdo
     */
    protected function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * {@inheritDoc}
     * @see PDOStatement::execute()
     */
    public function execute($args = null)
    {
        $result = parent::execute($args);
        if ($this->pdo->isDebug())  {
            ob_start();
            $this->debugDumpParams();
            $this->pdo->addDebugListSql(ob_get_contents());
            ob_end_clean();
        }
        return $result;
    }
}
