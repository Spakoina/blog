<?php

class Render {

    public static function view($template, $vars) {
        extract($vars);
        $template_path = './views/' . $template . '.php';

        ob_start();
        if (file_exists($template_path)) {
            require $template_path;
        } else {
            echo 'Errore durante il caricamento della vista.';
        }
        $content = ob_get_clean();

        require './templates/base.php';
    }

    public static function view_basic($template, $vars) {
        extract($vars);
        $template_path = './views/' . $template . '.php';

        if (file_exists($template_path)) {
            require $template_path;
        } else {
            echo 'Errore durante il caricamento della vista.';
        }
    }

}

?>