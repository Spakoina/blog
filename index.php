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
$GLOBALS['base_complete_url'] = $base_complete_url;
$GLOBALS['current_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$request = '';
$show_banner = false;
if (array_key_exists('page', $_GET)) {
    $request = $_GET['page'];
}
$param = explode('/', $request);
$controller = $param[0];
$action = count($param) > 1 ? $param[1] : null;

//echo $request;exit;

ob_start();
switch ($controller) {
    case '/' :
    case '' :
        $articlesRepo = new ArticleRepository();
        $articles = $articlesRepo->fetch_articles();
        $show_banner = true;
        require( __DIR__ . '/views/home.php');
        break;
    case 'search' :
        $controller = new SearchController();
        $query = array_key_exists('query', $_GET) ? $_GET['query'] : '';
        $controller->search_articles($query);
        break;
    case 'libri' :
        require( __DIR__ . '/views/libri.php');
        break;
    case 'cucina' :
        require( __DIR__ . '/views/cucina.php');
        break;
    case 'categoria' :
        $controller = new CategoryController();
        $controller->category_page($action);
        break;
    case 'article' :
        $articlesRepo = new ArticleRepository();
        $article = $articlesRepo->fetch_article_fromid($action);
        require( __DIR__ . '/views/article.php');
        break;
    default:
        http_response_code(404);
        require( __DIR__ . '/views/404.php');
        break;
}

$content = ob_get_clean();

require __DIR__ . '/templates/base.php';
?>