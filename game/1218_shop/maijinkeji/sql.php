<?php
	require_once 'config.php';
	$GLOBALS['connect'] = FALSE;
	
    function __construct($dbhost, $dbuser, $dbpwd, $dbname = null) {
     sql_connect($dbhost, $dbuser, $dbpwd, $dbname);
    }

    function sql_connect() {
        if ($GLOBALS['connect']) {
        	//echo $GLOBALS['connect'];
        	if (!mysql_ping($GLOBALS['connect']))
        	{
        		echo "mysql timeout";
        	}else{
        		return ;
        	}
            mysql_close($GLOBALS['connect']);
        }
        if (!$GLOBALS['connect'] = mysql_connect($GLOBALS['host'], $GLOBALS['dbuser'], $GLOBALS['dbpsd'])) {
         handleError('Can not connect to MySQL server. host: ' . $GLOBALS['host'] . ", user:" . $GLOBALS['dbuser'].", pwd:".$GLOBALS['dbpsd']);
        }
        mysql_query("set character_set_connection=utf8, character_set_results=utf8, character_set_client=binary", $GLOBALS['connect']);
        if ($GLOBALS['dbname']) {
         sql_select_db($GLOBALS['dbname']);
        }
    }

    function sql_select_db($dbname) {
        if (!mysql_select_db($dbname, $GLOBALS['connect'])) {
         handleError('Cannot use database ' . $dbname);
        }
    }

    function sql_query($sql) {
        if (!($res = mysql_query($sql, $GLOBALS['connect']))) {
         handleError('MySQL Query Error', $sql);
        }
        return $res;
    }

    function sql_insert($sql) {
     sql_query($sql);
        return mysql_insert_id();
    }

    function sql_fetch_rows($sql, $result_type = MYSQL_ASSOC) {
        $res = sql_query($sql);
        $ret = array();
        while ($r = mysql_fetch_array($res, $result_type)) {
            $ret[] = $r;
        }
        mysql_free_result($res);
        return $ret;
    }

    function sql_fetch_one($sql, $result_type = MYSQL_ASSOC) {
        $res = sql_query($sql);
        $ret = mysql_fetch_array($res, $result_type);
        mysql_free_result($res);
        return $ret;
    }

    function sql_fetch_one_cell($sql) {
        $ret = sql_fetch_one($sql, MYSQL_NUM);
        return $ret[0];
    }

    function sql_fetch_column($sql, $keyField, $result_type = MYSQL_ASSOC) {
        $res = sql_query($sql);
        $ret = array();
        while ($r = mysql_fetch_array($res, $result_type)) {
            if (isset($r[$keyField])) {
                $ret[] = $r[$keyField];
            }
        }
        mysql_free_result($res);
        return $ret;
    }

    function sql_fetch_singlemap($sql, $keyField, $result_type = MYSQL_ASSOC) {
        $res = sql_query($sql);
        $ret = array();
        while ($r = mysql_fetch_array($res, $result_type)) {
            if (isset($r[$keyField])) {
                $ret[$r[$keyField]] = $r;
            }
        }
        mysql_free_result($res);
        return $ret;
    }

    function sql_fetch_multimap($sql, $keyField, $result_type = MYSQL_ASSOC) {
        $res = sql_query($sql);
        $ret = array();
        while ($r = mysql_fetch_array($res, $result_type)) {
            if (isset($r[$keyField])) {
                $ret[$r[$keyField]][] = $r;
            }
        }
        mysql_free_result($res);
        return $ret;
    }

    function handleError($message = '', $sql = '') {
        $err = empty($sql) ? '' : 'MySQL Query:' . $sql;
        $err .= 'MySQL Error:' . mysql_error();
        $err .= ', MySQL Errno:' . mysql_errno();
        $err .= ', Message:' . $message;
        error_log($err);
    }

    function __destruct() {
        if ($GLOBALS['connect']) {
            mysql_close($GLOBALS['connect']);
        }
    }

	function sql_close(){
		if ($GLOBALS['connect']) {
			//echo "close:".$GLOBALS['connect'];
            mysql_close($GLOBALS['connect']);
            $GLOBALS['connect'] = false;
        }
	}
?>