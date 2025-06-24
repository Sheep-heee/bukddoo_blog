<?php
$size = $args['size'] ?? 'default';
$excerpt = $args['excerpt'] ?? '';
$likes = wp_ulike_get_post_likes(get_the_ID());
$comments = get_comments_number();
$date = get_the_date('Y. m. d D');

$card_class = 'main-post-card';
if ($size === 'large') $card_class .= ' is-large';
if ($size === 'small') $card_class .= ' is-small';
?>

<article class="<?= esc_attr($card_class) ?>">
  <a href="<?= esc_url(get_permalink()); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <div class="thumb-wrap">
        <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
      </div>
    <?php endif; ?>

    <div class="post-contents-area">
      <div class="post-text">
        <h3 class="post-title"><?= esc_html(get_the_title()); ?></h3>
        <p class="post-excerpt"><?= esc_html($excerpt); ?></p>
      </div>
  
      <div class="post-meta">
        <span class="meta-date"><?= esc_html($date); ?></span>
        <div class="reaction">
          <span class="meta-icon"><i class="fa-regular fa-heart"></i><?= esc_html($likes); ?></span>
          <span class="meta-icon"><i class="fa-regular fa-message"></i><?= esc_html($comments); ?></span>
        </div>
      </div>
    </div>
  </a>
</article>