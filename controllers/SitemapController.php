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
        $categories_last_change = $this->catRepo->fetch_lastchange_byid();
        $categories_last_change_bykey = [];
        if (count($categories_last_change) > 0) {
            foreach ($categories_last_change as $cat) {
                $categories_last_change_bykey[$cat['id_category_url_cd']] = $cat['last_change'];
            }
        }
        if (count($categories) > 0) {
            foreach ($categories as $cat) {
                if (array_key_exists($cat->id_category_url_cd, $categories_last_change_bykey)) {
                    $date = $categories_last_change_bykey[$cat->id_category_url_cd];
                    $this->pages[] = new Page('categoria/' . $cat->id_category_url_cd, format_date_notime(strtotime($date)), 'weekly');
                }
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

        $this->pages[] = new Page('', format_date_notime($last_article_date), 'weekly');
        //$this->pages[] = new Page('search', 'todo', 'weekly');

        Render::view_basic('sitemap',
                ['pages' => $this->pages]
        );
    }

}
?>