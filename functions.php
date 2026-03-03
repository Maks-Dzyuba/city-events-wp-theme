<?php
function event_scripts()
{
    wp_enqueue_style('event-style', get_stylesheet_uri());
    wp_enqueue_script('event-script', get_template_directory_uri() . '/assets/js/script.js', array(), 1, true);
}
add_action('wp_enqueue_scripts', 'event_scripts');

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu' => 'Меню в Шапці',
    ]);
});
