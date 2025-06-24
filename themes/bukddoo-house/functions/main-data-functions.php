<?php
function get_survival_tip_count() {
  $cached = get_transient('bukddoo_survival_tip_count');
  if ($cached !== false) return $cached;

  $target_categories = array('too-many-complaints', 'just-life', 'eat-a-snack');

  $cat_ids = array_map(function($slug) {
    $cat = get_category_by_slug($slug);
    return $cat ? $cat->term_id : null;
  }, $target_categories);

  $cat_ids = array_filter($cat_ids);

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category__in' => $cat_ids,
    'fields' => 'ids', // ID만 가져오니까 성능 최적
    'post_status' => 'publish'
  );

  $query = new WP_Query($args);
  $total_posts = $query->found_posts;

  $result = ($total_posts < 101) ? 101 : $total_posts;
  set_transient('bukddoo_survival_tip_count', $result, HOUR_IN_SECONDS);

  return $result;
}

function get_latest_notice_data($cat_slug = 'notice-on-edge') {
  $cat = get_category_by_slug($cat_slug);
  if (!$cat) return null;

  $query = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => 1,
    'post_status' => 'publish'
  ]);

  if (!$query->have_posts()) return null;

  $query->the_post();
  $content = apply_filters('the_content', get_the_content());
  preg_match_all('/<img[^>]+>/i', $content, $matches);
  $plain = wp_strip_all_tags($content);
  $excerpt = mb_substr($plain, 0, 200) . (mb_strlen($plain) > 200 ? '...' : '');
  $data = [
    'title' => get_the_title(),
    'date' => get_the_date('Y. m. d'),
    'permalink' => get_permalink(),
    'images' => $matches[0],
    'excerpt' => $excerpt,
  ];

  wp_reset_postdata();
  return $data;
}

function render_category_section($cat_slug, $size = 'small', $limit = 2) {
  $cat = get_category_by_slug($cat_slug);
  if (!$cat) return;

  $q = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => $limit,
    'post_status' => 'publish'
  ]);

  $found = 0;

  if ($q->have_posts()) {
    while ($q->have_posts()) {
      $q->the_post();
      $content = apply_filters('the_content', get_the_content());
      $plain = wp_strip_all_tags($content);
      $excerpt = mb_substr($plain, 0, 200) . (mb_strlen($plain) > 200 ? '...' : '');

      get_template_part('/components/main-post-card', null, [
        'size' => $size,
        'excerpt' => $excerpt
      ]);

      $found++;
    }
  }

  
  if ($found < $limit) {
    for ($i = $found; $i < $limit; $i++) {
      get_template_part('components/no-post-message');
    }
  }

  wp_reset_postdata();
}



function render_work_section($limit = 5, $origin = 'home') {
  $cat = get_category_by_slug('work-roughly');
  if (!$cat) return;

  $q = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => $limit,
    'post_status' => 'publish'
  ]);

  $found = 0;

  if ($q->have_posts()) {
    while ($q->have_posts()) {
      $q->the_post();

      $fields = [
        'field' => get_field('work_field'),
        'year' => get_field('work_year'),
        'scale' => get_field('work_scale'),
        'owner' => get_field('work_owner'),
        'description' => get_field('work_description'),
        'thumbnail' => get_the_post_thumbnail_url(),
        'origin' => $origin
      ];

      get_template_part('components/gallery-post-card', null, $fields);

      $found++;
    }
  }

  if ($found < $limit) {
    for ($i = $found; $i < $limit; $i++) {
      get_template_part('components/no-post-message');
    }
  }

  wp_reset_postdata();
}