<?php

class HomeController {

    private $articleRepo;

    function __construct() {
        $this->articleRepo = new ArticleRepository();
    }

    public function home_page() {
        $article = $this->articleRepo->fetch_articles();
        $banner_content = '<h1><img class="img-fluid mx-auto d-none d-md-block"  alt="Papergirl Blog" 
                             src="' . $GLOBALS['base_complete_url'] . '/img/logo.jpg"></h1>
                        <p class="d-block d-md-none m-0">Il blog per nutrire la curiosità</p>';

        $pre_content = '';
        /*                '<div class="jumbotron jumbotron-img p-3 p-md-5 text-white rounded bg-dark mb-3" style="background-image: url(\''.$GLOBALS['base_complete_url'] . '/img/featured-1.jpg\')">
          <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
          </div>
          </div>'; */

        Render::view('home',
                ['page_title' => 'Home',
                    'meta_description' => 'Blog personale con consigli di lettura, recensioni di libri e articoli su vari argomenti',
                    'banner_img' => 'mainbanner.webp',
                    'articles' => $article,
                    'banner_content' => $banner_content,
                    'pre_content' => $pre_content]
        );
    }

}
