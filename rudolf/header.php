<?php $menuItems = wp_get_nav_menu_items('huvudmeny'); ?>

<nav>
    <?php foreach ($menuItems as $item) : ?>
        <a class="<?= $item->object_id == $currentPageId ? 'active' : '' ?> " href="<?= $item->url; ?>"><?= $item->title; ?></a>
    <?php endforeach; ?>
</nav>
<div class="home_container">