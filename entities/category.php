<?php

class Category {
    private $id_category_url_cd;
    private $category_label;
    private $category_ds;
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
};

?>