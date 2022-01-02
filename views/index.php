<?php
foreach ($articles as $key => $value) {
    ?>
        <article class="blog-post">
        <h2 class="blog-post-title"><?php echo $value->title ?></h2>
        <p class="blog-post-meta"><?php echo $value->date ?></p>

        <p><?php echo $value->description ?></p>

        <a href="<?php echo $base_complete_url . '/article/' .$value->article_url_cd ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Read more</a>

        <hr>
    <?php
}

?>
