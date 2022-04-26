<?php

class GlobalVariableRepository {

    function __construct() {
        require_once 'db-connection.php';
    }
    
    public function fetch_all() {
        $pdo = db_connect();
        $entities = $pdo->query('SELECT * FROM globals_variable')->fetchAll(PDO::FETCH_CLASS, 'GlobalVariable');
        db_disconnect($pdo);
        return $entities;
    }

    public function fetch_all_anabled() {
        $pdo = db_connect();
        $entities = $pdo->query('SELECT * FROM globals_variable WHERE enabled = 1')
                ->fetchAll(PDO::FETCH_CLASS, 'GlobalVariable');
        db_disconnect($pdo);
        return $entities;
    }

}
