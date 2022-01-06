<?php

class CategoryController {

    function __construct() {
        
    }

    public function category_page($id) {
        if (strlen($id) == 0) {
            $this->category_page_notfound();
            return;
        } else {
            $catRepo = new CategoryRepository();
            $category = $catRepo->fetch_by_id($id);
            $artRepo = new ArticleRepository();
            $articles = $artRepo->fetch_by_category($id);
            if (count($category) > 0) {
                require_once 'views/category.php';
            } else {
                $this->category_page_notfound();
            }
        }
    }

    private function category_page_notfound() {
        echo "Categoria non esistente.";
    }

}
