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

    public function fetch_articles(int $limit = 0) {
        $pdo = db_connect();
        $select_query = 'SELECT * FROM article ORDER BY date DESC';
        if ($limit > 0) {
            $select_query .= " LIMIT $limit";
        }
        $articles = $pdo->query($select_query)->fetchAll(PDO::FETCH_CLASS, 'Article');
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

    public function search_next_article($article) {
        $pdo = db_connect();
        $param['article_cd'] = $article->id_article_url_cd;
        $param['article_date'] = $article->date;
        $stmt = $pdo->prepare(
                "SELECT a.* FROM article a where datediff(a.date, :article_date) > 0 "
                . "AND a.id_article_url_cd <> :article_cd "
                . "ORDER BY datediff(a.date, :article_date) ASC "
                . "LIMIT 1");
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return isset($articles) && count($articles) > 0 ? $articles[0] : null;
    }

    public function search_prev_article($article) {
        $pdo = db_connect();
        $param['article_cd'] = $article->id_article_url_cd;
        $param['article_date'] = $article->date;
        $stmt = $pdo->prepare(
                "SELECT a.* FROM article a where datediff(:article_date, a.date) > 0 "
                . "AND a.id_article_url_cd <> :article_cd "
                . "ORDER BY datediff(:article_date, a.date) ASC "
                . "LIMIT 1");
        $stmt->execute($param);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        db_disconnect($pdo);
        return isset($articles) && count($articles) > 0 ? $articles[0] : null;
    }

}
