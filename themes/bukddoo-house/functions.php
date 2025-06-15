<?php 
function custom_theme_assets() {
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');

  wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');

add_action('after_setup_theme', function() {
  add_theme_support('post-thumbnails');
});