<?php
class db {
    /**
    * Database connection
    *
    * @var resource
    */
    var $conn;
    /**
    * Constructor
    *
    * @return db object
    */
    function db($host, $user, $password, $database) {
        $this->conn = mysql_connect($host, $user, $password);
        if (false === $this->conn) {
            return false;
        }
        if (false === mysql_select_db($database)) {
            return false;
        }
        return true;
    }
    /**
    * Generate unique insert ID
    *
    * @param string $seqname - Sequence table name
    * @param integer $start - Initial value
    */
    function GenID($seqname, $start) {
        $sql = 'update ' . addslashes($seqname) . ' set id=LAST_INSERT_ID(id+1)';
        $res = $this->Execute($sql);
        if (false === $res) {
            $sql = 'create table ' . addslashes(strtoupper($seqname)) . ' (id int not null)';
            $this->Execute($sql);
            $sql = 'insert into ' . addslashes(strtoupper($seqname)) . ' values (' . (int)$start-1 . ')';
            $this->Execute($sql);
        }
        return mysql_insert_id($this->conn);
    }
    /**
    * Execute SQL query
    *
    * @param string $sql - SQL query
    * @return object Recordset
    */
    function Execute($sql) {
        $res = mysql_query($sql, $this->conn);
        if (false === $res) {
            return false;
        }
        $recordset = new recordset($res, $sql);
        return $recordset;
    }
    /**
    * Cache SQL query (added for compatibility), not realized
    *
    * @param integer $cache
    * @param string $sql - SQL query
    */
    function CacheExecute($cache, $sql) {
        return $this->Execute($sql);
    }

    /**
    * Generate UPDATE SQL query
    *
    * @param object $recordset - SELECT query result
    * @param array $data - Contains parameters for additional fields of a tree (if is): array('filed name' => 'importance', etc)
    * @return string - Complete SQL query or empty string
    */
    function GetUpdateSQL($recordset, $data) {
        if (empty($data)) {
            return '';
        }
        preg_match_all("~FROM\s+([^\s]*)~", $recordset->sql, $maches, PREG_PATTERN_ORDER);
        if (!isset($maches[1][0])) {
            return '';
        } else {
            $table = $maches[1][0];
        }
        preg_match_all("~(WHERE\s+.*)~is", $recordset->sql, $maches, PREG_PATTERN_ORDER);
        if (!isset($maches[0][0])) {
            return '';
        } else {
            $where = $maches[0][0];
        }
        $fld_names = array_keys($data);
        $fld_values = array_values($data);
        $data = 'SET ';
        for ($max = count($fld_names), $i = 0;$i < $max;$i++) {
            $data .= $fld_names[$i] . ' = \'' . $fld_values[$i] . '\' ';
            if ($i < $max-1) $data .= ', ';
        }
        $sql = 'UPDATE ' . $table . ' ' . $data . ' ' . $where;
        return $sql;
    }
    /**
    * Generate SELECT SQL query
    *
    * @param object $recordset - SELECT query result
    * @param array $data - Contains parameters for additional fields of a tree (if is): array('filed name' => 'importance', etc)
    * @return string - Complete SQL query or empty string
    */
    function GetInsertSQL($recordset, $data) {
        if (empty($data)) {
            return '';
        }
        preg_match_all("~FROM\s+([^\s]*)~", $recordset->sql, $maches, PREG_PATTERN_ORDER);
        if (!isset($maches[1][0])) {
            return '';
        } else {
            $table = $maches[1][0];
        }
        if (!empty($data)) {
            $fld_names = implode(', ', array_keys($data));
            $fld_values = '\'' . implode('\', \'', array_values($data)) . '\'';
        }
        $sql = 'INSERT INTO ' . $table . ' (' . $fld_names . ') VALUES (' . $fld_values . ')';
        return $sql;
    }
    /**
    * Return on field result
    *
    * @param string $sql - SQL query
    * @return unknown
    */
    function GetOne($sql) {
        $res = $this->Execute($sql);
        if (false === $res) {
            return false;
        }
        return reset($res->FetchRow());
    }
    /**
    * Transactions mechanism (added for compatibility, not realised)
    *
    */
    function StartTrans() {
        return;
    }
    /**
    * Transactions mechanism (added for compatibility, not realised)
    *
    */
    function FailTrans() {
        return;
    }

    /**
    * Transactions mechanism (added for compatibility, not realised)
    *
    */
    function CompleteTrans() {
    }

    /**
    * Return database error message
    *
    * @return string
    */
    function ErrorMsg() {
        return mysql_error();
    }

    /**
    * Close database connection
    *
    */
    function Close() {
        mysql_close($this->conn);
    }
}

class recordset {
    /**
    * Recordset resource.
    *
    * @var resource
    */
    var $recordset;
    /**
    * SQL query
    *
    * @var string
    */
    var $sql;
    /**
    * Constructor.
    *
    * @param resource $recordset
    * @return recordset object
    */
    function recordset($recordset, $sql) {
        $this->recordset = $recordset;
        $this->sql = $sql;
    }
    /**
    * Returns amount of lines in result.
    * 
    * @return integer
    */
    function RecordCount() {
        return mysql_num_rows($this->recordset);
    }
    /**
    * Returns the current row
    * @return array
    */
    function FetchRow() {
        return mysql_fetch_array($this->recordset);
    }

    function First() {
        return mysql_data_seek($this->recordset,0);
    }

}
?>