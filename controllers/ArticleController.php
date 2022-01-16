<?php

class ArticleController {

    private $articleRepo;
    private $tagRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
        $this->tagRepo = new TagRepository();
    }

    public function article_page($article_id) {
        $article = $this->articleRepo->fetch_article_fromid($article_id);
        $next_art = $this->articleRepo->search_next_article($article[0]);
        $prev_art = $this->articleRepo->search_prev_article($article[0]);
        $tags = $this->tagRepo->fetch_tag_from_art_id($article_id);
        Render::view('article',
                ['page_title' => $article[0]->title,
                    'meta_description' => $article[0]->meta_description,
                    'article' => $article,
                    'next_art' => $next_art,
                    'prev_art' => $prev_art,
                    'tags' => $tags]);
    }

}
