<?php

add_action('wp_ajax_load_more_category_posts', 'load_more_category_posts');
add_action('wp_ajax_nopriv_load_more_category_posts', 'load_more_category_posts');

function load_more_category_posts() {
  $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
  );

  if (!empty($category)) {
    $args['category_name'] = $category;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('components/list-post-card');
    }
  } else {
    get_template_part('components/no-post-message');
  }

  wp_die();
}
