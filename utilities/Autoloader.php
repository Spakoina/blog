<?php
function autoloadModel($className) {
    $filename = "entities/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadController($className) {
    $filename = "controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadUtils($className) {
    $filename = "utilities/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadUtils");
