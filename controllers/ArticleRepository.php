<?php

class ArticleRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function fetch_article_fromid($id) {
        $pdo = db_connect();
        $param['id'] = $id;
        $stmt = $pdo->prepare('SELECT * FROM article WHERE id_article_url_cd = :id');
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return $articles;
    }

    public function fetch_articles() {
        $pdo = db_connect();
        $articles = $pdo->query('SELECT * FROM article')->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return $articles;
    }

    public function fetch_by_category($category_id) {
        $pdo = db_connect();
        $param['category_id'] = $category_id;
        $stmt = $pdo->prepare('SELECT a.* FROM article a LEFT JOIN article_category ac ON ac.id_article_url_cd = a.id_article_url_cd WHERE ac.id_category_url_cd = :category_id');
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return $articles;
    }

    public function search_article($query) {
        $pdo = db_connect();
        $param['query'] = $query;
        $stmt = $pdo->prepare("SELECT * FROM article WHERE LOWER(title) like LOWER(CONCAT('%', :query, '%')) or LOWER(description) like LOWER(CONCAT('%', :query, '%'))");
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return $articles;
    }

}
