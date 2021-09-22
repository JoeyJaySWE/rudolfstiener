<?php

declare(strict_types=1);
// var_dump("functions.php");

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
});


add_theme_support('post-thumbnails');
