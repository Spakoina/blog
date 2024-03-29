<div style="top: 2rem;">

    <div style="top: 2rem;">
        <div class=" mt-5 mb-3 rounded text-center">
            <h2 class="fst-italic">Approfondisci</h2>
        </div>


        <div class="row mt-2">
            <div class="col">
                <?php
                if (isset($all_tags) && count($all_tags) > 0) {
                    foreach ($all_tags as $tag) {
                        $search_link = $GLOBALS['base_complete_url'] . '/search?tag=' . $tag->id_tag_cd;
                        echo '<a class="tag-link default-link mb-2" href="' . $search_link . '"><i class="' . $tag->tag_icon . '"></i> ' . $tag->tag_label . '</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

     <!<!-- Goodreads -->
        <div style="top: 2rem;">
            <div class="mt-5 mb-3  rounded text-center">
                <h2 class="fst-italic mb-0">Cosa sto leggendo</h2>
            </div>
            
            <div class="border p-3">
                <div class="row">
                    <div class="col-6">
                        <em>La malinconia del mammut</em> di Massimo Sandal
                    </div>
                    <div class="col-6">
                        <img class="img-fluid" 
                             src="<?php echo $GLOBALS['base_complete_url']; ?>/img/malinco.webp" alt="Copertina libro">
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3 text-center"><a href="https://www.goodreads.com/user/show/104782651-evadida-eu-sou" target="_blank">
                            <img class="border imghoveropacity img-fluid"
                                 src="<?php echo $GLOBALS['base_complete_url']; ?>/img/grlogo.webp" alt="banner goodreads">  </a>           
                    </div>
                </div>
            </div>
        </div>
    
    
    
    <div style="top: 2rem;">
        <div class="mt-5 mb-3 rounded text-center">
            <h2 class="fst-italic mb-0 pt-2">I più popolari su Instagram </p></h2>
        </div>

        <!<!--Griglia Ig -->
        <div class="row row-cols-1 row-cols-md-2 g-4 hoveropacity">
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CakTEUzjryE/" target="_blank">  
                            <img class="img-fluid" src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/fuoco-ig.webp" class="card-img-top" alt="Foto copertina su kindle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CU2nD6UMQ19/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/carafa-ig.webp" class="card-img-top" alt="Foto copertina libro cartaceo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CTFB-S3MV6j/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/pia-ig.webp" class="card-img-top" alt="Foto copertina libro orto">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CaHc_1LM0vK/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/venez-ig.webp" class="card-img-top" alt="Foto facciata gialla Venezia">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CZ93oC-LBCA/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/pianeta-ig.webp" class="card-img-top" alt="Foto pianta tv">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CdYc51CseWp/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/iki-ig.webp" class="card-img-top" alt="Foto Libro Ikigai">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        

        
        
       
      
</div>
</div>

