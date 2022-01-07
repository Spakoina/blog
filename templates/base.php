<!doctype html>
<html lang="it">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Chiara Censorio">
        <meta name="generator" content="Chiara Censorio">
        <title>Blog Chiara</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $GLOBALS['base_complete_url']; ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>


        <!-- Custom styles for this template -->
        <link href="<?php echo $GLOBALS['base_complete_url']; ?>/css/blog.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&family=Nunito+Sans:ital,wght@0,200;1,200;1,300&display=swap" rel="stylesheet"> 
    </head>

    <body>

        <div class="container">
            <?php
            include("nav.php");
            ?>
        </div>

        <main class="container">
            <?php
            if (isset($banner_img) && strlen($banner_img) > 0) {
                if (isset($banner_content) && strlen($banner_content) > 0) {
                    ?>
                    <div style="background-image: url('<?php echo $GLOBALS['base_complete_url'] . '/img/' . $banner_img; ?>')" 
                         class="main-banner py-5 mb-5 d-flex justify-content-center">
                        <div class="p-1 border text-center">
                            <div class="bg-white p-2 m-0 font-luxurious">
                                <?= $banner_content; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <img class="img-fluid mb-5 mx-auto d-block"  
                         src="<?= $GLOBALS['base_complete_url'] . '/img/' . $banner_img; ?>">
                         <?php
                     }
                 }
                 ?>

            <div class="row g-5">
                <div class="col-md-8">
                    <?php
                    echo $content;
                    ?>

                </div>

                <div class="col-md-4">

                    <?php
                    include("right-menu.php");
                    ?>
                </div>
            </div>

        </main>

        <footer class="blog-footer">
            <?php
            include("footer.php");
            ?>
        </footer>

        <script src="<?php echo $GLOBALS['base_complete_url']; ?>/js/bootstrap/bootstrap.min.js"></script>

    </body>

</html>