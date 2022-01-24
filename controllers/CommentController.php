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
        $data = array('secret' => '6LfCIjIeAAAAAC_ICV7x_dE-6YnLwm5G969Ka0xM', 'response' => $captcha);

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

        $result = json_decode($result, true);
        if (isset($result) && $result != null && is_array($result) && array_key_exists("success", $result)) {
            
            if ($result['success'] == 'true') {
                // Save post
                $entity = new ArticleComment();
                $entity->id_article_url_cd = $article_url_cd;
                $entity->creation_dt = format_datetime(time());
                $entity->user = $name;
                $entity->comment = $comment;
                $entity->reply_to = null;
                $this->commRepo->insert_row($entity);
                echo "Commento inserito correttamente";
            } else {
                // Errore reCaptcha
                echo "Errore nella verifica di reCaptcha";
            }
        }else{
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

}
