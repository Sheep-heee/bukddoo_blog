<?php
$is_home = ($args['origin'] ?? '') === 'home';
$outer_class = $is_home ? 'main-post-card work-area' : 'work-post-card';
$inner_wrap = $is_home;
?>

<article class="<?= esc_attr($outer_class) ?>">
  <a href="<?= esc_url(get_permalink()); ?>">
    <?php if ($inner_wrap): ?>
      <div class="work-post-card">
    <?php endif; ?>
      <div class="img-box">
        <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
      </div>
      <div class="hover-info">
        <div class="hover-info-text">
          <div class="work-info-text">
            <span class="work-info-title"><?= esc_html(get_the_title()); ?></span>
            <span class="work-info-desc"><?= esc_html($args['description'] ?? '') ?></span>
          </div>
          <div class="work-info-meta">
            <span class="work-info-date"><?= esc_html($args['year'] ?? '') ?></span>
            <div class="work-info-morebtn">
              자세히 보기
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
    <?php if ($inner_wrap): ?>
      </div>
    <?php endif; ?>
  </a>
</article>