<?php
    
$DB_HOST = '10.10.5.11';
$DB_USER = 'admin';
$DB_PASS = 'launi0n@dmin';
$BD_TABLE = 'barcode'; 
    
    
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST, $DB_USER,$DB_PASS,$BD_TABLE);

