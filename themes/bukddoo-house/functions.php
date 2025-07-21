<?php 
require get_template_directory() . '/functions/main-data-functions.php';
require get_template_directory() . '/functions/ajax/load-work-roughly.php';
require get_template_directory() . '/functions/ajax/get-all-tag.php';

// 더 이상 사용하지 않음 (페이지네이션으로 전환됨)
// require get_template_directory() . '/functions/ajax/load-category-posts.php';

function theme_enqueue_scripts() {
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');

  wp_enqueue_script('search-clear', get_template_directory_uri() . '/assets/js/search-clear.js', array(), null, true);
  // 더 이상 사용하지 않음 (페이지네이션으로 전환됨)
  // wp_enqueue_script('category-loadmore', get_template_directory_uri() . '/assets/js/category-loadmore.js', array(), null, true);
  wp_enqueue_script('widget-random-menu', get_template_directory_uri() . '/assets/js/widget-random-menu.js', array(), null, true);
  wp_enqueue_script('widget-seasonal-menu', get_template_directory_uri() . '/assets/js/widget-seasonal-menu.js', array(), null, true);

  wp_localize_script('category-loadmore', 'ajaxObj', array(
    'ajaxurl' => admin_url('admin-ajax.php')
  ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

add_action('wp_enqueue_scripts', function() {
  if (is_front_page()) {
    wp_dequeue_script('cookie-law-info');
  }
}, 100);

add_action('init', function() {
  error_log(print_r(get_category_by_slug('too-many-complaints'), true));
});