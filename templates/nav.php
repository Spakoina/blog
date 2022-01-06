<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $GLOBALS['base_complete_url']; ?>/"><img class="img-fluid" src="<?php echo $GLOBALS['base_complete_url']; ?>/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link active" aria-current="page" href="<?php echo $GLOBALS['base_complete_url']; ?>/">Home</a>
                </li>
                <?php
                $catRepo = new CategoryRepository();
                $categories = $catRepo->fetch_all();
                if (sizeof($categories) > 0) {
                    foreach ($categories as $key => $cat) {
                        ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="<?php echo $GLOBALS['base_complete_url'] . '/categoria/' . $cat->id_category_url_cd; ?>">
                                <?php echo $cat->category_label; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <form class="d-flex" action="<?php echo $GLOBALS['base_complete_url']; ?>/search" method="get" >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="query" name="query" <?php echo (array_key_exists('query', $_GET) ? 'value="' . $_GET['query'] . '"' : ''); ?>>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
