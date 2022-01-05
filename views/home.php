<?php
// Sorting articles by date
function cmp($a, $b)
{
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
        <div class="col-3">
            <?php if (strlen($value->photo) > 0) { ?>
            <img class="img-fluid" 
                 src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/<?php echo $value->photo; ?>">
            <?php } ?>
        </div>
        <div class="col-9">
            <h2 class="blog-post-title"><?php echo $value->title; ?></h2>
            <p class="blog-post-meta fst-italic"><?php echo format_date(strtotime($value->date)); ?></p>

            <p><?php echo $value->description; ?></p>

            <a href="<?php echo $GLOBALS['base_complete_url'] . '/article/' . $value->article_url_cd; ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Read more</a>
        </div>
    </article>
    <hr>
    <?php
}

?>
