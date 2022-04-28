<?php

class CommentEmailSender {

    public static function buildAndSendWithLink($link) {
        $emailBuilder = new EmailBuilder();
        $emailBuilder->setTo("paperblogchiara@gmail.com")
                ->setSubject("PaperGirlBlog - Nuovo commento")
                ->setMessage("Ciao, buone notizie, un utente ha commentato l'articolo $link.")
                ->buildAndSend();
    }
}

?>