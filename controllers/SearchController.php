<?php

class SearchController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function search_articles($query) {
        if (strlen($query) < 4) {
            echo "Query di ricerca non valida: inserisci almeno 4 caratteri.";
            return;
        } else {
            $articles = $this->articleRepo->search_article($query);
            Render::view('search',
                    ['page_title' => 'Ricerca',
                        'articles' => $articles]);
        }
    }

}
