<?php

class ArticleController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function article_page($article_id) {
        $article = $this->articleRepo->fetch_article_fromid($article_id);
        Render::view('article',
                ['article' => $article]);
    }

}
