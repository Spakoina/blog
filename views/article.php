<?php
?><h1><?php
echo $article[0]->title;
?></h1>
<div class="row"><?php require_once('articles/'.$article[0]->article_url_cd.'.php'); ?></div><?php
?>