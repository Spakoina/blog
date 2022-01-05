<?php

class ArticlesRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function find_articles($id) {
        return fetch_article($id);
    }

    public function fetch_article() {
        return fetch_articles();
    }

    public function fetch_article_fromid($query) {
        $pdo = db_connect();
        $param['query'] = $query;
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE LOWER(title) like LOWER(CONCAT('%', :query, '%')) or LOWER(description) like LOWER(CONCAT('%', :query, '%'))");
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Articles');
        db_disconnect($pdo);
        return $articles;
    }

}
