<?php

class ArticleController {

    private $articleRepo;
    private $tagRepo;
    private $commRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
        $this->tagRepo = new TagRepository();
        $this->commRepo = new CommentRepository();
    }

    public function article_page($article_id) {
        $article = $this->articleRepo->fetch_article_fromid($article_id);
        $next_art = $this->articleRepo->search_next_article($article[0]);
        $prev_art = $this->articleRepo->search_prev_article($article[0]);
        $tags = $this->tagRepo->fetch_tag_from_art_id($article_id);
        $comments = $this->commRepo->fetch_by_article($article_id);
        $meta_article_img_url = $GLOBALS['base_complete_url'] . '/img/imgarticles/' . $article[0]->photo;
        Render::view('article',
                ['page_title' => $article[0]->title,
                    'meta_description' => $article[0]->meta_description,
                    'meta_org_title' => $article[0]->title,
                    'meta_org_image_url' => $meta_article_img_url,
                    'article' => $article,
                    'next_art' => $next_art,
                    'prev_art' => $prev_art,
                    'tags' => $tags,
                    'comments' => $comments]);
    }

}
