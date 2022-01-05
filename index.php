<?php

require_once './utilities/Autoloader.php';
require_once './utilities/date-functions.php';

function url($base_url) {
    return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $base_url
    );
}

$currentPath = $_SERVER['PHP_SELF'];
$pathInfo = pathinfo($currentPath);
$base_url = $pathInfo['dirname'];
$base_complete_url = url($base_url == '/' ? '' : $base_url);
$request = '';
$show_banner = false;
if (array_key_exists('page', $_GET)) {
    $request = $_GET['page'];
}

//echo $request;exit;

ob_start();
switch ($request) {
    case '/' :
    case '' :
        $articlesRepo = new ArticlesRepository();
        $articles = $articlesRepo->fetch_article_fromid($_GET['article']);
        $show_banner = true;
        require( __DIR__ . '/views/home.php');
        break;
    case 'search' :
        $controller = new Search();
        $query = array_key_exists('query', $_GET) ? $_GET['query'] : '';
        $controller->search($query);
        //require( __DIR__ . '/views/libri.php');
        break;
    case 'libri' :
        require( __DIR__ . '/views/libri.php');
        break;
    case 'cucina' :
        require( __DIR__ . '/views/cucina.php');
        break;
    case 'article' :
        if (array_key_exists('article', $_GET)) {
            $articlesRepo = new ArticlesRepository();
            $article = $articlesRepo->fetch_article_fromid($_GET['article']);
            require( __DIR__ . '/views/article.php');
        }
        break;
    default:
        http_response_code(404);
        require( __DIR__ . '/views/404.php');
        break;
}

$content = ob_get_clean();

require __DIR__ . '/templates/base.php';
?>