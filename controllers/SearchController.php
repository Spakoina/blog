<?php

class SearchController {

    private $articleRepo;
    private $tagRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
        $this->tagRepo = new TagRepository();
    }

    public function search_articles($query, $tag) {
        if (!(isset($tag) || strlen($tag) > 0) && (!isset($query) || strlen($query) < 4)) {
            echo "Query di ricerca non valida: inserisci almeno 4 caratteri.";
            return;
        } else {
            $tag_res = $articles = null;
            if (isset($tag) && strlen($tag) > 0) {
                $tag_res = $this->tagRepo->fetch_tag_fromid($tag);
                $articles = $this->articleRepo->search_article_from_tag($tag);
            }
            if (isset($query) && strlen($query) > 3) {
                $articles = $this->articleRepo->search_article($query);
            }
            Render::view('search',
                    ['page_title' => 'Ricerca',
                        'ricerca_query' => $query,
                        'ricerca_tag' => $tag_res,
                        'articles' => $articles]);
        }
    }

}
