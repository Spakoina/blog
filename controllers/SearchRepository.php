<?php

class SearchRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function insert_row(String $query) {
        $pdo = db_connect();
        $sql = "INSERT INTO search_log (query, timestamp) "
                . "VALUES (:query, now())";
        $params['query']= $query;
        $pdo->prepare($sql)->execute($params);
        db_disconnect($pdo);
    }

}