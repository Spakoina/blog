<?php

class ArticleController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function article_page($article_id) {
        $article = $this->articleRepo->fetch_article_fromid($article_id);
        $next_art = $this->articleRepo->search_next_article($article[0]);
        $prev_art = $this->articleRepo->search_prev_article($article[0]);
        Render::view('article',
                ['page_title' => $article[0]->title,
                    'meta_description' => $article[0]->meta_description,
                    'article' => $article,
                    'next_art' => $next_art,
                    'prev_art' => $prev_art]);
    }

}
