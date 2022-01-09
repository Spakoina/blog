<?php

require_once './utilities/Autoloader.php';
require_once './utilities/date-functions.php';

function url($base_url) {
    return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'https',
            $_SERVER['SERVER_NAME'],
            $base_url
    );
}

$currentPath = $_SERVER['PHP_SELF'];
$pathInfo = pathinfo($currentPath);
$base_url = $pathInfo['dirname'];
$base_complete_url = url($base_url == '/' ? '' : $base_url);
$GLOBALS['base_complete_url'] = $base_complete_url;
$GLOBALS['current_url'] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$request = '';
$show_banner = false;
if (array_key_exists('page', $_GET)) {
    $request = $_GET['page'];
}
$param = explode('/', $request);
$controller = $param[0];
$action = count($param) > 1 ? $param[1] : null;

//echo $request;exit;

switch ($controller) {
    case '/' :
    case '' :
        //main-banner.jpg
        $homeController = new HomeController();
        $homeController->home_page();
        break;
    case 'search' :
        $controller = new SearchController();
        $query = array_key_exists('query', $_GET) ? $_GET['query'] : '';
        $controller->search_articles($query);
        break;
    case 'categoria' :
        $controller = new CategoryController();
        $controller->category_page($action);
        break;
    case 'article' :
        $articlesController = new ArticleController();
        $articlesController->article_page($action);
        break;
    case 'sitemap.xml' :
        $sitemapController = new SitemapController();
        $sitemapController->sitemap();
        break;
    default:
        http_response_code(404);
        Render::view('404', []);
        break;
}
?>