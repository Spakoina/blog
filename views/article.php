<h1 class="mt-4 mb-5 font-luxurious">
    <?php echo $article[0]->title; ?>
</h1>

<p class="blog-post-meta fst-italic"><?php echo format_date(strtotime($article[0]->date)); ?></p>

<div class="row articlecontainer">
    <?php
    $filename = 'views/articles/' . $article[0]->id_article_url_cd . '.php';
    if (file_exists($filename)) {
        require_once($filename);
    }else{
        echo "L'articolo non esiste oppure contiene un errore.";
    }
    ?>
</div>

<div class="row mt-2 mb-5">
        <div class="col">
         <img class="img-fluid rounded float-end" 
                 alt="Scritta della firma Chiara" 
                 src="<?php echo $GLOBALS['base_complete_url']; ?>/img/firma.jpg">
        </div>
    
   
</div>
    <div class="row mt-5">
        <div class="col">
            <p class="font-size-medium"> <em>Puoi seguirmi sull'account Instagram cliccando <a href="https://www.instagram.com/papergirl.ninja/" target="_blank"><b>QUI</b></a> e non perderai nessun articolo. 
                    Torna alla <a href="https://www.papergirlblog.com"><b>HOME PAGE</b></a></em> </p>
        </div>
         
</div>

