<?php

class Tag {
    private $id_tag_cd;
    private $tag_label;
    private $tag_icon;

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