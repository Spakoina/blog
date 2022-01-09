<?php
$arrUtils = new ArrayUtils();
$arrUtils->sortArticleByDate($articles);

// Featured article
$featured_art = $articles[0];
?>
<article class="blog-post row mb-3">
    <div class="col-12 text-center">
        <div class="row text-uppercase">
            <a class="article-title-link"
               href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $featured_art->id_article_url_cd; ?>">
                <h2 class="blog-post-title"><?php echo $featured_art->title; ?></h2>
            </a>
        </div>
        <div class="border mx-auto mb-3 border-dark" style="width: 5%"></div>
        <div class="row">
            <a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $featured_art->id_article_url_cd; ?>">
                <img class="img-fluid" 
                     src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/<?php echo $featured_art->photo_featured; ?>">
            </a>
        </div>
        <div class="row mt-2">
            <div class="col-8 offset-2">
                <p class="font-size-medium text-spacing-1">
                    <?php echo $featured_art->description; ?>
                </p>
                <a class="text-spacing-2 text-uppercase article-title-link"
                    href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $featured_art->id_article_url_cd; ?>">
                    Continua a leggere
                </a>
            </div>
        </div>
    </div>
</article>
<hr />
<?php
$articles = array_slice($articles, 1);

// Printing all the articles in HTML
foreach ($articles as $key => $value) {
    ?>
    <article class="blog-post row mb-3">
        <div class="col-5">
            <?php if (strlen($value->photo) > 0) { ?>
                <a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->id_article_url_cd; ?>">
                    <img class="img-fluid" 
                         src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/<?php echo $value->photo; ?>">
                </a>
            <?php } ?>
        </div>
        <div class="col-7">
            <a class="article-title-link"
               href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->id_article_url_cd; ?>">
                <h2 class="blog-post-title"><?php echo $value->title; ?></h2>
            </a>
            <p class="blog-post-meta fst-italic"><?php echo format_date(strtotime($value->date)); ?></p>

            <p>
                <?php echo $value->description; ?>
            </p>
        </div>
    </article>
    <hr />
    <?php
}
?>
