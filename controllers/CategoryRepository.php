<?php

class CategoryRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function fetch_all() {
        $pdo = db_connect();
        $entities = $pdo->query('SELECT * FROM category')->fetchAll(PDO::FETCH_CLASS, 'Category');
        db_disconnect($pdo);
        return $entities;
    }

    public function fetch_by_id($id) {
        $pdo = db_connect();
        $param['id'] = $id;
        $stmt = $pdo->prepare('SELECT * FROM category WHERE id_category_url_cd = :id');
        $stmt->execute($param);
        $entities = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        db_disconnect($pdo);
        return $entities;
    }
}