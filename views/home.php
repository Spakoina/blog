<?php
$arrUtils = new ArrayUtils();
$arrUtils->sortArticleByDate($articles);

// Featured article
$featured_art = $articles[0];
?>
<div class="row">
    <div class="col-6">
        <article class="blog-post row mb-3">
            <div class="col-12 text-center">
                <div class="row text-uppercase">
                    <a class="article-title-link"
                       href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $featured_art->id_article_url_cd; ?>">
                        <h2 class="blog-post-title font-size-medium"><?php echo $featured_art->title; ?></h2>
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
                    <div class="col">
                        <p class="font-size-small text-spacing-1">
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
    </div>
    <div class="col-6">
        <div class="row">
            <?php
            $articles = array_slice($articles, 1, 4);

            // Printing all the articles in HTML
            $row_n = 0;
            foreach ($articles as $key => $value) {
                ?>
                <div class="col-6">
                    <article class="blog-post row mb-3">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <?php if (strlen($value->photo) > 0) { ?>
                                        <a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->id_article_url_cd; ?>">
                                            <img class="img-fluid" 
                                                 src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/<?php echo $value->photo; ?>">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a class="article-title-link"
                                       href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->id_article_url_cd; ?>">
                                        <h2 class="blog-post-title font-size-small "><?php echo $value->title; ?></h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php
                if (++$row_n === 2)
                    echo '</div><div class="row">';
            }
            ?>
        </div>
    </div>
</div>
<hr />

