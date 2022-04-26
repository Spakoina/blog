<div style="top: 2rem;">
    <div class="p-2 mb-5 bg-light rounded text-center">
        <img class="img-fluid rounded-circle mx-auto d-block" src="<?php echo $GLOBALS['base_complete_url']; ?>/img/scrivere.jpg">
        <h4 class="fst-italic pt-2">Benvenuti sul mio blog</h4>
        <p class="mb-0">Ehilà curiosa o curioso!<br><!-- comment --> 
            Sono Chiara e sono molto felice tu sia su questo blog.<br><!-- comment -->
            Qui riporto i miei pensieri su quello che scopro e che mi fa crescere, 
            nella speranza di dare anche agli altri un piccolo contributo al bisogno di crescita. <br><!-- comment -->
              </p>
        <br>
        Se ti piace quello che faccio puoi sostenermi comprandomi un caffè &#x2661
        <div class="text-center pt-4">
            <script type='text/javascript' src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Support Me on Ko-fi', '#376940', 'W7W27UWGO');kofiwidget2.draw();</script> 
        </div>
        <!-- Fine kofi -->
        <br>  
        <img class="img-fluid" 
             src="<?php echo $GLOBALS['base_complete_url']; ?>/img/firma-sm.jpg" alt="Firma Chiara">
    </div>

    <div style="top: 2rem;">
        <div class="mt-5 mb-3 bg-light rounded text-center">
            <h4 class="fst-italic mb-0 pt-2">I più popolari su Instagram </p></h4>
        </div>

        <!<!--Griglia Ig -->
        <div class="row row-cols-1 row-cols-md-2 g-4 hoveropacity">
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CakTEUzjryE/" target="_blank">  
                            <img class="img-fluid" src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/fuoco-ig.jpg" class="card-img-top" alt="Foto copertina su kindle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CU2nD6UMQ19/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/carafa-ig.jpg" class="card-img-top" alt="Foto copertina libro cartaceo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CUmi0V5MzVy/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/terra-ig.jpg" class="card-img-top" alt="Foto copertina libro sulla terra">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CaHc_1LM0vK/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/venez-ig.jpg" class="card-img-top" alt="Foto facciata gialla Venezia">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CUP4jXrM75S/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/cielo-ig.jpg" class="card-img-top" alt="Foto cielo rosa">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <a href="https://www.instagram.com/p/CaFhBInMCle/" target="_blank">  
                            <img src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/finestra-ig.JPG" class="card-img-top" alt="Foto Instagram">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!<!-- Goodreads -->
        <div style="top: 2rem;">
            <div class="mt-5 mb-3 bg-light rounded text-center">
                <h4 class="fst-italic mb-0">Cosa sto leggendo </p></h4>
            </div>
            <div class="border p-3">
                <div class="row">
                    <div class="col-9">
                        <h5><em>Il piccolo libro dell'Ikigai</em></h5> di Ken Mogi
                    </div>
                    <div class="col-3">
                        <img class="img-fluid" 
                             src="<?php echo $GLOBALS['base_complete_url']; ?>/img/ikigai.jpg" alt="Copertina libro">
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3 text-center"><a href="https://www.goodreads.com/user/show/104782651-evadida-eu-sou" target="_blank">
                            <img class="border imghoveropacity" goodreads.com/papergirlblog
                                 src="<?php echo $GLOBALS['base_complete_url']; ?>/img/grlogo.jpg" alt="banner goodreads">  </a>           
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col bg-light rounded text-center">
                <h4 class="fst-italic ">Cerca articoli per tag</p></h4>
            </div>
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
</div>


