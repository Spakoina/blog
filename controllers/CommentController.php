<?php

class CommentController {

    function __construct() {
        
    }

    public function PostComment() {

        $name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_EMAIL);
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

        if (isset($result) && $result != null && array_key_exists($result, "success")) {
            if ($result['success'] = 'true') {
                // Save post
            } else {
                // Errore reCaptcha
                echo "Errore nella verifica di reCaptcha";
            }
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
