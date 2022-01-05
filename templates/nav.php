<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $base_complete_url; ?>/"><img class="img-fluid" src="<?php echo $base_complete_url; ?>/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link active" aria-current="page" href="<?php echo $base_complete_url; ?>/">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo $base_complete_url; ?>/libri">Libri</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo $base_complete_url; ?>/cucina">Cucina</a>
                </li>
            </ul>
            <form class="d-flex" action="<?php echo $base_complete_url; ?>/search" method="get" >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="query" name="query" <?php echo (array_key_exists('query', $_GET) ? 'value="' . $_GET['query'] . '"' : ''); ?>>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!--
        <div class="nav-scroller py-1 mb-2 ">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="#">World</a>
                <a class="p-2 link-secondary" href="#">U.S.</a>
                <a class="p-2 link-secondary" href="#">Technology</a>
            </nav>
        </div>
-->