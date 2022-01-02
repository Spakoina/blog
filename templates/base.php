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
    <link href="<?php echo $base_complete_url; ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">

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
    <link href="<?php echo $base_complete_url; ?>/css/blog.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <?php
        include("nav.php");
        ?>
    </div>

    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded bg-dark featured-bg">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                    efficiently about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="#" class="fw-bold">Continue reading...</a></p>
            </div>
        </div>

        

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

    <script src="<?php echo $base_complete_url; ?>/js/bootstrap/bootstrap.min.js"></script>

</body>

</html>