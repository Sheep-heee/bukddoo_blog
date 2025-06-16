<?php
$size = $args['size'] ?? 'default';
$likes = wp_ulike_get_post_likes(get_the_ID());
$comments = get_comments_number();
$date = get_the_date('Y. m. d. (D)');

$card_class = 'main-post-card';
if ($size === 'large') $card_class .= ' is-large';
if ($size === 'small') $card_class .= ' is-small';
?>

<article class="<?= esc_attr($card_class) ?>">
  <a href="<?= get_permalink(); ?>">
    <div class=""><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></div>
    <div class="post-text">
      <h3 class="post-title"><?php the_title(); ?></h3>
      <p class="post-excerpt"><?= esc_html($excerpt); ?></p>
    </div>
    <div class="post-meta">
      <span class="meta-date"><?= esc_html($date); ?></span>
      <div class="reaction">
        <div class="meta-icon"><span class="like-point"><i class="fa-regular fa-heart"></i><?= $likes ?></span></div>
        <div class="meta-icon"><span class="comment-point"><i class="fa-regular fa-message"></i><?= $comments ?></span></div>
      </div>
    </div>
  </a>
</article>