<?php

class HomeController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function home_page() {
        $article = $this->articleRepo->fetch_articles();
        $banner_content = '<img class="img-fluid mx-auto d-none d-md-block"  
                             src="' . $GLOBALS['base_complete_url'] . '/img/paper.png">
                        <p class="d-block d-md-none m-0">Il blog per nutrire la curiosità</p>';

        Render::view('home',
                ['page_title' => 'Home',
                    'banner_img' => 'main-banner.jpg',
                    'articles' => $article,
                    'banner_content' => $banner_content]
        );
    }

}
