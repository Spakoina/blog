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
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8891426399785268"
        crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="container">
            <?php
            include("nav.php");
            ?>
        </div>

        <main class="container">
            <?php
            if ($show_banner == true) {
                ?>
                <div style="background-image: url('<?php echo $GLOBALS['base_complete_url']; ?>/img/main-banner.jpg')" 
                     class="main-banner py-5 mb-5 d-flex justify-content-center">
                    <img class="img-fluid mx-auto d-none d-md-block p-1 border"  
                         src="<?php echo $GLOBALS['base_complete_url']; ?>/img/paper.png">
                    <div class="d-block d-md-none p-1 border">
                        <p class="d-block d-md-none text-center bg-white p-2 m-0 font-luxurious">Il blog per nutrire la curiosità</p>
                    </div>
                </div>

                <?php
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