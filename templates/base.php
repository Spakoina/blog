<!doctype html>
<html lang="it">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Chiara Censorio">
        <meta name="generator" content="Chiara Censorio">
        <title><?= isset($page_title) && strlen($page_title) ? $page_title . ' | ' : ''; ?>PaperGirlBlog</title>

        <!--iconcina-->
        <link rel="icon" type="image/x-icon" href="<?php echo $GLOBALS['base_complete_url']; ?>/favicon.ico" />

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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-BCSCDTV5PE"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-BCSCDTV5PE');
        </script>
        <!-- End Google analytics -->

        <!-- IUBENDA -->
        <link rel="preload" as="script" href="https://cdn.iubenda.com/cs/iubenda_cs.js"/>
        <link rel="preload" as="script" href="https://cdn.iubenda.com/cs/tcf/stub-v2.js"/>
        <script src="https://cdn.iubenda.com/cs/tcf/stub-v2.js"></script>
        <script>
            (_iub = self._iub || []).csConfiguration = {
                cookiePolicyId: 29436349,
                siteId: 2465150,

                timeoutLoadConfiguration: 30000,
                lang: 'it',
                enableTcf: true,
                tcfVersion: 2,
                tcfPurposes: {
                    "2": "consent_only",
                    "3": "consent_only",
                    "4": "consent_only",
                    "5": "consent_only",
                    "6": "consent_only",
                    "7": "consent_only",
                    "8": "consent_only",
                    "9": "consent_only",
                    "10": "consent_only"
                },
                invalidateConsentWithoutLog: true,
                googleAdditionalConsentMode: true,
                consentOnContinuedBrowsing: false,
                banner: {
                    position: "top",
                    acceptButtonDisplay: true,
                    customizeButtonDisplay: true,
                    closeButtonDisplay: true,
                    closeButtonRejects: true,
                    fontSizeBody: "14px",
                },
            }
        </script>
        <script async src="https://cdn.iubenda.com/cs/iubenda_cs.js"></script>
        <!-- Fine IUBENDA -->
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