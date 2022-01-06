<?php

function db_connect() {
    $servername = "127.0.0.1:3306";
    $username = "blog";
    $password = "blogPhpConn2022";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}

function db_disconnect($conn) {
    $conn = null;
}

?>