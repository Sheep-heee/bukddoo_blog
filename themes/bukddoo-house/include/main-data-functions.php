<?php
function render_category_section($cat_slug, $size = 'small', $limit = 2, $wrapper_class = '') {
  $cat = get_category_by_slug($cat_slug);
  if (!$cat) return;

  $q = new WP_Query([
    'category__in' => [$cat->term_id],
    'posts_per_page' => $limit,
    'post_status' => 'publish'
  ]);

  echo '<div class="' . esc_attr($wrapper_class) . '">';

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

  // 빈 카드 채우기
  if ($found < $limit) {
    for ($i = $found; $i < $limit; $i++) {
      echo '<article class="main-post-card is-empty">';
      echo '<div class="empty-text">게시물이 없습니다</div>';
      echo '</article>';
    }
  }

  echo '</div>';
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