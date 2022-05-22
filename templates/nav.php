<?php
// Preparing menù elements
$menu[] = array();

$homeurl = $GLOBALS['base_complete_url'];
$menu[0] = array(
    "title" => "Home",
    "link" => $homeurl . '/',
    "active" => ($GLOBALS['current_url'] == $homeurl || $GLOBALS['current_url'] == $homeurl . '/' ? true : false)
);

$catRepo = new CategoryRepository();
$categories = $catRepo->fetch_all();
if (sizeof($categories) > 0) {
    $arr_utils = new ArrayUtils();
    $arr_utils->sort_categories($categories);
    foreach ($categories as $key => $cat) {
        $caturl = $GLOBALS['base_complete_url'] . '/categoria/' . $cat->id_category_url_cd;
        $menu[count($menu)] = array(
            "title" => $cat->category_label,
            "link" => $caturl,
            "active" => ($GLOBALS['current_url'] == $caturl ? true : false)
        );
    }
}

$menu[] = array(
    "title" => "About",
    "link" => $homeurl . '/about',
    "active" => ($GLOBALS['current_url'] == $homeurl . '/about' ? true : false)
);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid border-bottom">
        <a class="navbar-brand" href="<?php echo $GLOBALS['base_complete_url']; ?>/"><img class="img-fluid" src="<?php echo $GLOBALS['base_complete_url']; ?>/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($menu as $key => $ent) {
                    ?>

                    <li class="nav-item mx-1">
                        <a class="nav-link <?php echo $ent['active'] == true ? 'active' : ''; ?>" 
                           href="<?php echo $ent['link']; ?>">
                               <?php echo $ent['title']; ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <form class="d-flex" action="<?php echo $GLOBALS['base_complete_url']; ?>/search" method="get" >
                <input class="form-control me-2" type="search" placeholder="Cosa stai cercando?" aria-label="Search" id="query" name="query" <?php echo (array_key_exists('query', $_GET) ? 'value="' . $_GET['query'] . '"' : ''); ?>>
                <button class="btn btn-outline-success" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
