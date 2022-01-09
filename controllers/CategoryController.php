<?php

class CategoryController {

    private $catRepo;
    private $artRepo;

    function __construct() {
        $this->catRepo = new CategoryRepository();
        $this->artRepo = new ArticleRepository();
    }

    public function category_page($id) {
        if (strlen($id) == 0) {
            $this->category_page_notfound();
            return;
        } else {
            $category = $this->catRepo->fetch_by_id($id);
            $articles = $this->artRepo->fetch_by_category($id);
            $params = ['page_title' => $category[0]->category_label,
                'category' => $category,
                'articles' => $articles];
            if (count($category) > 0) {
                $params = array_merge($params, $this->build_category_paramas_banner($category[0]));
                Render::view('category', $params);
            } else {
                $this->category_page_notfound();
            }
        }
    }

    private function category_page_notfound() {
        Render::view('404', []);
    }

    private function build_category_paramas_banner($category) {
        $params = [];
        if ($category->category_banner_img != null && strlen($category->category_banner_img) > 0) {
            $params['banner_img'] = 'categories/' . $category->category_banner_img;
            if ($category->category_sub_title != null && strlen($category->category_sub_title) > 0) {
                $params['banner_content'] = $category->category_sub_title;
            }
        }
        return $params;
    }

}
