<?php

class dbtree {
    var $ERRORS = array();
    var $ERRORS_MES = array();
    var $table;
    var $table_id;
    var $table_left;
    var $table_right;
    var $table_level;
    var $res;
    var $db;

    function dbtree($table, $prefix, &$db) {
        $this->db = &$db;
        $this->table = $table;
        $this->table_id = $prefix . '_id';
        $this->table_left = $prefix . '_left';
        $this->table_right = $prefix . '_right';
        $this->table_level = $prefix . '_level';
        unset($prefix, $table);
        //echo $this->table_id;
    }

    function GetNodeInfo($section_id, $cache = FALSE) {
        $sql = 'SELECT ' . $this->table_left . ', ' . $this->table_right . ', ' . $this->table_level . ' FROM ' . $this->table . ' WHERE ' . $this->table_id . ' = ' . (int)$section_id;
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        }
        if (0 == $res->RecordCount()) {
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('no_element_in_tree') : 'no_element_in_tree';
            return FALSE;
        }
        $data = $res->FetchRow();
        unset($res);
        return array($data[$this->table_left], $data[$this->table_right], $data[$this->table_level]);
    }

    function GetParentInfo($section_id, $condition = '', $cache = FALSE) {
        $node_info = $this->GetNodeInfo($section_id);
        if (FALSE === $node_info) {
            return FALSE;
        }
        list($leftId, $rightId, $level) = $node_info;
        $level--;
        if (!empty($condition)) {
            $condition = $this->_PrepareCondition($condition);
        }
        $sql = 'SELECT * FROM ' . $this->table
        . ' WHERE ' . $this->table_left . ' < ' . $leftId
        . ' AND ' . $this->table_right . ' > ' . $rightId
        . ' AND ' . $this->table_level . ' = ' . $level
        . $condition
        . ' ORDER BY ' . $this->table_left;
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        }
        return $res->FetchRow();
    }

    function Full($fields, $condition = '', $cache = FALSE) {
        if (!empty($condition)) {
            $condition = $this->_PrepareCondition($condition, TRUE);
        }
        if (is_array($fields)) {
            $fields = implode(', ', $fields);
        } else {
            $fields = '*';
        }
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
        $sql .= $condition;
        $sql .= ' ORDER BY ' . $this->table_left;
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        }
        $this->res = $res;
        return TRUE;
    }

    function Branch($ID, $fields, $condition = '', $cache = FALSE) {
        if (is_array($fields)) {
            $fields = 'A.' . implode(', A.', $fields);
        } else {
            $fields = 'A.*';
        }
        if (!empty($condition)) {
            $condition = $this->_PrepareCondition($condition, FALSE, 'A.');
        }
        $sql = 'SELECT ' . $fields . ', CASE WHEN A.' . $this->table_left . ' + 1 < A.' . $this->table_right . ' THEN 1 ELSE 0 END AS nflag FROM ' . $this->table . ' A, ' . $this->table . ' B WHERE B.' . $this->table_id . ' = ' . (int)$ID . ' AND A.' . $this->table_left . ' >= B.' . $this->table_left . ' AND A.' . $this->table_right . ' <= B.' . $this->table_right;
        $sql .= $condition;
        $sql .= ' ORDER BY A.' . $this->table_left;
	//echo $sql; 
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        }
        $this->res = $res;
        return TRUE;
    }
 
    function Parents($ID, $fields, $condition = '', $cache = FALSE) {
        if (is_array($fields)) {
            $fields = 'A.' . implode(', A.', $fields);
        } else {
            $fields = 'A.*';
        }
        if (!empty($condition)) {
            $condition = $this->_PrepareCondition($condition, FALSE, 'A.');
        }
        $sql = 'SELECT ' . $fields . ', CASE WHEN A.' . $this->table_left . ' + 1 < A.' . $this->table_right . ' THEN 1 ELSE 0 END AS nflag FROM ' . $this->table . ' A, ' . $this->table . ' B WHERE B.' . $this->table_id . ' = ' . (int)$ID . ' AND B.' . $this->table_left . ' BETWEEN A.' . $this->table_left . ' AND A.' . $this->table_right;
        $sql .= $condition;
        $sql .= ' ORDER BY A.' . $this->table_left;
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        }
        $this->res = $res;
        return TRUE;
    }

    function Ajar($ID, $fields, $condition = '', $cache = FALSE) {
        if (is_array($fields)) {
            $fields = 'A.' . implode(', A.', $fields);
        } else {
            $fields = 'A.*';
        } 
        $condition1 = '';
        if (!empty($condition)) {
            $condition1 = $this->_PrepareCondition($condition, FALSE, 'B.');
        }
        $sql = 'SELECT A.' . $this->table_left . ', A.' . $this->table_right . ', A.' . $this->table_level . ' FROM ' . $this->table . ' A, ' . $this->table . ' B '
        . 'WHERE B.' . $this->table_id . ' = ' . (int)$ID . ' AND B.' . $this->table_left . ' BETWEEN A.' . $this->table_left . ' AND A.' . $this->table_right;
        $sql .= $condition1;
        $sql .= ' ORDER BY A.' . $this->table_left;
        
        //echo $sql;
        //
        //echo $this->table_left;// . ' $this->table_right:' . $this->table_right . ' $this->table_level:' . $this->table_level . ' $this->table:' . $this->table;
        //
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute((int)$cache, $sql);
        } 
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        } 
        if (0 == $res->RecordCount()) { 
            //$this->ERRORS_MES[] = _('no_element_in_tree'); //Fatal error: Call to undefined function _() in Z:\home\eurodon2012.com\www\inc\dbtree.class.php on line 766
            return FALSE; 
        } 
        $alen = $res->RecordCount();
        $i = 0;
        if (is_array($fields)) {
            $fields = implode(', ', $fields);
        } else {
            $fields = '*';
        } 
        if (!empty($condition)) {
            $condition1 = $this->_PrepareCondition($condition, FALSE);
        }
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE (' . $this->table_level . ' = 1';
        while ($row = $res->FetchRow()) {
            if ((++$i == $alen) && ($row[$this->table_left] + 1) == $row[$this->table_right]) {
                break;
            }
            $sql .= ' OR (' . $this->table_level . ' = ' . ($row[$this->table_level] + 1)
            . ' AND ' . $this->table_left . ' > ' . $row[$this->table_left]
            . ' AND ' . $this->table_right . ' < ' . $row[$this->table_right] . ')';
        }
        $sql .= ') ' . $condition1;
        $sql .= ' ORDER BY ' . $this->table_left;
        if (FALSE === DB_CACHE || FALSE === $cache || 0 == (int)$cache) {
            $res = $this->db->Execute($sql);
        } else {
            $res = $this->db->CacheExecute($cache, $sql);
        }
        if (FALSE === $res) {
            $this->ERRORS[] = array(2, 'SQL query error.', __FILE__ . '::' . __CLASS__ . '::' . __FUNCTION__ . '::' . __LINE__, 'SQL QUERY: ' . $sql, 'SQL ERROR: ' . $this->db->ErrorMsg());
            $this->ERRORS_MES[] = extension_loaded('gettext') ? _('internal_error') : 'internal_error';
            return FALSE;
        } 
        $this->res = $res;
        return TRUE;
    }

    function RecordCount() { 
        return $this->res->RecordCount();
    }

    function FirstRow() {
        return $this->res->First();
    }

    function NextRow() {
        return $this->res->FetchRow();
    }

    function _PrepareCondition($condition, $where = FALSE, $prefix = '') {
        if (!is_array($condition)) {
            return $condition;
        }
        $sql = ' ';
        if (TRUE === $where) {
            $sql .= 'WHERE ' . $prefix;
        }
        $keys = array_keys($condition);
        for ($i = 0;$i < count($keys);$i++) {
            if (FALSE === $where || (TRUE === $where && $i > 0)) {
                $sql .= ' ' . strtoupper($keys[$i]) . ' ' . $prefix;
            }
            $sql .= implode(' ' . strtoupper($keys[$i]) . ' ' . $prefix, $condition[$keys[$i]]);
        }
        return $sql;
    }
}
?>