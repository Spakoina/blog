<?php

class Render {

    public static function view($template, $vars) {
        extract($vars);
        $template_path = ABSPATH . 'views/' . $template . '.php';
        
        ob_start();
        if (file_exists($template_path)) {
            include($template_path);
        }else{
            echo 'Errore durante il caricamento della vista.';
        }
        $content = ob_get_clean();
        
        require __DIR__ . '/templates/base.php';
    }

}

?>