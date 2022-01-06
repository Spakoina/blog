<?php
$arrUtils = new ArrayUtils();
$arrUtils->sortArticleByDate($articles);

// Printing all the articles in HTML
foreach ($articles as $key => $value) {
    ?>
    <article class="blog-post row">
        <div class="col-3">
            <?php if (strlen($value->photo) > 0) { ?>
                <img class="img-fluid" 
                     src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/<?php echo $value->photo; ?>">
                 <?php } ?>
        </div>
        <div class="col-9">
            <h2 class="blog-post-title"><?php echo $value->title; ?></h2>
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
