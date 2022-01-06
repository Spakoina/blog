<?php

class SearchController {

    function __construct() {
        
    }

    public function search_articles($query) {
        if (strlen($query) < 4) {
            echo "Query di ricerca non valida: inserisci almeno 4 caratteri.";
            return;
        } else {
            $articlesRepo = new ArticleRepository();
            $articles = $articlesRepo->search_article($query);
            require_once 'views/search.php';
        }
    }

}
