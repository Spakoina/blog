<?php

class Category {

    private $id_category_url_cd;
    private $cat_order;
    private $category_label;
    private $category_sub_title;
    private $category_banner_img;
    private $category_ds;
    private $meta_description;
    private $category_img;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

}

?>