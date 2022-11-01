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
                    <div class="col-6 offset-3"<a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $featured_art->id_article_url_cd; ?>">
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
            <div class="col text-center">
                <h2 class="font-size-medium text-uppercase">I più letti</h2>
            </div>
        </div>
        <!-- Featured 1 -->
        <div class="row mb-2 featured-article-box">
            <div class="col">
                <div class="row"><div class="col"><a class="article-title-link" href="<?= $GLOBALS['base_complete_url'] ?>"><h2 class="blog-post-title mt-2 h3">Filastrocca per bambini sull'autunno: Ottobre</h2></a></div></div>
                <div class="row"><div class="col">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida magna id diam volutpat, non suscipit massa consequat. </div></div>
                <div class="row"><div class="col text-end mb-2 mr-2"><a class="read-more-link" href="<?= $GLOBALS['base_complete_url'] ?>">Leggi l'articolo</a></div></div>
            </div>
        </div>
        <!-- Featured 2 -->
        <div class="row mb-2 featured-article-box">
            <div class="col">
                <div class="row"><div class="col"><a class="article-title-link" href="<?= $GLOBALS['base_complete_url'] ?>"><h2 class="blog-post-title mt-2 h3">Filastrocca per bambini sull'autunno: Ottobre</h2></a></div></div>
                <div class="row"><div class="col">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida magna id diam volutpat, non suscipit massa consequat. </div></div>
                <div class="row"><div class="col text-end mb-2 mr-2"><a class="read-more-link" href="<?= $GLOBALS['base_complete_url'] ?>">Leggi l'articolo</a></div></div>
            </div>
        </div>
        <!-- Featured 3 -->
        <div class="row mb-2 featured-article-box">
            <div class="col">
                <div class="row"><div class="col"><a class="article-title-link" href="<?= $GLOBALS['base_complete_url'] ?>"><h2 class="blog-post-title mt-2 h3">Filastrocca per bambini sull'autunno: Ottobre</h2></a></div></div>
                <div class="row"><div class="col">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida magna id diam volutpat, non suscipit massa consequat. </div></div>
                <div class="row"><div class="col text-end mb-2 mr-2"><a class="read-more-link" href="<?= $GLOBALS['base_complete_url'] ?>">Leggi l'articolo</a></div></div>
            </div>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-6">
        <div class="row">
            <?php
            $latest_articles = array_slice($articles, 1, 2);

            // Printing all the articles in HTML
            $row_n = 0;
            foreach ($latest_articles as $key => $value) {
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
            <?php } ?>
        </div>
    </div>
    <div class="col-6">
    </div>
</div>
<hr />
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col h1 text-center">
                I miei materiali
            </div>
        </div>
        <div class="row gx-3 h2 text-center">
            <div class="col-4">
                <div class="bg-secondary py-3">paperino</div>
            </div>
            <div class="col-4">
                <div class="bg-secondary py-3">paperino</div>
            </div>
            <div class="col-4">
                <div class="bg-secondary py-3">paperino</div>
            </div>
        </div>
    </div>
</div>
