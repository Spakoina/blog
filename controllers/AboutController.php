<?php

class AboutController {

    function __construct() {
        
    }

    public function about_page() {
        $params = ['page_title' => 'About',
            'meta_description' => ''];
        Render::view('about', $params);
    }

}
