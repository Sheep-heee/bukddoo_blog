<?php
add_action('wp_ajax_load_more_work_posts', 'bukddoo_ajax_load_more_work_posts');
add_action('wp_ajax_nopriv_load_more_work_posts', 'bukddoo_ajax_load_more_work_posts');

function bukddoo_ajax_load_more_work_posts() {
  $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged,
    'category_name' => 'work'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('components/gallery-post-card');
    }
  }

  wp_die();
}
