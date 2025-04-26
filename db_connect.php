<?php
    $SERVER = "localhost";
    $username = "postgres";
    $password = "123";
    $database = "gymdb";

    $conn = pg_connect("host=$SERVER dbname=$database user=$username password=$password");

?>