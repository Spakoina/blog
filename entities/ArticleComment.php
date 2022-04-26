<?php

class ArticleComment {

    private $comment_id;
    private $id_article_url_cd;
    private $creation_dt;
    private $user;
    private $comment;
    private $reply_to;

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