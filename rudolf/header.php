<header>

    <?php wp_head(); ?>
    <?php $menuItems = wp_get_nav_menu_items('huvudmeny'); ?>

</header>

<nav class="nav-bar">
    <?php foreach ($menuItems as $item) : ?>
        <a class="<?= $item->object_id == $currentPageId ? 'active' : '' ?> " href="<?= $item->url; ?>"><?= $item->title; ?></a>
    <?php endforeach; ?>
</nav>
<div class="home_container">