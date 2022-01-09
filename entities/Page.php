<?php

class Page {

    private $url;
    private $lastmod;
    private $frequency;

    function __construct(string $url, string $lastmod, string $frequency) {
        $this->url = $url;
        $this->lastmod = $lastmod;
        $this->frequency = $frequency;
    }

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