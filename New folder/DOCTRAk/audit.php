<?php

    //INSERT LOGS INTO SECURITY_AUDIT TABLE
    function log_audit($TransactionNumber,$SQL,$DML,$UserName)
    {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        date_default_timezone_set($_SESSION['Timezone']);
        $sqlQuery='INSERT INTO security_audit(transaction,sqlquery,dml,user) VALUE ("'.$TransactionNumber.'","'.$SQL.'","'.$DML.'","'.$UserName.'")';
        $query=  mysqli_query($con, $sqlQuery);
        mysqli_close($con);
      
    }

    //RETRIEVE CURRENT MAX NUMBER FROM COUNTER_LOG TABLE FROM TRANSACTION NUMBER
    function get_key()
    {
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        $sql='INSERT INTO counter_log(function) values("audit")';
        $query=mysqli_query($con, $sql);
        $sql='SELECT LAST_INSERT_ID()';
        $results=  mysqli_query($con, $sql);
        $result=mysqli_fetch_row($results);
        mysqli_close($con);
        return $result[0];
        
    }