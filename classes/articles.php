<?php

class Articles {
    private $article_url_cd;
    private $title;
    private $description;
    private $date;
    private $photo;

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