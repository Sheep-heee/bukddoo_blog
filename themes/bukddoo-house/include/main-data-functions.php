<?php
function render_featured_category($cat_slug) {
  $cat = get_category_by_slug($cat_slug);
  if (!$cat) return;

  $q = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => 1,
    'post_status' => 'publish'
  ]);

  if ($q->have_posts()) {
    $q->the_post();

    // 본문 200자 잘라서 excerpt 만들기
    $content = apply_filters('the_content', get_the_content());
    $plain = wp_strip_all_tags($content);
    $excerpt = mb_substr($plain, 0, 200) . (mb_strlen($plain) > 200 ? '...' : '');

    echo '<section class="main-featured">';
    get_template_part('template-parts/components/main-post-card', null, [
      'size' => 'large',
      'excerpt' => $excerpt
    ]);
    echo '</section>';
  }
  wp_reset_postdata();
}

function render_small_category_single($cat_slug) {
  $cat = get_category_by_slug($cat_slug);
  if (!$cat) return;

  $q = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => 1,
    'post_status' => 'publish'
  ]);

  if ($q->have_posts()) {
    $q->the_post();

    // 본문 200자 잘라서 excerpt 만들기
    $content = apply_filters('the_content', get_the_content());
    $plain = wp_strip_all_tags($content);
    $excerpt = mb_substr($plain, 0, 200) . (mb_strlen($plain) > 200 ? '...' : '');

    echo '<section class="main-featured">';
    get_template_part('template-parts/components/main-post-card', null, [
      'size' => 'small',
      'excerpt' => $excerpt
    ]);
    echo '</section>';
  }
  wp_reset_postdata();
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