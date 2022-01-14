<h1 class="mt-4 mb-5 font-luxurious">
    <?php echo $article[0]->title; ?>
</h1>

<p class="blog-post-meta fst-italic"><?php echo format_date(strtotime($article[0]->date)); ?></p>

<div class="row articlecontainer">
    <?php
    $filename = 'views/articles/' . $article[0]->id_article_url_cd . '.php';
    if (file_exists($filename)) {
        require_once($filename);
    } else {
        echo "L'articolo non esiste oppure contiene un errore.";
    }
    ?>
</div>



<div class="row mt-4 mb-2">
    <div class="col">
        <p class="font-size-medium"> <em>Puoi seguirmi sull'account Instagram <a class="article-title-link" href="https://www.instagram.com/papergirl.ninja/" target="_blank"><b>@papergirl.ninja</b></a> e non perderai nessun articolo.</p>
    </div>
</div>

<div class="row mb-5">
    <div class="col">
        <img class="img-fluid rounded float-end" 
             alt="Scritta della firma Chiara" 
             src="<?php echo $GLOBALS['base_complete_url']; ?>/img/firma.jpg">
    </div>
</div>



<div class="row mt-5">

    <div class="col">
        <?php
        if (isset($prev_art) && $prev_art != null) {
            echo '<a class="text-spacing-2 text-uppercase article-title-link" '
            . ' href="' . $GLOBALS['base_complete_url'] . '/article/' . $prev_art->id_article_url_cd . '"><b>Articolo precedente</b></a></em>';
        }
        ?>
    </div>

    <div class="col text-center">
        Torna alla <a class="text-spacing-2 text-uppercase article-title-link" 
                      href="<?= $GLOBALS['base_complete_url']; ?>/"><b>HOME PAGE</b></a></em>
    </div>

    <div class="col text-end">
        <?php
        if (isset($next_art) && $next_art != null) {
            echo '<a class="text-spacing-2 text-uppercase article-title-link" '
            . 'href="' . $GLOBALS['base_complete_url'] . '/article/' . $next_art->id_article_url_cd . '"><b>Articolo successivo</b></a></em>';
        }
        ?>
    </div>

</div>


