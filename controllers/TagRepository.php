<?php

class TagRepository {

    function __construct() {
        require_once 'db-connection.php';
    }

    public function fetch_tag_fromid($id) {
        $pdo = db_connect();
        $param['id'] = $id;
        $stmt = $pdo->prepare('SELECT * FROM tag_ent WHERE id_tag_cd = :id');
        $stmt->execute($param);
        $ent = $stmt->fetchAll(PDO::FETCH_CLASS, 'Tag');
        db_disconnect($pdo);
        return isset($ent) && count($ent) > 0 ? $ent[0] : null;
    }

    public function fetch_tag_from_art_id($id) {
        $pdo = db_connect();
        $param['id'] = $id;
        $stmt = $pdo->prepare('SELECT t.* FROM article_tag at LEFT JOIN tag_ent t ON at.id_tag_cd = t.id_tag_cd WHERE at.id_article_url_cd = :id');
        $stmt->execute($param);
        $ent = $stmt->fetchAll(PDO::FETCH_CLASS, 'Tag');
        db_disconnect($pdo);
        return isset($ent) && count($ent) > 0 ? $ent : null;
    }

    public function fetch_tags(int $limit = 0) {
        $pdo = db_connect();
        $select_query = 'SELECT * FROM tag_ent ORDER BY tag_label ASC';
        if ($limit > 0) {
            $select_query .= " LIMIT $limit";
        }
        $ent = $pdo->query($select_query)->fetchAll(PDO::FETCH_CLASS, 'Tag');
        db_disconnect($pdo);
        return $ent;
    }

}
