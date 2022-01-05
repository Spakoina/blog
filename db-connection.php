<?php

require_once('./classes/articles.php');

function db_connect() {
    $servername = "127.0.0.1:8886";
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

function fetch_article($id) {
    $pdo = db_connect();
    $param['id'] = $id;
    $stmt = $pdo->prepare('SELECT * FROM articles WHERE article_url_cd = :id');
    $stmt->execute($param);
    $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'Articles');
    db_disconnect($pdo);
    return $users;
}

function fetch_articles() {
    $pdo = db_connect();
    $users = $pdo->query('SELECT * FROM articles')->fetchAll(PDO::FETCH_CLASS, 'Articles');
    db_disconnect($pdo);
    return $users;
}
?>