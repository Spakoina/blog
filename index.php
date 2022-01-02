<?php
function url($base_url){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $base_url
    );
  }

  $base_url = '/blog';
  $base_complete_url = url($base_url);
  $request = '';
  if (array_key_exists('page', $_GET)) {
    $request = $_GET['page'];
  }
  
//echo $request;exit;

ob_start();
switch ($request) {
    case '/' :
    case '' :
        require 'db-connection.php';
        $articles = fetch_articles();
        require( __DIR__ . '\views\index.php');
        break;
    case 'libri' :
        require( __DIR__ . '\views\libri.php');
        break;
    case 'article' :
        if (array_key_exists('article', $_GET)) {
            require 'db-connection.php';
            $article = fetch_article($_GET['article']);
            //print_r($article);exit;
            require( __DIR__ . '\views\article.php');
        }
        break;
    default:
        http_response_code(404);
        require( __DIR__ . '\views\404.php');
        break;
}

$content = ob_get_clean();


require __DIR__ . '/templates/base.php';

?>