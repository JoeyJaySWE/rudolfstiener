<header>

    <?php wp_head(); ?>
    <?php $menuItems = wp_get_nav_menu_items('huvudmeny'); ?>
    <!-- <?php var_dump("header.php") ?> -->
</header>

<nav class="nav-bar">
    <?php $currentPageId = $wp_query->queried_object_id; ?>
    <?php foreach ($menuItems as $item) : ?>
        <a class="<?= $item->object_id == $currentPageId ? 'active' : '' ?> " href="<?= $item->url; ?>"><?= $item->title; ?></a>
    <?php endforeach; ?>
</nav>
<div class="home_container">