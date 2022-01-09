<?php

class SitemapController {

    private $catRepo;
    private $artRepo;
    private $pages;

    function __construct() {
        $this->catRepo = new CategoryRepository();
        $this->artRepo = new ArticleRepository();
        $this->pages = [];
    }

    public function sitemap() {
        $this->pages = [];

        $categories = $this->catRepo->fetch_all();
        if (count($categories) > 0) {
            foreach ($categories as $cat) {
                $this->pages[] = new Page('categoria/' . $cat->id_category_url_cd, 'todo', 'weekly');
            }
        }

        $last_article_date = null;
        $articles = $this->artRepo->fetch_articles();
        if (count($articles) > 0) {
            foreach ($articles as $art) {
                $this->pages[] = new Page(
                        'article/' . $art->id_article_url_cd, 
                        format_date_notime(strtotime($art->date)), 
                        'monthly');
                $art_date = strtotime($art->date);
                if ($last_article_date == null || $art_date > $last_article_date) {
                    $last_article_date = $art_date;
                }
            }
        }

        $this->pages[] = new Page('', format_date_notime(strtotime($last_article_date)), 'weekly');
        //$this->pages[] = new Page('search', 'todo', 'weekly');

        Render::view_basic('sitemap',
                ['pages' => $this->pages]
        );
    }

}
?>