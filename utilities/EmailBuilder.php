<?php

class EmailBuilder {

    private string $to;
    private string $subject;
    private string $message;
    private string $from;

    function __construct() {
        $this->from = 'From: "PaperGirlBlog" <donotreply@papergirlblog.com>';
    }

    public function setTo($to) {
        $this->to = $to;
        return $this;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function buildAndSend() {
        mail(
                $this->to,
                $this->subject,
                $this->message,
                $this->from,
        );
    }

}

?>