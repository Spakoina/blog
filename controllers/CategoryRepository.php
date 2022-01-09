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

    public function fetch_lastchange_byid() {
        $pdo = db_connect();
        $stmt = $pdo->prepare('select c.id_category_url_cd, max(a.date) as last_change from category c left join article_category ac on c.id_category_url_cd = ac.id_category_url_cd left join article a on a.id_article_url_cd = ac.id_article_url_cd where a.date is not null group by c.id_category_url_cd');
        $stmt->execute();
        $entities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        db_disconnect($pdo);
        return $entities;
    }
}