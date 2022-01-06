<h1 class="mt-4 mb-5 font-luxurious">
    <?php echo $article[0]->title; ?>
</h1>

<p class="blog-post-meta fst-italic"><?php echo format_date(strtotime($article[0]->date)); ?></p>

<div class="row">
    <?php require_once('views/articles/' . $article[0]->id_article_url_cd . '.php'); ?>
</div>