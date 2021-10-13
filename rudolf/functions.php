<?php

declare(strict_types=1);
// var_dump("functions.php");

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('burger', get_template_directory_uri() . '/burger.js', array(), true);
	wp_enqueue_script('footer', get_template_directory_uri() . '/js/footer.js', array(), true);
});

register_nav_menus(array(
    'header' => 'Header menu',
));

add_theme_support('post-thumbnails');

function get_menu(string $menuName): array
{
    // set up variabel for export
    static $menus;

    // fetch our menu
    $menuItems = wp_get_nav_menu_items($menuName);

    // prepare temp new menu array
    $menu = [];

    // get all menu items
    foreach ($menuItems as $item) {

        // get the ID of current menu items parent
        $parentId = (int) $item->menu_item_parent;

        // if current page doesn't have any parent, don't add data to children array
        if ($parentId === 0) {
            $item->children = [];
            $menu[$item->ID] = $item;

            continue;
        }

        // if menue item has a parent, add current menu itemem to said parents childrens array
        $menu[$parentId]->children[] = $item;
    }

    // export our new menu which know knows which pages are submenu items.
    return $menus[$menuName] = $menu;
}

function hasSubmenu(int $pageId, string $menuName): bool
{
    $menuItems = get_menu($menuName);
    $answer = false;
    foreach ($menuItems as $item) {
        if (sizeof($item->children) > 0) {
            foreach ($item->children as $child) {

                if ((int) $child->object_id === $pageId) {
                    $answer = true;
                  
                }
            }
            if ((int) $item->object_id === $pageId) {
                $answer = true;
            }
        }
    }
    return $answer;
}

function get_desktop_submenu($pageId){
        // what to do when either parent to or submenu item
        $menuItems = get_menu('mobilmeny');
        $currentPageId = $pageId;
        $pageData = null;
        foreach ($menuItems as $item) {
            if (sizeof($item->children) > 0) {
                if ((int) $item->object_id === $currentPageId) {
                    $pageData = $item;
                    break;
                } else {
                    $pageData = $menuItems[(int) $item->ID];
                }
            }
        }
    ?>
    
        <nav class="submenu-desktop">
    
    
            <?php foreach ($pageData->children as $child) : ?>
    
                <li class="<?= $child->object_id == $currentPageId ? 'active' : '' ?> "><a class="desktop-submenu-link" href="<?= $child->url; ?>"><?= $child->title; ?></a></li>
    
            <?php endforeach; ?>
        </nav>
    <?php
}


// check if using a mobile deivce
function isMobileDevice()
{
    return preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    );
}


/* ------- Line Break Shortcode --------*/
function line_break_shortcode() {
	return '<br />';
}
add_shortcode( 'br', 'line_break_shortcode' );




function joey_jay_digital_custom_card_block()
{
	wp_register_script('custom-card-js', get_template_directory_uri() . '/build/index.js',array('wp-blocks', 'wp-block-editor'));    wp_register_style('custom-card-css', get_template_directory_uri() . '/build/custom-card.css', array() );

    register_block_type('joey-jay-digital/custom-card', array(
        'editor_script' => 'custom-card-js',
        // 'editor_style' => 'path/to/file', only for when changing admin page
        'style' => 'custom-card-css'
    ));
}

add_action('init', 'joey_jay_digital_custom_card_block');