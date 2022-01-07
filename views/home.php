<?php
$arrUtils = new ArrayUtils();
$arrUtils->sortArticleByDate($articles);

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
                <a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->id_article_url_cd; ?>">
                    Leggi tutto...
                </a>
            </p>
        </div>
    </article>
    <hr>
    <?php
}
?>
