<h1 class="mt-4 mb-5 font-luxurious">
    <?php echo $category[0]->category_label; ?>
</h1>

<?php if (strlen($category[0]->category_img) > 0) { ?>
    <img class="img-fluid mb-2" 
         alt="<?php echo $category[0]->category_label ; ?>" 
         src="<?php echo $GLOBALS['base_complete_url']; ?>/img/categories/<?php echo $category[0]->category_img; ?>">
         <?php
     }
     if (strlen($category[0]->category_ds) > 0) {
         ?>
    <p class="blog-post-meta fst-italic">
        <?php echo $category[0]->category_ds; ?>
    </p>
    <?php
}
?>

<div class="row">
    <p>...qui la lista...</p>
</div>