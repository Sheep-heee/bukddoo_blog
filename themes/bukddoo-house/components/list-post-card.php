<li class="list-post-card-container">
  <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="thumb-wrap">
        <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
      </div>
    <?php else : ?>
      <div class="thumb-wrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-post-thumnail.jpg" alt="no image">
      </div>
    <?php endif; ?>
        <div class="post-contents-area">
      <div class="post-text">
        <h3 class="post-title"><?= esc_html(get_the_title()); ?></h3>
        <p class="post-excerpt"><?= esc_html(get_the_excerpt()); ?></p>
      </div>
  
      <div class="post-meta">
        <span class="meta-date"><?= esc_html(get_the_date('Y. m. d D')); ?></span>
        <div class="reaction">
          <span class="meta-icon"><i class="fa-regular fa-heart"></i><?= esc_html(wp_ulike_get_post_likes(get_the_ID())); ?></span>
          <span class="meta-icon"><i class="fa-regular fa-message"></i><?= esc_html(get_comments_number()); ?></span>
        </div>
      </div>
    </div>
  </a>
</li>