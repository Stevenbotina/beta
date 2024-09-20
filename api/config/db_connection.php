<?php
    /*
    Postgres Database connection
    Developer: Steven
    */
    
    $host = 'localhost'; //127.0.0.1
    $username = 'postgres';
    $password = 'unicesmag';
    $dbName = 'beta';
    $port = '5432';

    $data_connection = '
        host        =   $host
        port        =   $port
        username    =   $username
        password    =   $password
        dbname      =   $dbName
    ';

    $conn = pg_connect($data_connection);

    if (!$conn) {
        die("Connection failed: ". pg_last_error());
    } else {
        echo "Connected successfully";
    }

    ph_close($conn);
?>
