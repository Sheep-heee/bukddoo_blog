<?php 
function custom_theme_assets() {
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');

add_action('after_setup_theme', function() {
  add_theme_support('post-thumbnails');
});

require get_template_directory() . '/functions/main-data-functions.php';
require get_template_directory() . '/functions/ajax/load-category-posts.php';

function theme_enqueue_scripts() {
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);

  wp_localize_script('main-js', 'ajaxObj', array(
    'ajaxurl' => admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');