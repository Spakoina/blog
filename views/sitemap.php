<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach ($pages as $page) { ?>
    <url>
        <loc><?= $GLOBALS['base_complete_url'] . '/' . $page->url ?></loc>
        <lastmod><?= $page->lastmod ?></lastmod>
        <changefreq><?= $page->frequency ?></changefreq>
    </url>
    <?php } ?>

</urlset>