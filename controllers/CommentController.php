<?php

class CommentController {

    private CommentRepository $commRepo;

    function __construct() {
        $this->commRepo = new CommentRepository();
    }

    public function PostComment() {

        $article_url_cd = filter_input(INPUT_POST, 'article_url_cd', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $captcha = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $GLOBALS['GOOGLE_API'], 'response' => $captcha);

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */
            echo "Errore nella verifica di reCaptcha";
            exit;
        }

        $decodedResult = json_decode($result, true);
        if (isset($decodedResult) && $decodedResult != null && is_array($decodedResult) && array_key_exists("success", $decodedResult)) {

            if ($decodedResult['success'] == 'true') {
                // Save post
                $entity = new ArticleComment();
                $entity->id_article_url_cd = $article_url_cd;
                $entity->creation_dt = format_datetime(time());
                $entity->user = $name;
                $entity->comment = $comment;
                $entity->reply_to = null;
                $this->commRepo->insert_row($entity);
                echo "Commento inserito correttamente ";

                // Sending email to Chiara
                $this->sendEmailAndEchoResult($article_url_cd, $name, $comment);
            } else {
                // Errore reCaptcha
                echo "Errore nella verifica di reCaptcha";
            }
        } else {
            echo "Errore nei dati in input";
        }
        exit;
    }

    private function print_vari($var) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        exit;
    }

    private function sendEmailAndEchoResult($article_url_cd, $name, $comment) {
        $emailSent = CommentEmailSender::buildAndSendWithLink(
                        $this->buildArticleLink($article_url_cd), $name, $comment);
        if ($emailSent === true) {
            echo "<br/>Email inviata correttamente ";
        } else {
            echo "<br/>Errore durante l'invio dell'email ";
        }
    }

    private function buildArticleLink($article_url_cd) {
        return $GLOBALS['base_complete_url'] . "/article/$article_url_cd";
    }

}
