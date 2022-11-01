<?php

class HomeController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function home_page() {
        $article = $this->articleRepo->fetch_articles();
        $banner_content = '<h1><img class="img-fluid mx-auto d-none d-md-block banner-main-logo"  alt="Papergirl Blog" 
                             src="' . $GLOBALS['base_complete_url'] . '/img/paper.png"></h1>
                        <p class="d-block d-md-none m-0">Il blog per nutrire la curiosità</p>';

        $pre_content = '';

        Render::view('home',
                ['page_title' => 'Home',
                    'meta_description' => 'Blog personale con consigli di lettura, recensioni di libri e articoli su vari argomenti',
                    'banner_img' => 'blank',
                    'articles' => $article,
                    'banner_content' => $banner_content,
                    'pre_content' => $pre_content,
                    'hide_right_menu' => true]
        );
    }

}
