<?php

require_once './utilities/Autoloader.php';
require_once './utilities/date-functions.php';
require_once './utilities/Utilities.php';

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
$GLOBALS['comments_enabled'] = false;
$request = '';
$show_banner = false;
if (array_key_exists('page', $_GET)) {
    $request = $_GET['page'];
}
$param = explode('/', $request);
$controller = $param[0];
$action = count($param) > 1 ? $param[1] : null;
$sub_action = count($param) > 2 ? $param[2] : null;

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
        $tag = array_key_exists('tag', $_GET) ? $_GET['tag'] : '';
        $controller->search_articles($query, $tag);
        break;
    case 'about' :
        $controller = new AboutController();
        $controller->about_page();
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
    case 'api' :
        $controllerClass = studly($action . '-controller');
        $method = studly($sub_action);
        $methodName = $method;

        if(method_exists($controllerClass, $methodName)) {
            $controller = new $controllerClass();
            return $controller->$methodName();
        }
        break;
    default:
        http_response_code(404);
        Render::view('404', []);
        break;
}
?>