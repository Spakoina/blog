<?php

class CommentEmailSender {

    public static function buildAndSendWithLink($link, $name, $comment) {
        $emailBuilder = new EmailBuilder();
        $emailBuilder->setTo("paperblogchiara@gmail.com")
                ->setSubject("PaperGirlBlog - Nuovo commento")
                ->setMessage("Ciao, buone notizie, un utente ha commentato l'articolo $link.<br/>"
                        . "L'utente '$name' ha scritto: <br/><br/><i>$comment</i>")
                ->buildAndSend();
    }
}

?>