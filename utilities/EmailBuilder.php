<?php

class EmailBuilder {

    private string $to;
    private string $subject;
    private string $message;
    private string $headers;

    function __construct() {
        $this->headers = 'From: "PaperGirlBlog" <donotreply@papergirlblog.com>';
        $this->headers .= "MIME-Version: 1.0\r\n";
        $this->headers .= "Content-Type: text/html; charset=UTF-8\r\n";
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
                $this->headers,
        );
    }

}

?>