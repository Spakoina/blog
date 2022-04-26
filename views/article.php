<h1 class="mt-4 font-luxurious">
    <?php echo $article[0]->title; ?>
</h1>
<?php
if (isset($tags) && count($tags) > 0) {
    echo '<div class="row"> <div class="col">';
    foreach ($tags as $tag) {
        $search_link = $GLOBALS['base_complete_url'] . '/search?tag=' . $tag->id_tag_cd;
        echo '<a class="tag-link default-link" href="' . $search_link . '"><i class="' . $tag->tag_icon . '"></i> ' . $tag->tag_label . '</a>';
    }
    echo '</div></div>';
}
?>
<p class="blog-post-meta fst-italic mt-3"><?php echo format_date(strtotime($article[0]->date)); ?></p>

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
        <p class="font-size-medium"> <em>Puoi seguirmi sull'account Instagram 
                <a class="article-title-link" href="https://www.instagram.com/papergirl.ninja/" target="_blank"><b>@papergirl.ninja</b></a>
                e non perderai nessun articolo.</p>
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

<!-- Sezione commenti -->
<?php
if (isset($GLOBALS['comments_enabled']) && $GLOBALS['comments_enabled'] == 'true') {
    if (isset($comments) && is_array($comments) && sizeof($comments) > 0) {
        ?>
        <div class="row mt-5">
            <div class="col">
                <h5 class="display-6">Commenti</h5>
            </div>
        </div>
        <?php
        foreach ($comments as $comment) {
            ?>
            <div class="row">
                <div class="col">
                    <span class="comment-title"><?= '<strong>' . $comment->user . '</strong> - ' . format_date(strtotime($comment->creation_dt)) ?></span><br />
                    <?= $comment->comment ?>
                </div>
            </div>
            <hr/>
            <?php
        }
    }
    ?>
    <form action = "<?php echo $GLOBALS['base_complete_url']; ?>/api/comment/post-comment/" method = "post" id = "commentArticleForm">
        <input type = "hidden" name = "article_url_cd" id = "article_url_cd" value = "<?= $article[0]->id_article_url_cd ?>" />
        <div class = "row my-3">
            <div class = "col-12">
                <div class = "row">
                    <div class = "col">
                        <div class = "mb-3">
                            <span class="display-6">Commenta l'articolo</span><br />
                            <input type = "text" class = "form-control" id = "name" name = "name" placeholder = "Scrivi qui il tuo nome">
                        </div>
                        <div>
                            <textarea class = "form-control" id = "comment" name = "comment" rows = "5" placeholder = "Scrivi qui il tuo commento"></textarea>
                        </div>
                    </div>
                </div>
                <div class = "row mt-2">
                    <div class = "col-md-8 fst-italic">
                        This site is protected by reCAPTCHA and the Google<br/>
                        <a href = "https://policies.google.com/privacy" target = "_blank">Privacy Policy</a> and
                        <a href = "https://policies.google.com/terms" target = "_blank">Terms of Service</a> apply.
                    </div>
                    <div class = "col-md-4 text-end">
                        <button class = "btn btn-outline-success px-5 g-recaptcha" id="comment-submit"
                                data-sitekey = "6LfIKqMfAAAAADf0yNUNWa_CHtEtSRFi-4RctGXs"
                                data-callback = "onSubmit"
                                data-action = "submit">Commenta</button>

                        <script src = "https://www.google.com/recaptcha/api.js" async defer></script>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Fine sezione commenti -->
    <?php
}
?>