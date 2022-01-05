<?php

class Search {

    public function search($query) {
        if (strlen($query) < 4) {
            echo "Query di ricerca non valida: inserisci almeno 4 caratteri.";
            return;
        } else {
            $articlesRepo = new ArticlesRepository();
            $articles = $articlesRepo->fetch_article_fromid($query);
            require_once 'views/search.php';
        }
    }

}
