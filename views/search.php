<h1>Risultati ricerca</h1>

<?php
if (isset($ricerca_query) && strlen($ricerca_query) > 3) {
    echo '<p>Ricerca articoli per <em>"' . htmlspecialchars($ricerca_query) . '"</em>.</p>';
}
if (isset($ricerca_tag) && $ricerca_tag != null) {
    $tag_block = '<span class="tag-link "><i class="' . $ricerca_tag->tag_icon . '"></i> ' . $ricerca_tag->tag_label . '</span>';
    echo '<p>Ricerca articoli per ' . $tag_block . '</p>';
}
?>

<?php
if (isset($articles) && $articles != null && count($articles) > 0) {

// Sorting articles by date
    function cmp($a, $b) {
        $dateA = strtotime($a->date);
        $dateB = strtotime($b->date);
        if ($dateA == $dateB) {
            return 0;
        }
        return ($dateA > $dateB) ? -1 : 1;
    }

    usort($articles, "cmp");

// Printing all the articles in HTML
    foreach ($articles as $key => $value) {
        ?>
        <article class="blog-post row">
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
}else{
    echo '<em>Mi dispiace, non ho trovato nessun articolo, prova a cambiare i parametri di ricerca.</em>';
}
?>
