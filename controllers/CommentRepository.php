<?php

class CommentRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function insert_row(ArticleComment $entity) {
        $pdo = db_connect();
        $sql = "INSERT INTO article_comment (id_article_url_cd, creation_dt, user, comment, reply_to) "
                . "VALUES (:id_article_url_cd, :creation_dt, :user, :comment, :reply_to)";
        $params['id_article_url_cd']= $entity->id_article_url_cd;
        $params['creation_dt']= $entity->creation_dt;
        $params['user']= $entity->user;
        $params['comment']= $entity->comment;
        $params['reply_to']= $entity->reply_to;
        $pdo->prepare($sql)->execute($params);
        db_disconnect($pdo);
    }

    public function fetch_all() {
        $pdo = db_connect();
        $entities = $pdo->query('SELECT * FROM article_comment')->fetchAll(PDO::FETCH_CLASS, 'ArticleComment');
        db_disconnect($pdo);
        return $entities;
    }

    public function fetch_by_article($article_id) {
        $pdo = db_connect();
        $param['article_id'] = $article_id;
        $stmt = $pdo->prepare('SELECT * FROM article_comment WHERE id_category_url_cd = :article_id');
        $stmt->execute($param);
        $entities = $stmt->fetchAll(PDO::FETCH_CLASS, 'ArticleComment');
        db_disconnect($pdo);
        return $entities;
    }

}
